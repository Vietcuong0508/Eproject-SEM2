<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(Request $request)
    {
        $queryBuilder = Product::query();
        $search = $request->query('search');
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('shipName', 'like', '%' .$search. '%');
        }
        $events = $queryBuilder->paginate(9)->appends(['search' => $search]);
        $newProduct = Product::query()->orderBy('id', 'DESC')->take(6)->get();
        return view('client/products', [
            'list' => $events,
            'newProduct' => $newProduct
        ]);
    }

    public function list(Request $request)
    {
        $queryBuilder = Product::query();
        $search = $request->get('search');
        $price = $request->get('price');
        $gardenName = $request->get('gardenName');
        $category = $request->get('category');
        if ($search && strlen($search) > 0) {
            $queryBuilder = $queryBuilder->where('name', 'like', '%' . $search . '%');
        }
        if ($price == 1) {
            $queryBuilder = $queryBuilder->whereBetween('price', [0, 20]);
        }
        if ($price == 2) {
            $queryBuilder = $queryBuilder->whereBetween('price', [20, 50]);
        }
        if ($price == 3) {
            $queryBuilder = $queryBuilder->whereBetween('price', [50, 100]);
        }
        if ($price == 4) {
            $queryBuilder = $queryBuilder->whereBetween('price', [100, 200]);
        }

        if ($gardenName == 1) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại rau hữu cơ Organik Đà Lạt');
        }
        if ($gardenName == 2) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Trang trại hữu cơ BIOPHAP farm');
        }
        if ($gardenName == 3) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Nông trại hữu cơ Viễn Phú');
        }
        if ($gardenName == 4) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Công ty cổ phần Deli Fresh');
        }
        if ($gardenName == 5) {
            $queryBuilder = $queryBuilder->where('gardenName', 'like', 'Công Ty TNHH Lion Golden');
        }
        if ($category == 1) {
            $queryBuilder = $queryBuilder->where('category', 'like', 'rau');
        }
        if ($category == 2) {
            $queryBuilder = $queryBuilder->where('category', 'like', 'củ');
        }
        if ($category == 3) {
            $queryBuilder = $queryBuilder->where('category', 'like', 'quả');
        }
        $events = $queryBuilder->paginate(12)->appends(['search' => $search]);
        return view('/admin/products/list-products', [
            'list' => $events,
            'price' => $price,
            'gardenName' => $gardenName,
            'category' => $category
        ]);
    }


    public function show($id)
    {

    }

    public function create()
    {
        return view('/admin/products/create-products');
    }


    public function store(Request $request)
    {
        $product = new Product();
        $product->fill($request->all());
        $product->save();
        return redirect('/list-products');
    }

    public function edit($id)
    {
        $detail = Product::find($id);
        return view('/admin/products/edit-products', [
            'edit' => $detail
        ]);
    }

    public function update(Request $request, $id)
    {
        $detail = Product::find($id);
        $detail->update($request->all());
        $detail->save();
        return redirect('list-products');
    }


    public function destroy($id)
    {
        $detail = Product::find($id);
        $detail->delete();
        return redirect('list-products');
    }
}
