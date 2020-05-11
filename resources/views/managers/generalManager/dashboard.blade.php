@extends('managers.layout')
@section('content')
    <div class="container">
        <div class="row py-4">
            {{-- All clients --}}
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Restaurant Orders Panel</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <a href="{{ route('restaurant.panel') }}" class="small-box-footer">
                            See   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Room Service Orders Panel</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-tachometer-alt"></i>
                        </div>
                        <a href="{{ route('restaurant.panel') }}" class="small-box-footer">
                            See   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            {{-- Edit client --}}
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Clients</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('client.index') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            {{-- Delete client --}}
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Restaurant Products</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-utensils"></i>
                        </div>
                        <a href="{{ route('products.index') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Room Service Products</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-concierge-bell"></i>
                        </div>
                        <a href="{{ route('products.rs.index') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Restaurant Workers</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <a href="{{ route('workers.index') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Room Service Workers</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-users-cog"></i>
                        </div>
                        <a href="{{ route('workers.rs.index') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
                <div class="col-lg-4 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h5>Sales</h5>
                        </div>
                        <div class="icon" style="position: unset">
                            <i class="fas fa-file-invoice-dollar"></i>
                        </div>
                        <a {{-- href="{{ route('workers.rs.index') }} --}}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection