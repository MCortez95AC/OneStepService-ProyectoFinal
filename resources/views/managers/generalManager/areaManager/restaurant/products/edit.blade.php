@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>Edit Product</h4>
                </div>
                <div class="card-body  table-responsive">
                    <form action="{{ route('product.update',$product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('put')
                        <div class="form-group" >
                            <label>Name</label>
                            <input type="text" name="name" value="{{ $product->name }}" class="form-control">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text"name="price" value="{{ $product->price }}" class="form-control">
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"name="description" value="{{ $product->description }}" class="form-control">
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control" onchange="readURL(this);" value="{{ $product->image }}" />
                            <img id="preview" src="" class="img-thumbnail rounded mx-auto d-block" alt="Preview" />
                            <span class="text-danger">{{$errors->first('image')}}</span>
                        </div>
                </div>
                    <div class="card-footer">
                        <input type="submit" class=" btn bg-success" value="Update">
                        <a href="{{ asset('/admin/restaurant/products/') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/previewProduct.js' )}}" defer></script>
@endsection