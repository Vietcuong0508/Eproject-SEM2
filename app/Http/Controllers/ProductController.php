<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormProductRequest;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
//$newProduct = Product::query()->orderBy('id', 'DESC')->take(6)->get();

    public function index(Request $request)
    {
        $queryBuilder = Product::query();
        $newProduct = Product::query()->orderBy('id', 'DESC')->take(6)->get();
        $search = $request->get('search');
        $price = $request->get('price');
        $gardenName = $request->get('gardenName');
        $category = $request->get('category');
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('name', 'like', '%' . $search . '%')
                -> orWhere('vitamin', 'like', '%' . $search . '%')
                -> orWhere('nutrient', 'like', '%' . $search . '%');
        }
        if ($price == 1) {
            $queryBuilder = $queryBuilder->whereBetween('price', [0, 20000]);
        }
        if ($price == 2) {
            $queryBuilder = $queryBuilder->whereBetween('price', [20000, 50000]);
        }
        if ($price == 3) {
            $queryBuilder = $queryBuilder->whereBetween('price', [50000, 100000]);
        }
        if ($price == 4) {
            $queryBuilder = $queryBuilder->where('price', '>' ,100000);
        }

        if ($gardenName == 1) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ Organik Đà Lạt');
        }
        if ($gardenName == 2) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ BIOPHAP farm');
        }
        if ($gardenName == 3) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Đồng Xanh Farm');
        }
        if ($gardenName == 4) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Univers Farm Organics');
        }
        if ($gardenName == 5) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ Organica');
        }
        if ($category == 1) {
            $queryBuilder = $queryBuilder->where('category', '=', 1);
        }
        if ($category == 2) {
            $queryBuilder = $queryBuilder->where('category', '=', 2);
        }
        if ($category == 3) {
            $queryBuilder = $queryBuilder->where('category', '=', 3);
        }
        $events = $queryBuilder->paginate(9)->appends(['search' => $search]);
        return view('client/products', [
            'list' => $events,
            'price' => $price,
            'gardenName' => $gardenName,
            'category' => $category,
            'newProduct' => $newProduct
        ]);
    }

    public function home(Request $request)
    {
        $queryBuilder = Product::query();
        $search = $request->query('search');
        $gardenName = $request->get('gardenName');
        $rau = Product::query()->where('category', '=', 1)->limit(8)->get();
        $cu = Product::query()->where('category', '=', 2)->limit(8)->get();
        $qua = Product::query()->where('category', '=', 3)->limit(8)->get();
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('name', 'like', '%' . $search . '%')
                -> orWhere('vitamin', 'like', '%' . $search . '%')
                -> orWhere('nutrient', 'like', '%' . $search . '%');
        }

        if ($gardenName == 1) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại rau hữu cơ Organik Đà Lạt');
        }
        if ($gardenName == 2) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ BIOPHAP farm');
        }
        if ($gardenName == 3) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Đồng Xanh Farm');
        }
        if ($gardenName == 4) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Univers Farm Organics');
        }
        if ($gardenName == 5) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ Organica');
        }
        $events = $queryBuilder->paginate(9)->appends(['search' => $search]);
        $newProduct = Product::query()->orderBy('id', 'DESC')->take(200)->get();
        return view('client/home', [
            'list' => $events,
            'newProduct' => $newProduct,
            'gardenName' => $gardenName,
            'rau' => $rau,
            'cu' => $cu,
            'qua' => $qua,
        ]);
    }

    public function list(Request $request)
    {
        $queryBuilder = Product::query();
        $search = $request->query('search');
        $price = $request->get('price');
        $gardenName = $request->get('gardenName');
        $category = $request->get('category');
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('name', 'like', '%' . $search . '%')
                -> orWhere('vitamin', 'like', '%' . $search . '%')
                -> orWhere('nutrient', 'like', '%' . $search . '%');
        }
        if ($price == 1) {
            $queryBuilder = $queryBuilder->whereBetween('price', [0, 20000]);
        }
        if ($price == 2) {
            $queryBuilder = $queryBuilder->whereBetween('price', [20000, 50000]);
        }
        if ($price == 3) {
            $queryBuilder = $queryBuilder->whereBetween('price', [50000, 100000]);
        }
        if ($price == 4) {
            $queryBuilder = $queryBuilder->where('price', '>' ,100000);
        }

        if ($gardenName == 1) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại rau hữu cơ Organik Đà Lạt');
        }
        if ($gardenName == 2) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ BIOPHAP farm');
        }
        if ($gardenName == 3) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Đồng Xanh Farm');
        }
        if ($gardenName == 4) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Univers Farm Organics');
        }
        if ($gardenName == 5) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ Organica');
        }
        if ($category == 1) {
            $queryBuilder = $queryBuilder->where('category', '=', 1);
        }
        if ($category == 2) {
            $queryBuilder = $queryBuilder->where('category', '=', 2);
        }
        if ($category == 3) {
            $queryBuilder = $queryBuilder->where('category', '=', 3);
        }
        $events = $queryBuilder->paginate(10)->appends(['search' => $search]);
        return view('/admin/products/list-products', [
            'list' => $events,
            'price' => $price,
            'gardenName' => $gardenName,
            'category' => $category
        ]);
    }



    public function show($id)
    {
        //
    }


    public function create()
    {
        return view('/admin/products/create-products');
    }


    public function store(FormProductRequest $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $request->validated();
        $product->save();
        return redirect('/list-products')->with('store','Thêm mới sản phẩm thành công');
    }

    public function edit($id)
    {
        $detail = Product::find($id);
        return view('/admin/products/edit-products', [
            'edit' => $detail
        ]);
    }

    public function update(FormProductRequest $request, $id)
    {
        $detail = Product::find($id);
        $detail->update($request->all());
        $request->validated();
        $detail->save();
        return redirect('list-products')->with('update','Update sản phẩm thành công');
    }


    public function destroy($id)
    {
        $detail = Product::find($id);
        $detail->delete();
        return redirect('list-products')->with('destroy','Xóa sản phẩm thành công');;
    }
}
