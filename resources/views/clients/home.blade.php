@extends('layouts.auth')

@section('content')
<div class="container py-4">
    <div class="row justify-content-center">
            <div class="col-sm-6 rounded">
                <a href="{{ route('restaurant.home') }}">
                    <div class="card">
                    <span class="thmheader"><h4>Restaurant</h4></span>
                        <img class="card-img" src="{{asset('/images/Client/home-wallpapers/portada-restaurant.jpg')}}" alt="Restaurant">
                    </div>
            </div>
            <div class="col-sm-6">
                <a href="#">
                    <div class="card">
                    <span class="thmheader"><h4>Room Service</h4></span>
                        <img class="card-img" src="{{asset('/images/Client/home-wallpapers/roomservice.jpg')}}" alt="Restaurant">
                    </div>
                </a>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-gray">Restaurant</div>
                    <div class="card-body">
                        Hi awesome client
                    </div>
                    <div class="card-footer">Soy el puto footer</div>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="card">
                    <div class="card-header bg-gray">Restaurant</div>
                    <div class="card-body">
                        Hi awesome client
                    </div>
                    <div class="card-footer">Soy el puto footer</div>
                </div>
            </div>
    </div>
</div>
@endsection