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
                    @foreach($categories as $category)
                        <li class="nav-item">
                            <a class="nav-link btn" href="#">{{$category->name}}</a>
                        </li>
                    @endforeach
                    <li class="nav-item">
                        <button class="btn btn-primary" style="background-color: #007bff00;"><i class="fas fa-concierge-bell"></i> My order</button>
                    </li>
                </ul>
            </div>  
        </nav>
    </div>
@endsection