<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $carts = Cart::with(['user','product','payment','status'])->where('user_id',Auth::user()->id)->get();
         return view('frontend.cart')->with('carts',$carts);
    }

    
    function add(Product $product)
    {
        
         
        //return $product;
        try {
            Cart::updateOrCreate([
            'product_id' =>$product->id,
            'user_id' => Auth::user()->id,
            'status_id' =>1,
            'quantity' => 1,
            'price' => $product->price,
            'descount' => $product->promotion,
            'payment_id' =>1,
        ]);
            session()->flash('success','Addicionado na carrinha com sucesso');
             return redirect()->route('carts');
              
        } catch (\Throwable $th) {
            session()->flash('error','Erro ao adicionar a carrinha');
             return redirect()->route('carts');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function show(Cart $cart)
    {
        
    }
    public function getCarts()
    {
        return Cart::with(['user','product','payment','status'])->where('user_id',Auth::user()->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function edit(Cart $cart)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cart $cart)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Cart  $cart
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        try{
             $cart->delete();
              session()->flash('success','Deletado da carrinha com sucesso');
             return redirect()->back();
        }catch(\Throwable $th){
            session()->flash('error','Erro ao deletar da carrinha');
            return redirect()->back();
        }
    }
}