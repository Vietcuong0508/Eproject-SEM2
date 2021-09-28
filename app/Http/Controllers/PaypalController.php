<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Paypal;
use App\Models\Product;
use Carbon\Carbon;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use PayPal\Api\Amount;
use PayPal\Api\Details;
use PayPal\Api\Item;
use PayPal\Api\ItemList;
use PayPal\Api\Payer;
use PayPal\Api\Payment;
use PayPal\Api\PaymentExecution;
use PayPal\Api\RedirectUrls;
use PayPal\Api\Transaction;
use PayPal\Auth\OAuthTokenCredential;
use PayPal\Rest\ApiContext;

class PaypalController extends Controller
{
    public function createPayment(Request $request) {
        $order = Order::find($request->id);
        $orderDetails = OrderDetail::query()->where('orderId',$request->id)->get();
        $apiContext = new ApiContext(
            new OAuthTokenCredential('AXckj3FSPpUmutfLkz9qgvbdEBODWjRLQ8iOc2SrqFxcwRsBNjdRUApDuUSJ96063N3G39OeMqbqGrIG',
            'EMWAAVH2R9B3f1edJSArKIMG09Q0QNAWLZlC1E6sMch3CbfQZcFEpHS0wlw7hOuqPKvcMHtP4ZXH6shX'
            )
        );
        $apiContext->setConfig([
            'mode'=>'sandbox'
        ]);
        $payer = new Payer();
        $payer->setPaymentMethod("paypal");
        $itemArray = [];
        foreach ($orderDetails as $orderDetail) {
            $product = Product::find($orderDetail->productId);
//            if ($product == null) {
//                $messageError = 'Có lỗi xảy ra, sản phẩm với id ' . $cartItem->id . 'không tồn tại hoặc đã bị xóa!';
//                break;
//            }
            $item = new Item();
            $item->setName($product->name)
                ->setCurrency('USD')
                ->setQuantity($orderDetail->quantity)
                ->setSku($orderDetail->productId)
                ->setPrice($orderDetail->unitPrice);
            array_push($itemArray,$item);
        }
        $itemList = new ItemList();
        $itemList->setItems($itemArray);

        $details = new Details();
        $details->setShipping(0)
            ->setTax(0)
            ->setSubtotal($order->totalPrice);

        $amount = new Amount();
        $amount->setCurrency("USD")
            ->setTotal($order->totalPrice)
            ->setDetails($details);

        $transaction = new Transaction();
        $transaction->setAmount($amount)
            ->setItemList($itemList)
            ->setDescription("Thanh toán cho wen Rau Sạch")
            ->setInvoiceNumber($order->id);

        $redirectUrl = new RedirectUrls();
        $redirectUrl->setReturnUrl("")
            ->setCancelUrl("");

        $payment = new Payment();
        $payment->setIntent("sale")
            ->setPayer($payer)
            ->setRedirectUrls($redirectUrl)
            ->setTransactions(array($transaction));
        try {
            $payment->create($apiContext);
        } catch (\Exception $ex) {
            exit(1);
        }
        return $payment;
    }

    public function executePayment(Request $request) {
        $apiContext = new ApiContext(
            new OAuthTokenCredential(
                'AXckj3FSPpUmutfLkz9qgvbdEBODWjRLQ8iOc2SrqFxcwRsBNjdRUApDuUSJ96063N3G39OeMqbqGrIG',
                'EMWAAVH2R9B3f1edJSArKIMG09Q0QNAWLZlC1E6sMch3CbfQZcFEpHS0wlw7hOuqPKvcMHtP4ZXH6shX'
            )
        );
        $apiContext->setConfig([
            'mode'=>'sandbox'
        ]);
        $paymentID = $request->get('paymentID');
        $payerID = $request->get('payerID');
        $payment = Payment::get($paymentID,$apiContext);

        $execution = new PaymentExecution();
        $execution->setPayerId($payerID);
        try {
            $result = $payment->execute($execution, $apiContext);
            try {
                $payment = Payment::get($paymentID, $apiContext);
                if (count($payment->transactions) > 0 ) {
                    $orderId = $payment->transactions[0]->invoice_number;
                    $order = Order::find($orderId);
                    if ($order != null) {
                        $order->isCheckout = true;
                        $order->updated_at = Carbon::now();
                        $order->save();
                    }
                }
            } catch (Exception $ex) {
                exit(1);
            }
        } catch (Exception $ex) {
            exit(1);
        }
        return $payment;
    }
}
