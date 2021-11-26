@extends('layouts.admin.master')

@section('breadcrumb')
<!-- Bread crumb and right sidebar toggle -->
<div class="page-breadcrumb">
    <div class="row">
        <div class="col-7 align-self-center">
            <h4 class="page-title text-truncate text-dark font-weight-medium mb-1">Detail Transaksi</h4>
            <div class="d-flex align-items-center">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb m-0 p-0">
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="#" class="text-muted">Data Transaksi</a></li>
                        <li class="breadcrumb-item text-muted active" aria-current="page">Detail Transaksi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>
<!-- End Bread crumb and right sidebar toggle -->
@endsection

@section('content')
<!-- Container fluid  -->
<div class="container-fluid">
    <!-- Start Page Content -->
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <dl class="row">
                        <dt class="col-sm-3">Nama Pembeli</dt>
                        <dd class="col-sm-9">{{ $transaction->buyer->name }}</dd>

                        <dt class="col-sm-3">Alamat Pengiriman</dt>
                        <dd class="col-sm-9">{{ $transaction->buyer->userDetail->address }}</dd>

                        <dt class="col-sm-3">Nomor WhatsApp Pembeli</dt>
                        <dd class="col-sm-9">{{ $transaction->buyer->userDetail->phone_number }}</dd>

                        <dt class="col-sm-3">Catatan Pembelian</dt>
                        <dd class="col-sm-9">{{ $transaction->note == null ? '-' : $transaction->note }}</dd>
                    </dl>
                    <div class="table-responsive">
                        <table class="table table-striped table-bordered no-wrap">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nama Barang</th>
                                    <th>Nama Penjual</th>
                                    <th>Qty</th>
                                    <th>Status</th>
                                    <th>SubTotal</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($transaction->transaction_details as $item)
                                    @if (auth()->user()->role == 'admin')
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ $item->goods->name }}</td>
                                            <td>{{ $item->goods->user->name }}</td>
                                            <td>{{ $item->qty }}</td>
                                            <td class="text-capitalize">
                                                @if ($item->status == 'pending')
                                                    <span class="badge badge-warning badge-pill">{{ $item->status }}</span>
                                                @elseif ($item->status == 'reject')
                                                    <span class="badge badge-danger badge-pill">{{ $item->status }}</span>
                                                @else
                                                    <span class="badge badge-success badge-pill">{{ $item->status }}</span>
                                                @endif
                                            </td>
                                            <td>{{ 'Rp ' . number_format($item->goods->price * $item->qty, 0, ',', '.') }}
                                        </tr>
                                    @elseif (auth()->user()->role == 'penjual')
                                        @if (isset($item->goods->user_id))
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td>{{ $item->goods->name }}</td>
                                                <td>{{ $item->goods->user->name }}</td>
                                                <td>{{ $item->qty }}</td>
                                                <td class="text-capitalize">
                                                    @if ($item->status == 'pending')
                                                        <span class="badge badge-warning badge-pill">{{ $item->status }}</span>
                                                    @elseif ($item->status == 'reject')
                                                        <span class="badge badge-danger badge-pill">{{ $item->status }}</span>
                                                    @else
                                                        <span class="badge badge-success badge-pill">{{ $item->status }}</span>
                                                    @endif
                                                </td>
                                                <td>{{ 'Rp ' . number_format($item->goods->price * $item->qty, 0, ',', '.') }}
                                            </tr>
                                        @endif
                                    @endif
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="font-weight-bold">
                                    <td colspan="5">Total</td>
                                    <td>{{ 'Rp ' . number_format($transaction->total, 0, ',', '.') }}
                                    </td>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ route('transactions.index') }}" class="btn btn-secondary btn-rounded">Kembali</a>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Content -->
</div>
<!-- End Container fluid  -->
@endsection
