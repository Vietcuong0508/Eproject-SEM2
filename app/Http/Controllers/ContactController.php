<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function index() {
        $list = Contact::all();
        return view('/client/contact', ['list' => $list]);
    }

    public function store(Request $request) {
        $form = new Contact();
        $form ->fill($request->all());
        $form ->save();
        return $form;
    }
}
