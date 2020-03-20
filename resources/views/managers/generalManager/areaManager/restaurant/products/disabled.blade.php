@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-11">
            <div class="card">
                <div class="card-header bg-primary">
                    <h3 class="card-title">Disabled Products</h3>
                </div>
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
                                    <form action="{{ route('product.disable',$product->id) }}" method="post">
                                    @method('put')
                                    @csrf
                                        <button class="btn btn-success" type="submit">Enable</button>
                                    </form>
                                    {{--<form action="{{ route('product.destroy',$product->id) }}" method="post">
                                    @method('delete')
                                    @csrf
                                        <button class="btn btn-danger" rol="button" type="submit">Delete</button>
                                    </form> --}}
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