@extends('layouts.default')

@section('content')
<div class="card">
    <div class="card-header">
        <strong>Ubah Transaksi</strong> <small>{{ $transaction->uuid }}</small>
    </div>
    <div class="card-body card-block">
        <form action="{{ route('transaction.update', $transaction->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name" class="form-control-label">Nama Pemesan</label>
                <input type="text" id="name" name="name" value="{{ old('name', $transaction->name) }}" class="form-control @error('name') is-invalid @enderror">
                @error('name')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="email" class="form-control-label">Email</label>
                <input type="email" id="email" name="email" value="{{ old('email', $transaction->email) }}" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <small class="text-danger">
                        {{ $message }}
                    </small>
                @enderror
            </div>
            <div class="form-group">
                <label for="number" class="form-control-label">Nomor HP</label>
                <input type="text" id="number" name="number" value="{{ old('number', $transaction->number) }}" class="form-control @error('price') is-invalid @enderror">
            </div>
            <div class="form-group">
                <label for="address" class="form-control-label">Address</label>
                <input type="text" id="address" name="address" value="{{ old('address', $transaction->address) }}" class="form-control @error('address') is-invalid @enderror">
            </div>

            <div class="form-group">
                <button class="btn btn-primary btn-block" type="submit">Ubah Transaksi</button>
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