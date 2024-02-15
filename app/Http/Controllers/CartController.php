<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use PDF;
 
class CartController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $total_price = 0; 
        $cartItems = session()->get('cart');
        return view('cartView', compact('cartItems','total_price'));
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

    public function export_to_pdf()
    {

        $cartItems = session()->get('cart');

        $pdf = PDF::loadView('pdf.cartInvoice',[
            'cartItems'=>$cartItems
        ]);

        return $pdf->download('cartInvoice.pdf');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
    {

        $productId = $request->input('product_id');
        $quantity = (float)$request->input('quantity',1);
        $addOrSubtract = $request->input('addOrSubtract');
        $product = Article::findOrFail($productId);


        $cart = session()->get('cart', []);

        if (isset($cart[$productId]) && ($quantity < $product->quantity)) {

            if($this->isValidQuantity($cart, $productId, $addOrSubtract, $quantity, $product->quantity)){
                $quantityResult =  $addOrSubtract
                        ?   $cart[$productId]['quantity'] += $quantity
                        :   $cart[$productId]['quantity'] -= $quantity;

                $cart[$productId]['product_price'] = $product->article_price * $quantityResult;
            }
        }
        else if($quantity < $product->quantity){
            $cart[$productId] = [
                'product' => $product,
                'quantity' => $quantity,
                'product_id' => $product->id,
                'product_code' => $product->article_code,
                'product_name' => $product->article_name,
                'product_price' => $product->article_price * $quantity,
                'product_image' => $product->image
            ];
        }
        else{
            return "Quantity not in stock";
        }

        session()->put('cart', $cart);

        return redirect()->route('get_cart_route');
    }

    public function isValidQuantity($cart, $productId, $addOrSubtract, $quantity, $productQuantity) {
        $currentQuantity = $cart[$productId]['quantity'];

        if (!(($currentQuantity <= 1 && $addOrSubtract == 0) ||
            ($currentQuantity >= $productQuantity && $addOrSubtract == 1)))
        {
            return true;
        }

        return false;
    }

    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function show(Article $article)
    {
        //
    }

    
    public function totalSum()
    {
        $cart = session()->get('cart'); 

        return response()->json($cart[7]['quantity']);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroyById($productId)
    {
        $cart = session()->get('cart');

        unset($cart[$productId]);

        session()->put('cart', $cart);

        return redirect()->back();
    }

    public function destroy()
    {
        session()->forget('cart');

        return redirect()->back();
    }
}
