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
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <img src="/images/RestaurantProducts/1586958249bacalla-amb-samfaina.jpg" alt="product" class="itemImg" />
                            <h3>Item Name 1</h3>
                            <p> <input type="number" class="form-control text-center qty" value="1"> x $5.00</p>
                            <p class="movil d-none"> =</p>
                            <p class="stockStatus movil d-none">$15.00</p>
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
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <img src="/images/RestaurantProducts/1586958249bacalla-amb-samfaina.jpg" alt="" class="itemImg" />
                            <h3>Item Name 1</h3>
                            <p> <input type="number" class="form-control text-center qty" value="1"> x $5.00</p>
                            <p class="movil d-none"> =</p>
                            <p class="stockStatus movil d-none">$15.00</p>
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
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <img src="/images/RestaurantProducts/1586958249bacalla-amb-samfaina.jpg" alt="" class="itemImg" />
                            <h3>Item Name 1</h3>
                            <p> <input type="number" class="form-control text-center qty" value="1"> x $5.00</p>
                            <p class="movil d-none"> =</p>
                            <p class="stockStatus movil d-none">$15.00</p>
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
                <li class="items odd">
                    <div class="infoWrap"> 
                        <div class="cartSection">
                            <img src="/images/RestaurantProducts/1586958249bacalla-amb-samfaina.jpg" alt="" class="itemImg" />
                            <h3>Item Name 1</h3>
                            <p> <input type="number" class="form-control text-center qty" value="1"> x $5.00 </p>
                            <p class="movil d-none"> =</p>
                            <p class="stockStatus movil d-none">$15.00</p>
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

    {{-- opcion 2 --}}
{{--   <table id="cart" class="table table-hover table-condensed">
    <thead>
      <tr>
        <th style="width:50%">Product</th>
        <th style="width:10%">Price</th>
        <th style="width:8%">Quantity</th>
        <th style="width:22%" class="text-center">Subtotal</th>
        <th style="width:10%"></th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td data-th="Product">
          <div class="row">
            <div class="col-sm-2 hidden-xs"><img src="http://lorempixel.com/output/technics-q-c-300-300-4.jpg" alt="..." class="img-responsive" /></div>
            <div class="col-sm-10">
              <h4 class="nomargin">Product 1</h4>
              <p>Quis aute iure reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Lorem ipsum dolor sit amet.</p>
            </div>
          </div>
        </td>
        <td data-th="Price">$1.99</td>
        <td data-th="Quantity">
          <input type="number" class="form-control text-center" value="1">
        </td>
        <td data-th="Subtotal" class="text-center">1.99</td>
        <td class="actions" data-th="">
          <button class="btn btn-info btn-sm"><i class="fa fa-refresh"></i></button>
          <button class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></button>
        </td>
      </tr>
    </tbody>
    <tfoot>
      <tr class="visible-xs">
        <td class="text-center"><strong>Total 1.99</strong></td>
      </tr>
      <tr>
        <td><a href="#" class="btn btn-warning"><i class="fa fa-angle-left"></i> Continue Shopping</a></td>
        <td colspan="2" class="hidden-xs"></td>
        <td class="hidden-xs text-center"><strong>Total $1.99</strong></td>
        <td><a href="#" class="btn btn-success btn-block">Checkout <i class="fa fa-angle-right"></i></a></td>
      </tr>
    </tfoot>
  </table> --}}
    </div>
@endsection