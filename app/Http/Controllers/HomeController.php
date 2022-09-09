<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
 

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    public function search(Request $request)
    {
        
         $pfrom=$request->price_from;
         $pto=$request->price_to;
     
        if ($request->title) {
            $product = Product::where('title', 'LIKE', '%'.$request->title.'%')->paginate(10) ;
            return view('products.index',compact('product'));
        }
        if ($request->variant) {
            $product = Product::where('size', 'LIKE', '%'.$request->variant.'%')->paginate(10) ;
            return view('products.index',compact('product'));
        }
        if ((int)$pfrom  && (int)$pto ) {
            
            $product = Product::whereBetween('price',[(int)$pfrom,(int)$pto])->paginate(10) ;
            return view('products.index',compact('product'));
        }
        
  
       
    }
}
