@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Daftar Barang</div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Name</th>
                                    <th>Type</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <th>{{ $item->id }}</th>
                                    <th>{{ $item->name }}</th>
                                    <th>{{ $item->type }}</th>
                                    <th>{{ $item->price }}</th>
                                    <th>{{ $item->quantity }}</th>
                                    <th>
                                        <a href="#" class="btn btn-info btn-sm"><i class="fa fa-picture-o"></i></a>
                                        <a href="{{ route('product.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('product.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </th>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center p-5">
                                            Data tidak tersedia
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection