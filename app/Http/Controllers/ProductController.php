<?php

namespace App\Http\Controllers;

use App\Models\Models\Product;
use App\Http\Requests\ProductStoreRequest;
use App\Http\Requests\UpdateProductRequest;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
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
        $products = Product::latest()->paginate(4);

        return view('products.index')->with('products', $products);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductStoreRequest $request)
    {

        $image_path  = '';
        if($request->hasFile('image')){
            $image_path = $request->file('image')->store('products');
        }
        $product = Product::create([

                    'name'                =>         $request->name,
                    'description'       =>         $request->description,
                    'image'               =>         $image_path,
                    'barcode'            =>         $request->barcode,
                    'price'                 =>         $request->price,
                    'quantity'                 =>         $request->quantity,
                    'status'                =>         $request->status,
        ]);
        if(!$product){
            Alert::error('Ooppppsss!', 'There was an error');
            return redirect()->back()->with('error', 'Sorry There is a problem in adding the product. ');
        }
        Alert::success('Created Successfully', 'Thank you');
        return redirect()->route('products.index')->with('success', 'SuccessFully Added The Product.  ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        return view('products.edit')->with('product', $product);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateProductRequest $request, Product $product)
    {

        $product->name                 =          $request->name;
        $product->description        =          $request->description;
        $product->barcode             =          $request->barcode;
        $product->price                  =          $request->price;
        $product->quantity                  =          $request->quantity;
        $product->status                =          $request->status;

        if ($request->hasFile('image')){
            // Delete Old Image
            if($product->image) {
                Storage::delete($product->image);
            }

            //Store Image
            $image_path = $request->file('image')->store('products');

            $product->image = $image_path;
    }
    Alert::success('Updated Successfully', 'Thank you');

    if (! $product->save()){
        return redirect()->route('products.index');
    }
    return redirect()->route('products.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        if($product->image){
            Storage::delete($product->image);
        }
        $product->delete();

        return response()->json([
            'success' => true
        ]);
    }
}
