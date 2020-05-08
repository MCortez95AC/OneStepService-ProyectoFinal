@extends('layouts.auth')

@section('content')
    <div class="bg">
        <h1 class="text-center">Restaurant</h1>
        <nav class="navbar navbar-expand-md bg-dark navbar-dark navbar-inverse" id="navbar-restaurant">
            <a class="navbar-brand" href="#"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse text-center navbar-collapse" id="collapsibleNavbar">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link btn" href="{{ route('client.home') }}" style="background-color: #007bff00;"><i class="fas fa-home"></i> Home</a>
                    </li>
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link btn" href="{{ route('products.category',$category->name)}}">{{$category->name}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <a href="{{ route('restaurant.myOrder') }}" class="btn btn-primary" style="background-color: #007bff00;"><i class="fas fa-concierge-bell"></i> My order <span class="badge-order">0</span></a>
                    </li>
                </ul>
            </div>  
        </nav>
        <hr>
        <div class="container w-85">
            <div class="row justify-content-center">
                @foreach($products as $product)
                    <div class="col-sm-4 rounded">
                        <div class="card">
                            <img class="card-img-top img-responsive image" src="/images/RestaurantProducts/{{$product->image}}" alt="producto">
                            <div class="card-body">
                                <h6 class="card-subtitle mb-2 text-muted"><span class="name">{{$product->name}}</span>, <span class="price">{{$product->price}}</span> €</h6>
                                <p class="card-text text-dark collapse " id="block-{{$product->id}}">{{$product->description}}</p>
                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <a href="#block-{{$product->id}}" class="card-link btn btn-primary" data-toggle="collapse" aria-expanded="false" aria-controls="block-{{$product->id}}">
                                        <span class="collapsed">
                                            Read more
                                        </span>
                                        <span class="expanded">
                                            Read Less
                                        </span>
                                    </a>
                                    <button type="button" class="btn btn-primary ml-1 addToOrder"><i class="fas fa-plus-circle"></i> Order</button>
                                    &nbsp
                                    <div class="quantity">
                                        <input class="qty" type="number" min="1" max="9" step="1" value="1">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection