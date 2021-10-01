<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $queryBuilder = Contact::query();
        $search = $request->query('search');
        $events = $queryBuilder->paginate(9)->appends(['search' => $search]);
        return view('admin/contact', [
            'list' => $events
        ]);
    }

    public function create()
    {
        return view('/client/contact');
    }

    public function store(ContactRequest $request)
    {
        $form = new Contact();
        $form->fill($request->all());
        $request->validated();
        $form->save();
        return redirect()->route('contact');
    }

    public function update_status(Request $request)
    {
        foreach (json_decode($request->array_id) as $item) {
            $order = Contact::find($item);
            $order->status = $request->desire;
            $order->save();
        }
        return back();
    }
}
