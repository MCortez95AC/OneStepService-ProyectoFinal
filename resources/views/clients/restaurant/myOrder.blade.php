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
                            <p> <input type="number" class="form-control text-center qty" value="{{$product->quantity}}"> x <span class="price">{{$product->price}}</span> €</p>
                            <p class="movil d-none"> =</p>
                            <p class="stockStatus prodTotal movil d-none">€ <span class="totalProduct">15.00</span></p>
                            &nbsp
                            <a href="#" class="d-none movil btn btn-danger btn-sm remove "><i class="fa fa-trash-o"></i></a>
                        </div>
                        <div class="prodTotal cartSection">
                            <p>€ <span class="totalProduct">15.00</span></p>
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
                <li class="totalRow"><a href="#" class="btna continue btn-demo" data-toggle="modal" data-target="#payment">Checkout</a></li>
            </ul>
        </div>
    </div>
</div>


{{-- Payment --}}
<div class="container demo">
    <!-- Modal -->
    <div class="modal right fade" id="payment" tabindex="-1" role="dialog" aria-labelledby="paymentLabel">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header" style="display:block">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="paymentLabel">Payment</h4>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <aside class="col-sm-12">
                                <article class="card">
                                    <div class="card-body p-5">
                                        <ul class="nav bg-light nav-pills rounded nav-fill mb-3" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" data-toggle="pill" href="#nav-tab-card">
                                                    <i class="fa fa-credit-card"></i> Credit Card</a></li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#nav-tab-paypal">
                                                    <i class="fab fa-paypal"></i> Paypal</a></li>
                                            <li class="nav-item">
                                                <a class="nav-link" data-toggle="pill" href="#nav-tab-bank">
                                                    <i class="fa fa-university"></i> Hotel Account</a></li>
                                        </ul>
                                        <div class="tab-content">
                                            <div class="tab-pane fade show active" id="nav-tab-card">
                                                <p class="alert alert-success">Some text success or error</p>
                                                <form role="form">
                                                    <div class="form-group">
                                                        <label for="username">Full name (on the card)</label>
                                                        <input type="text" class="form-control" name="username" placeholder="" required="">
                                                    </div> <!-- form-group.// -->
                                                    <div class="form-group">
                                                        <label for="cardNumber">Card number</label>
                                                        <div class="input-group">
                                                            <input type="text" class="form-control" name="cardNumber" placeholder="">
                                                            <div class="input-group-append">
                                                                <span class="input-group-text text-muted">
                                                                    <i class="fab fa-cc-visa"></i>   <i class="fab fa-cc-amex"></i>  
                                                                    <i class="fab fa-cc-mastercard"></i>
                                                                </span>
                                                            </div>
                                                        </div>
                                                    </div> <!-- form-group.// -->
                                                    <div class="row">
                                                        <div class="col-sm-8">
                                                            <div class="form-group">
                                                                <label><span class="hidden-xs">Expiration</span> </label>
                                                                <div class="input-group">
                                                                    <input type="number" class="form-control" placeholder="MM" name="">
                                                                    <input type="number" class="form-control" placeholder="YY" name="">
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-sm-4">
                                                            <div class="form-group">
                                                                <label data-toggle="tooltip" title="" data-original-title="3 digits code on back side of the card">CVV <i class="fa fa-question-circle"></i></label>
                                                                <input type="number" class="form-control" required="">
                                                            </div> <!-- form-group.// -->
                                                        </div>
                                                    </div> <!-- row.// -->
                                                    <button class="subscribe btn btn-primary btn-block" type="button"> Confirm </button>
                                                </form>
                                            </div> <!-- tab-pane.// -->
                                            <div class="tab-pane fade" id="nav-tab-paypal">
                                                <p class="alert alert-success">Some text success or error</p>
                                                <p>Paypal is easiest way to pay online</p>
                                                <p>
                                                    <button type="button" class="btn btn-primary"> <i class="fab fa-paypal"></i> Log in my Paypal </button>
                                                </p>
                                                <p><strong>Note:</strong> Once you leave the hotel your payment details will be deleted </p>
                                            </div>
                                            <div class="tab-pane fade" id="nav-tab-bank">
                                                <p class="alert alert-success">Some text success or error</p>
                                                <p>Hotel accaunt details</p>
                                                <dl class="param">
                                                    <dt>Name: </dt>
                                                    <dd>{{Auth::guard('client')->user()->name}}  {{Auth::guard('client')->user()->lastname}}</dd>
                                                </dl>
                                                <dl class="param">
                                                    <dt>Accaunt number: </dt>
                                                    <dd>{{Auth::guard('client')->user()->hotel_account}}</dd>
                                                </dl>
                                                <dl class="param">
                                                    <dt>Expiration date: </dt>
                                                    <dd> 20/05/2020</dd>
                                                </dl>
                                                <button class="subscribe btn btn-primary btn-block" type="button"> Confirm </button>
                                                <hr>
                                                <p><strong>Note:</strong> 
                                                    This is your personal account during your visit i this hotel,
                                                    load your bill and cancel it when you are leaving the hotel.
                                                </p>
                                            </div> <!-- tab-pane.// -->
                                        </div> <!-- tab-content .// -->
                                    </div> <!-- card-body.// -->
                                </article> <!-- card.// -->
                            </aside> <!-- col.// -->
                        </div> <!-- row.// -->
                    </div>
                    <!--container end.//-->
                </div>
            </div><!-- modal-content -->
        </div><!-- modal-dialog -->
    </div><!-- modal -->
</div><!-- container -->
@endsection
