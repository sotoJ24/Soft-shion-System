<!DOCTYPE html>
<html lang="en"> 
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
    <link rel="icon" href="{{asset('TriskeleIcon.png')}}"> 
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{asset('resourcesCartView/css/styles.css')}}">
    <title>Cart Shopping</title>
</head>
<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                @if ($cartItems !== null && count($cartItems) > 0)
                <div class="title">
                    <div class="row">
                        <div class="col"><h4><b>Shopping Cart</b></h4></div>
                        <div class="col align-self-center text-right text-muted">items {{count($cartItems)}}</div>
                    </div>
                </div>
                <div class="row border-top border-bottom">
                    @foreach ($cartItems as $item)
                        <input type="hidden" name="addOrSubtract" value={{$total_price += $item['product_price']}}checked>
                        <div class="row main align-items-center">
                            <img src="/storage/images/{{$item['product_image']}}" alt="Image" class="img img-responsive">
                            <div class="col">
                                <div class="row text-muted">Article Name</div>
                                <div class="row">{{$item['product_name']}}</div>
                            </div>
                            <div class="col">
                                <form action="{{route('store_cart_route')}}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}" />
                                    <input type="hidden" name="product_id" value="{{ $item['product_id'] }}">
                                    
                                    <button min="0" class="btn-dark" type="submit" name="addOrSubtract" value="0">-</button>

                                    <input type="number" readonly id="quantity"  min="1" value="{{ $item['quantity'] }}">

                                    <button type="submit" min="0" class="btn-dark" name="addOrSubtract" value="1">+</button>
                                </form>
                            </div>
                            <div class="col">&dollar; {{$item['product_price']}}</div> {{--<a href="{{route('delete_by_id_cart_route',$item['product_id'])}}" class="close">&#10005;</a> --}}
                            <form action="{{route('delete_by_id_cart_route',$item['product_id'])}}" method="POST">
                                @csrf 
                                @method('DELETE') 
                                <button type="submit" class="btn-dark">x</button>
                                {{-- <a type="submit" class="btn close">&#10005;</a> --}}
                            </form>

                        </div>
                    @endforeach 
                </div>
                <div class="back-to-shop"><a class="btn-dark" href="{{route('index_route')}}">&leftarrow;<span class="text-white">Back to shop</span></div></a>
            </div>
            <div class="col-md-4 summary">
                <div><h5><b>Summary</b></h5></div>
                <hr>
                <div class="row"> 
                    <div class="col" style="padding-left:0;">ITEMS {{count($cartItems)}}</div>
                    {{-- <div class="col text-right">&euro; 132.00</div> --}}
                </div>
                    <p>SHIPPING</p>
                    <select><option class="text-muted">Standard-Delivery- &dollar;5.00</option></select>
                    {{-- <p>Empty Cart</p> --}}
                <form action="{{route('delete_cart_route')}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button class="btn-danger">Empty Cart</button>
                </form> 

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col">TOTAL PRICE</div> 
                    <div class="col text-right">&dollar; {{$total_price}}</div>
                </div>
                <form action="{{route('export_pdf_cart_route')}}" method="GET">
                    @csrf
                    <button href="{{route('export_pdf_cart_route')}}" class="btn">CHECKOUT</button>
                </form>
                {{-- <a href="{{route('export_pdf_cart_route')}}" class="btn-dark">CHECKOUT</a> --}}
            </div>
        </div>

    </div>
    @else
        {{-- <h4 style="margin-left: 355px">The cart is empty</h4> --}}
        <img style="margin-left: 285px" class="messageCart" src="{{asset('resourcesCartView/images/empty_cart.gif')}}">
        <form action="{{route('index_route')}}" method="GET">
            @csrf
            <button style="margin-left: 385px" class="btn-dark">Back to the shop</button>
        </form>
    @endif
	<script src="{{asset('resourcesCartView/js/script.js')}}"></script>
</body>
</html>
