@extends('layouts.myOrderL')

@section('content')
    <div class="container py-2">
        <div class="wrap cf">
            <div class="heading cf">
                <h1>My Order</h1>
                <a href="{{ route('restaurant.home') }}" class="continue">Add More</a>
            </div>
            <div class="cart">
                <ul class="cartWrap">
                    @foreach($products as $product)
                        <li class="items odd">
                            <div class="infoWrap"> 
                                <div class="cartSection">
                                    <img src="{{$product->image}}" alt="product" class="itemImg" />
                                    <h3 class="name">{{$product->name}}</h3>
                                    <p> <input type="number" class="form-control text-center qty" value="{{$product->quantity}}"> x {{$product->price}} €</p>
                                    <p class="movil d-none"> =</p>
                                    <p class="stockStatus prodTotal movil d-none">$15.00</p>
                                    &nbsp
                                    <a href="#" class="d-none movil btn btn-danger btn-sm remove "><i class="fa fa-trash-o"></i></a>
                                </div>  
                                <div class="prodTotal cartSection">
                                    <p>$15.00</p>
                                </div>
                                <div class="cartSection removeWrap">
                                    <a href="#" class="btn btn-danger btn-sm remove"><i class="fa fa-trash-o"></i></a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                </ul>
            </div>
            <div class="subtotal cf">
                <ul>
                    <li class="totalRow"><span class="label">Subtotal</span><span class="value">$35.00</span></li>
                    <li class="totalRow"><span class="label">Tax</span><span class="value">$4.00</span></li>
                    <li class="totalRow final"><span class="label">Total</span><span class="value">$44.00</span></li>
                    <li class="totalRow"><a href="#" class="btna continue">Checkout</a></li>
                </ul>
            </div>
        </div>
    </div>
@endsection