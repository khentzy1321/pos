@extends('layouts.master')

@section('title', 'Edit Product')
@section('content')

<h2>Edit Product</h2>
<div class="card">
    <div class="card-body">
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
                 <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="name"
                                placeholder="Name" value="{{ old('name', $product->name) }}">
                       @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                 <div class="form-group">
                    <label for="description">Description</label>
                    <textarea type="text" name="description" class="form-control @error('description') is-invalid @enderror" id="description"
                                placeholder="Name" >{{ old('description', $product->description) }} </textarea>
                       @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="image">Image</label>
                    <div class="custom-file">
                        <input type="file" name="image" class="custom-file-input" id="image">
                        <label for="image" class="custom-file-label">Choose Image</label>
                       @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                    </div>
                </div>
                <div class="form-group">
                    <label for="barcode">Barcode</label>
                    <input type="text" name="barcode" class="form-control @error('barcode') is-invalid @enderror" id="barcode"
                                placeholder="Barcode" value="{{ old('barcode', $product->barcode) }}">
                       @error('barcode')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="price">Price</label>
                    <input type="text" name="price" class="form-control @error('price') is-invalid @enderror" id="price"
                                placeholder="Price" value="{{ old('price', $product->price) }}">
                       @error('price')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="quantity">Quantity</label>
                    <input type="text" name="quantity" class="form-control @error('quantity') is-invalid @enderror" id="quantity"
                                placeholder="Quantity" value="{{ old('quantity', $product->quantity) }}">
                       @error('quantity')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                <div class="form-group">
                    <label for="status">Status</label>
                    <select type="text" name="status" class="form-control @error('status') is-invalid @enderror" id="status">
                        <option value="1" {{ old('status', $product->status) === 1 ? 'selected' : '' }}>Active</option>
                        <option value="0" {{ old('status', $product->status) === 0 ? 'selected' : '' }}>InActive</option>
                    </select>
                       @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                       @enderror
                </div>
                <button class="btn btn-primary float-right" type="submit">Update Product</button>
        </form>
    </div>
</div>
@endsection

@section('js')
       <script src={{ asset('plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}></script>
       <script>
           $(document).ready(function(){
            bsCustomFileInput.init();
           }) ;
         </script>
@endsection
