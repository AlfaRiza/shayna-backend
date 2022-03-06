@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah barang</strong> <small>{{ $product->name }}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('product.update', $product->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Barang</label>
                <input type="text" id="name" name="name" value="{{ old('name', $product->name) }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="type" class="form-control-label">Tipe Barang</label>
                <input type="text" id="type" name="type" value="{{ old('type', $product->type) }}" class="form-control @error('type') is-invalid @enderror">
                @error('type')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="description" class="form-control-label">Deskripsi Barang</label>
                <textarea name="description" id="description" class="form-control @error('description') is-invalid @enderror" rows="10">
                    {{ old('description', $product->description) }}
                </textarea>
                @error('description')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="price" class="form-control-label">Harga Barang</label>
                <input type="number" id="price" name="price" value="{{ old('price', $product->price) }}" class="form-control @error('price') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="quantity" class="form-control-label">Qty Barang</label>
                <input type="number" id="quantity" name="quantity" value="{{ old('quantity', $product->quantity) }}" class="form-control @error('quantity') is-invalid @enderror">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Tambah Barang</button>
            </div>
        </form>
    </div>
</div>
@endsection

@push('after-style')
<script src="https://cdn.ckeditor.com/ckeditor5/32.0.0/classic/ckeditor.js"></script>
@endpush

@push('after-script')
<script>
    ClassicEditor
            .create( document.querySelector( '#description' ) )
            .then( editor => {
                    console.log( editor );
            } )
            .catch( error => {
                    console.error( error );
            } );
</script>
@endpush