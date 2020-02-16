@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-10">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Restaurant Products</h3>
                    <a href="{{ route('products.create') }}" class="btn btn-success float-right">New Product</a>
                </div>
                {{-- Created product message --}}
                @if(session('info'))
                    <br>
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                <div class="card-body  table-responsive">
                    <table id="example2" class="table table-bordered table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Price</th>
                                <th>Description</th>
                                <th>Category</th>
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($products as $product)
                            <tr>
                                <td>{{$product->name}}</td>
                                <td>{{$product->price}}</td>
                                <td>{{$product->description}}</td>
                                <td>{{$product->category}}</td>
                                <td><img class="img-responsive" alt="{{$product->name}}" width="200" height="130" src="/images/{{$product->image}}"></td>
                                <td>
                                    <a href="#" class="btn btn-success" type="submit">Edit</a>
                                    <a href="#" class="btn btn-warning" rol="button" type="submit">Disable</a>
                                    <a href="#" class="btn btn-danger" rol="button" type="submit">Delete</a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <aside class="control-sidebar control-sidebar-dark"></aside>
        </div>
    </div>
@endsection