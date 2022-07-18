<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;

use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function index(){
        $product= ProductModel::all();
        return response()->json($product);
    }

    public function create(Request $request){
        $this->validate($request,[
            'productName'=> 'required|string',
            'price' => 'required|integer',
            'desc' => 'required|string',
            'type' => 'required|in:new, second',
            'qty' => 'required|integer',
            'createBy' => 'required|string',
            'updateBy' => 'string',
            'isActive' => 'required|in:0,1'
        ]);

        $data = $request->all();
        $product = ProductModel::create($data);

        return response()->json($product);
    }

    public function detailProduct($id){
        $product = ProductModel::find($id);
        return response()->json($product);
    }

    public function updateDataProduct(Request $request, $id){

        $this->validate($request,[
            'updateBy' => 'required|string'
        ]);

        $product = ProductModel::find($id);

        if(!$product){
            return response()->json(['message'=>'Product not found!'],404);
        }

        $data =  $request->all();

        $product->fill($data);
        $product->save();

        return response()->json($product);
    }

    public function pureDeleteProduct($id){
        $product = ProductModel::find($id);

        if(!$product){
            return response()->json(['message'=>'Product not found!'],200);
        }

        $product->delete();
        return response()->json(['message'=>'Product has been deleted!'],200);
    }
    

    public function actualyDeleteProduct(Request $request, $id){

        $this->validate($request,[
            'updateBy' => 'required|string',
            'isActive' => 'required|in:0,1'
        ]);

        $product = ProductModel::find($id);

        if(!$product){
            return response()->json(['message'=>'Product not found!'],200);
        }

        $data =  $request->all();

        $product->fill($data);
        $product->save();

        return response()->json($product);
    }

}
