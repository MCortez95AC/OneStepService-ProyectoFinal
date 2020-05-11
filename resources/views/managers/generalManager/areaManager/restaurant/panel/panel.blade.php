@extends('layouts.auth')
{{-- Hola desde el pc 1 --}}
@section('content')
<nav class="navbar navbar-light bg-light justify-content-between" style="background-color: #f0efef !important">
    <a class="navbar-brand">
        <h3>Real Time Panel Orders</h3>
    </a>
    <form class="form-inline">
        <a href="{{ url('/') }}" class="btn btn-outline-success my-2 my-sm-0">Back your home </a>
    </form>
</nav>
<div class="container py-4" style="min-height: 74vh">
    <div class="row justify-content-center">

        <div class="card">
            <div class="card-header bg-primary">
                <h3 class="card-title">Orders</h3>
                <a type="button" class="btn bg-newOjbect float-right" style="font-size: 1.3rem"><i class="far fa-bell"></i></a>
            </div>
            {{-- Created product message --}}
            @if(session('info'))
            <br>
            <div class="alert alert-success">
                {{session('info')}}
            </div>
            @endif
            <div class="card-body  table-responsive">
                <table id="targetPersonal" class="table table-bordered table-hover" style="font-size: 1.3rem">
                    <thead>
                        <tr class="text-center">
                            <th>Room </th>
                            <th>FullName </th>
                            <th>Order</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody id="orders">
                    </tbody>
                </table>
                <p><strong>Note:</strong>
                    Click to <span>Solved</span> to erase the order
                </p>
            </div>
        </div>
    </div>
</div>
@endsection
