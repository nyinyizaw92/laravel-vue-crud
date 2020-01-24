<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class MainController extends Controller
{
    public function storeItem(Request $request){

       //dd($request->all());
        $data = new Product();
        $data->name = $request->name;
        $data->age = $request->age;
        $data->profession = $request->profession;
        //dd($data);
        $data->save();
        //dd($add_product);
        return $data;
    }

    public function getItems(){
        $data = Product::all();
       // dd($data);
        return $data;
    }

    public function deleteItem(Request $request){
        //dd($request->id);
       $data = Product::find($request->id)->delete();
        //return $data;
    }

    public function editItem(Request $req,$id){
        $data = Product::where('id',$id)->first();

        $data->name = $req->get('val1');
        $data->age = $req->get('val2');
        $data->profession = $req->get('val3');
        $data->save();
        return $data;
    }
}
