@extends('managers.layout')
@section('content')
    <div class="container-fluid">
        <div class="row">
            {{-- All clients --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>1</h3>
                            <h5>Managers</h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-users"></i>
                        </div>
                        <a href="{{ route('register') }}" class="small-box-footer">
                            See   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            {{-- New Client --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>50</h3>
                            <h5>Workers</h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-plus"></i>
                        </div>
                        <a href="{{ url('/general-admin/workers/') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            {{-- Edit client --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>20</h3>
                            <h5>Clients</h5>
                        </div>
                        <div class="icon">
                            <i class="fas fa-edit"></i>
                        </div>
                        <a href="{{ route('register') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
            {{-- Delete client --}}
                <div class="col-lg-3 col-6">
                    <div class="small-box bgred-lighten-3">
                        <div class="inner">
                            <pre><h5>Restaurant</h5>
                            </pre>
                        </div>
                        <div class="icon">
                            <i class="fas fa-user-minus"></i>
                        </div>
                        <a href="{{ route('register') }}" class="small-box-footer">
                            Go   <i class="fas fa-arrow-circle-right"></i>
                        </a>
                    </div>
                </div>
        </div>
    </div>
@endsection