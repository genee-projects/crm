<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Controllers\Controller;

use App\Product;
use App\Hardware;

class HardWareController extends Controller
{
    public function add(Request $request) {

        $product = Product::find($request->input('product_id'));

        $hardware = new Hardware();
        $hardware->name = $request->input('name');
        $hardware->description = $request->input('description');
        $hardware->model = $request->input('model');
        $hardware->self_produce = (bool) ($request->input('self_produce') == 'on');

        $hardware->product()->associate($product);

        $hardware->save();

        return redirect()->back();
    }

    public function delete($id)
    {
        //
        $hardware = Hardware::find($id);

        $hardware->delete();

        return redirect()->back();
    }

    public function edit(Request $request) {

        $hardware = Hardware::find($request->input('id'));

        $hardware->name = $request->input('name');
        $hardware->description = $request->input('description');
        $hardware->model = $request->input('model');
        $hardware->self_produce = (bool) ($request->input('self_produce') == 'on');

        $hardware->save();

        return redirect()->back();
    }
}
