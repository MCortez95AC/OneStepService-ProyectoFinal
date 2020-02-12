@extends('managers.layout')

@section('content')
    <div class="row justify-content-center">
        <div class="col-lg-6 ">
            <div class="card">
                <div class="card-header bg-primary">
                    <h4>New Product</h4>
                </div>
                <div class="card-body  table-responsive">
                    <form action="{{ route('products.store') }}" method="POST">
                        @csrf
                        <div class="form-group" >
                            <label>Name</label>
                            <input type="text" name="name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Price</label>
                            <input type="text"name="price" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <input type="text"name="description" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Image</label>
                            <input type='file' name="image" class="form-control" onchange="readURL(this);" />
                            <img id="preview" src="" class="img-thumbnail rounded mx-auto d-block" alt="Preview" />
                        </div>
                </div>
                    <div class="card-footer">
                        <input type="submit" class=" btn bg-success" value="Save">
                        <a href="{{ asset('/admin/super/restaurant/products/') }}" class="btn btn-warning">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="{{ asset('/js/previewProduct.js' )}}" defer></script>
@endsection