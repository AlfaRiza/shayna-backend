@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Tambah Foto Barang</strong>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product-galleries.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label for="product_id" class="form-control-label">Product</label>
                <select name="product_id" id="product_id" class="form-control @error('product_id') is-invalid @enderror">
                    @foreach($products as $product)
                        <option value="{{ $product->id }}">{{ $product->name }}</option>
                    @endforeach
                </select>
                @error('product_id')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="photo" class="form-control-label">Foto Barang</label>
                <input type="file" id="photo" name="photo" accept="image/*" value="{{ old('photo') }}" class="form-control @error('photo') is-invalid @enderror">
                @error('photo')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="is_default" class="form-control-label">Default ?</label>
                <br>
                <label for="ya">
                    <input type="radio" id="ya" name="is_default" value="1" class="form-control @error('is_default') is-invalid @enderror">
                    Yes
                </label>
                &nbsp;
                <label for="tidak">
                    <input type="radio" id="tidak" name="is_default" value="0" class="form-control @error('is_default') is-invalid @enderror">
                    No
                </label>
                @error('is_default')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection