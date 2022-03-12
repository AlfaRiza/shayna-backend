@extends('layouts.default')

@section('content')
<div class="orders">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title">Daftar Transaction Masuk</div>
                </div>
                <div class="card-body">
                    <div class="table-stats order-table ov-h">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="serial">#</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Nomor</th>
                                    <th>Total transaksi</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @forelse($items as $item)
                                <tr>
                                    <td>{{ $item->id }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->email }}</td>
                                    <td>{{ $item->number }}</td>
                                    <td>IDR. {{ $item->transaction_total }}</td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                            <span class="badge badge-warning">
                                        @elseif($item->transaction_status == 'SUCCESS')
                                            <span class="badge badge-success">
                                        @elseif($item->transaction_status == 'FAILED')
                                            <span class="badge badge-danger">
                                        @else
                                            <span class="badge">
                                        @endif
                                        {{ $item->transaction_status }}
                                        </span>
                                    </td>
                                    <td>
                                        @if($item->transaction_status == 'PENDING')
                                        <form action="{{ route('transaction.status', $item->id) }}?status=SUCCESS" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-success btn-sm">
                                                <i class="fa fa-check"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('transaction.status', $item->id) }}?status=FAILED" method="POST" class="d-inline">
                                            @csrf
                                            <button class="btn btn-danger btn-sm">
                                                <i class="fa fa-times"></i>
                                            </button>
                                        </form>
                                        @endif
                                        <a href="{{ route('transaction.show', $item->id) }}" class="btn btn-info btn-sm"><i class="fa fa-eye"></i></a>
                                        <a href="{{ route('transaction.edit', $item->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('transaction.destroy', $item->id) }}" method="POST" class="d-inline">
                                            @method('delete')
                                            @csrf
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
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