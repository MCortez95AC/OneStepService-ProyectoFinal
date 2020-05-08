@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h3 class="card-title">Restaurant Products</h3>
                    <a href="{{ route('products.create') }}" class="btn bg-newOjbect float-right">New Product</a>&nbsp
                    <a href="{{ route('disabled.products') }}" class="btn bg-newOjbect float-right mr-2">Disabled Products</a>
                </div>
                {{-- Created product message --}}
                @if(session('info'))
                    <br>
                    <div class="alert alert-success">
                        {{session('info')}}
                    </div>
                @endif
                <div class="card-body  table-responsive overflow-auto" style="height: 450px">
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
                                <td><img class="img-responsive" alt="{{$product->name}}" width="200" height="130" src="/images/RestaurantProducts/{{$product->image}}"></td>
                                <td>
                                    <a href="{{ route('product.edit',$product->id) }}" class="btn btn-success" type="submit">Edit</a>
                                    <form action="{{ route('product.disable',$product->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                        <button class="btn btn-warning" type="submit">Disable</button>
                                    </form>
                                    <form action="{{ route('product.destroy',$product->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                        <button class="btn btn-danger" rol="button" type="submit">Delete</button>
                                    </form>
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