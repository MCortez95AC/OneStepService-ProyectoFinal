@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h3 class="card-title">Room Service Products</h3>
                    <a href="{{ route('products.rs.create') }}" class="btn bg-newOjbect float-right">New Product</a>&nbsp
                    <a href="{{ route('disabled.rs.products') }}" class="btn bg-newOjbect float-right mr-2">Disabled Products</a>
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
                                <td><img class="img-responsive" alt="{{$product->name}}" width="200" height="130" src="/images/RoomServiceProducts/{{$product->image}}"></td>
                                <td>
                                    <a href="{{ route('product.rs.edit',$product->id) }}" class="btn btn-success btn-sm" type="submit">Edit</a>
                                    <a href="javascript:document.getElementById('disable-{{$product->id}}').submit()" class="btn btn-warning btn-sm" type="submit">Disable</a>
                                    <a href="javascript:document.getElementById('delete-{{$product->id}}').submit()" class="btn btn-danger btn-sm"rol="button" type="submit">Delete</a>
                                    <form id="disable-{{$product->id}}" action="{{ route('product.rs.disable',$product->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                    </form>
                                    <form id="delete-{{$product->id}}" action="{{ route('product.rs.destroy',$product->id) }}" method="post">
                                    @method('delete')
                                    @csrf
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