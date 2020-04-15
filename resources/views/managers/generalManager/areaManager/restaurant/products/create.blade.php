@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 mt-4">
            <div class="card">
                <div class="card-header bg-table-headers">
                    <h4>New Product</h4>
                </div>
                <div class="card-body  table-responsive">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group" >
                            <label>Name</label>
                            <input type="text" name="name" value="{{ old('name') }}" class="form-control">
                            <span class="text-danger">{{$errors->first('name')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text"name="price" value="{{ old('price') }}" class="form-control">
                            <span class="text-danger">{{$errors->first('price')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"name="description" value="{{ old('description') }}" class="form-control">
                            <span class="text-danger">{{$errors->first('description')}}</span>
                        </div>
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select class="form-control" id="category" value="{{ old('category') }}" name="category">
                                @foreach($categories as $category)
                                    <option>{{$category->name}}</option>
                                @endforeach
                            </select>
                            <span class="text-danger">{{$errors->first('category')}}</span>
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input name="image" type="file" class="form-control" onchange="readURL(this);" />
                            <img id="preview" src="" class="img-thumbnail rounded mx-auto d-block" alt="Preview" />
                            <span class="text-danger">{{$errors->first('image')}}</span>
                        </div>
                </div>
                    <div class="card-footer">
                        <input type="submit" class=" btn bg-success" value="Save">
                        <a href="{{ asset('/admin/restaurant/products/') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/previewProduct.js' )}}" defer></script>
@endsection