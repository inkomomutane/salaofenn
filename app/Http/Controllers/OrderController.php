<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\CreateOrder;
use App\Http\Requests\Order\UpdateOrder;
use App\Order;
use App\Product;
use Dotenv\Result\Result;
use Karson\MpesaPhpSdk\Mpesa;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Order::with(['user','status','payment','contact'=>null])->get();
    }
    /**
         * Display a listing of the resource.
         *
         * @return \Illuminate\Http\Response
         */
        public function buyOne(Product $product)
        {
            return view('frontend.buy')->with('product',$product);
        }

        
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function storeWeb(CreateOrder $createOrderRequest)
    {
        //dd($createOrderRequest);
        $result = $this->store($createOrderRequest);
       // dd($result);
       
        
        if($result['status'] == 201 ){
             session()->flash('success','Compra efetuada com sucesso.');
            return redirect()->route('buylogs');
        }else{
            session()->flash('error','Erro ao efetuar a compra.');
            return redirect()->back();
        }
    }
    public function storeCart(Request $request){
        $orders = [];
        if($request!=NULL){
            foreach($request->all()['cart'] as $order){
                //return $order['user']['name'];
                $orders[] = [
                    'client_name' => $order['user']['name'],
                    'product_or_service_name'=>$order['product']['name'],
                    'quantity' => $order['quantity'],
                    'total_price' => (
                        ($order['quantity'] * $order['product']['price'])
                        - 
                        ($order['quantity'] * 
                            ($order['product']['price']
                                 * ($order['product']['promotion']/100)
                                 )
                        )
                    ),
                    'maded_by'=> Auth::user()->name,
                    'status_id'=> 1,
                    'user_id' => Auth::user()->id,
                    'payment_id' =>$order['payment_id']
                ];
            }
        }
       // return $orders;
        try {
           $created =[];
                    $mpesa = new Mpesa();
                    $mpesa->setApiKey('83f7zvajuj5dp27aj9fsrcm1py6lqsr4');
                    $mpesa->setPublicKey('MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmptSWqV7cGUUJJhUBxsMLonux24u+FoTlrb+4Kgc6092JIszmI1QUoMohaDDXSVueXx6IXwYGsjjWY32HGXj1iQhkALXfObJ4DqXn5h6E8y5/xQYNAyd5bpN5Z8r892B6toGzZQVB7qtebH4apDjmvTi5FGZVjVYxalyyQkj4uQbbRQjgCkubSi45Xl4CGtLqZztsKssWz3mcKncgTnq3DHGYYEYiKq0xIj100LGbnvNz20Sgqmw/cH+Bua4GJsWYLEqf/h/yiMgiBbxFxsnwZl0im5vXDlwKPw+QnO2fscDhxZFAwV06bgG0oEoWm9FnjMsfvwm0rUNYFlZ+TOtCEhmhtFp+Tsx9jPCuOd5h2emGdSKD8A6jtwhNa7oQ8RtLEEqwAn44orENa1ibOkxMiiiFpmmJkwgZPOG/zMCjXIrrhDWTDUOZaPx/lEQoInJoE2i43VN/HTGCCw8dKQAwg0jsEXau5ixD0GUothqvuX3B9taoeoFAIvUPEq35YulprMM7ThdKodSHvhnwKG82dCsodRwY428kg2xM/UjiTENog4B6zzZfPhMxFlOSFX4MnrqkAS+8Jamhy1GgoHkEMrsT5+/ofjCx0HjKbT5NuA2V/lmzgJLl3jIERadLzuTYnKGWxVJcGLkWXlEPYLbiaKzbJb2sYxt+Kt5OxQqC1MCAwEAAQ==');
                    $mpesa->setEnv('test');// 'live' production environment

                    //This creates transaction between an M-Pesa short code to a phone number registered on M-Pesa.

                   $result = $mpesa->c2b('11114', '258'.$request['contact'],$request['total_price'], 'T340'. Str::random(10), '171717');
               //   $result = 
                if($result->status == 201){
                    foreach($orders as $order ){
                            $created[] =  Order::UpdateOrCreate($order);
                        }
                            return ['Orders'=>$created,'message'=>'Order inserted successful','status'=>201
                                        ];
                }else{
                    return ['status'=>401,'message'=>$result->response];;
                }
           
          
        } catch (\Throwable $th) {
            return ['status'=>401,'message'=>$th];
        }
        return ['status'=>401];
    }



    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\Order\CreateOrder $createOrderRequest
     * @return \Illuminate\Http\Response
     */
    public function store(CreateOrder $createOrderRequest)
    {
        //dd($createOrderRequest->all());
        try {

                  $mpesa = new Mpesa();
                    $mpesa->setApiKey('83f7zvajuj5dp27aj9fsrcm1py6lqsr4');
                    $mpesa->setPublicKey('MIICIjANBgkqhkiG9w0BAQEFAAOCAg8AMIICCgKCAgEAmptSWqV7cGUUJJhUBxsMLonux24u+FoTlrb+4Kgc6092JIszmI1QUoMohaDDXSVueXx6IXwYGsjjWY32HGXj1iQhkALXfObJ4DqXn5h6E8y5/xQYNAyd5bpN5Z8r892B6toGzZQVB7qtebH4apDjmvTi5FGZVjVYxalyyQkj4uQbbRQjgCkubSi45Xl4CGtLqZztsKssWz3mcKncgTnq3DHGYYEYiKq0xIj100LGbnvNz20Sgqmw/cH+Bua4GJsWYLEqf/h/yiMgiBbxFxsnwZl0im5vXDlwKPw+QnO2fscDhxZFAwV06bgG0oEoWm9FnjMsfvwm0rUNYFlZ+TOtCEhmhtFp+Tsx9jPCuOd5h2emGdSKD8A6jtwhNa7oQ8RtLEEqwAn44orENa1ibOkxMiiiFpmmJkwgZPOG/zMCjXIrrhDWTDUOZaPx/lEQoInJoE2i43VN/HTGCCw8dKQAwg0jsEXau5ixD0GUothqvuX3B9taoeoFAIvUPEq35YulprMM7ThdKodSHvhnwKG82dCsodRwY428kg2xM/UjiTENog4B6zzZfPhMxFlOSFX4MnrqkAS+8Jamhy1GgoHkEMrsT5+/ofjCx0HjKbT5NuA2V/lmzgJLl3jIERadLzuTYnKGWxVJcGLkWXlEPYLbiaKzbJb2sYxt+Kt5OxQqC1MCAwEAAQ==');
                    $mpesa->setEnv('test');// 'live' production environment

                    //This creates transaction between an M-Pesa short code to a phone number registered on M-Pesa.

                    $result = $mpesa->c2b('11114', '258'.$createOrderRequest->contact,$createOrderRequest->total_price, 'T340'. Str::random(10), '171717');
                  //  dd($result);
                    if($result->status == 201){
                         $created = Order::Create(
                            $createOrderRequest->all()
                        );
                     return ['Order'=>$created,'message'=>'Order inserted successful','status'=>201
                        ];
                    }else{
                        //dd($result);
                        return ['status'=>401];
                    }
    } catch (\Throwable $th) {
            return ['status'=> 401];
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return Order::with(['user','status','payment'])->where('id',$order->id)->first();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Order\UpdateOrder $updaterOrderRequest
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrder $updaterOrderRequest, Order $order)
    {
         try {
            $order->update($updaterOrderRequest->all());
                 return response()->json(['Order'=>$order,'message'=>'Order updated successful','status'=>201],201);
        } catch (\Throwable $th) {
            return response()->json(['error'=>'Error on updating data. Please try again.'],404);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
         try {
             $order->delete();
              return response()->json(['message'=>'Data deleted Successful', 'status'=>201],201);
        } catch (\Throwable $th) {
              return response()->json(['message'=>'Error on deleting data. Please try again.','status'=>404],404);
        }
    }
}