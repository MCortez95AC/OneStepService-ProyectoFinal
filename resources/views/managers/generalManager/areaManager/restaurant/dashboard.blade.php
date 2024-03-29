@extends('managers.layout')
@section('content')
{{-- New Client --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>25</h3>
                <h5>Workers</h5>
            </div>
            <div class="icon">
                <i class="fas fa-user-plus"></i>
            </div>
            <a href="{{ url('/admin/super/workers/') }}" class="small-box-footer">
                See   <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
{{-- Edit client --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>30</h3>
                <h5>Products</h5>
            </div>
            <div class="icon">
                <i class="fas fa-edit"></i>
            </div>
            <a href="{{ route('register') }}" class="small-box-footer">
                See  <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
{{-- Delete client --}}
    <div class="col-lg-3 col-6">
        <div class="small-box bgred-lighten-3">
            <div class="inner">
                <pre><h5>Other</h5>
                </pre>
            </div>
            <div class="icon">
                <i class="fas fa-user-minus"></i>
            </div>
            <a href="{{ route('register') }}" class="small-box-footer">
                See  <i class="fas fa-arrow-circle-right"></i>
            </a>
        </div>
    </div>
@endsection