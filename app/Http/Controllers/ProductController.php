<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = Product::paginate(10);
        return view('products.index', compact('product'));
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
    public function store(Request $request)
    {

        $data = new Product;

        $data->title = $request->title;
        $data->description = $request->description;
        $data->sku = Str::of($request->title)->slug('-');
    
        $photo = $request->product_image;
        $imageName = time() . '.' . $photo->getClientOriginalExtension();
        $request->product_image->move('media', $imageName);
        $data->product_image = $imageName;
        $data->color = $request->color;
        $data->size = $request->size;
        $data->style = $request->style;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $data->save();
        Alert::success('Product Create', 'Success product added successfullay');
       


        return redirect()->back();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Product::find($id);
        return view('products.edit', compact('data'));
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
        $data = Product::find($id);
        $data->title = $request->title;
        $data->description = $request->description;
        $data->sku = Str::of($request->title)->slug('-');
        $data->color = $request->color;
        $data->size = $request->size;
        $data->style = $request->style;
        $data->stock = $request->stock;
        $data->price = $request->price;
        $photo = $request->product_image;
        if($photo)
        {
            $imageName = time() . '.' . $photo->getClientOriginalExtension();
            $request->product_image->move('media', $imageName);
            $data->product_image = $imageName;
            $data->save();
        }
       else
       {
            $data->save();
       }
       Alert::success('Product Update', '  product Update successfullay');
        return redirect()->route('product.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = Product::find($id);
        $data->delete();
        
        Alert::warning('Product Delete', '  product Delete successfullay');
        return redirect()->back();
    }
}
