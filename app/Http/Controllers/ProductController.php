<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   



        if(isset($_GET['serach'])){

            $serach = $_GET['serach'];
            
        }else{
            $serach = '';
        };

        return view('admin.product.list', [
            'db' => Product::orderBy('created_at', 'DESC')
            ->where('name', 'like', "$serach%")
            ->paginate(5),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.product.form', []);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = new Product();
        $user->fill($request->all());
        if ($request->hasFile('thumbnail_url')) {
            $thumbnail_url = $request->thumbnail_url;
            $thumbnail_url_name = $thumbnail_url->hashName();
            $thumbnail_url_name = $request->username . '_' . $thumbnail_url_name;
            $user->thumbnail_url = $thumbnail_url->storeAs('images/product', $thumbnail_url_name);
        } else {

            $user->thumbnail_url = '';
        }
        $user->save();

        return redirect()->route('admin.product.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function status($id)
    {
        $product = Product::find($id);
        if($product->status == 0){
            Product::where('id', $id)->update(['name'=> $product->name, 'status'=> 1, 'price'=>$product->price, 'thumbnail_url'=> $product->thumbnail_url]);
        }
        else if($product->status == 1){
            Product::where('id', $id)->update(['name'=> $product->name, 'status'=> 0, 'price'=>$product->price, 'thumbnail_url'=> $product->thumbnail_url]);
        }
        return redirect()->back();
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $product = '';
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($id) {

            if (Product::destroy($id)) {

                return redirect()->back();
            }
        }
    }
}
