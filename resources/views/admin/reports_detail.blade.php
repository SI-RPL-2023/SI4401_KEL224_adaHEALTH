@extends('layout.layout-admin')

@section('content')
<div class="ml-48 p-8 ">
    <div class="rounded-full w-100 inline-block align-middle p-2 ">
        <div class="text-sm breadcrumbs">
            <ul>
              <li><a href="{{ url('/dashboard') }}">Dashboard</a></li>
              <li><a href="#" class="text-primary">Rincian Laporan</a></li>

            </ul>
          </div>
    </div>
</div>
<div class="ml-48 py-8 px-8">
    <div class="flex gap-4">
        <div>
            <label for="period">Cek Periode Laporan</label>
            <form action="{{ route('detail.report') }}" method="GET">
                <select name="period" class="select select-bordered select-md w-full max-w-xs">
                    <option value="all" selected>SEMUA</option>
                    <option value="current_month">BULAN SEKARANG</option>
                    <option value="last_month">BULAN KEMARIN</option>
                </select>
                <button type="submit" class="btn btn-active btn-ghost mt-3">Cek Data</button>
            </form>
        </div>
        <div class="ml-auto">
            <label for="">Download Periode Laporan</label>
            <form action="{{ route('download.transactions') }}" method="GET">
                <select name="period" class="select select-bordered select-md w-full max-w-xs">
                    <option value="all" selected>Semua</option>
                    <option value="current_month">Bulan Sekarang</option>
                    <option value="last_month">Bulan Kemarin</option>
                </select>
                <button type="submit" class="btn btn-active btn-ghost mt-3">Download</button>
            </form>
        </div>
    </div>


    <div class="overflow-x-auto">

        <table class="table table-zebra w-full mt-10 p-8">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>User ID</th>
                    <th>Nama Pembeli</th>
                    <th>Obat ID</th>
                    <th>Obat Nama</th>
                    <th>Jenis Tranksasi</th>
                    <th>Jumlah Item Pembelian</th>
                    <th>Total Harga</th>
                    <th>Metode Pembayaran</th>
                    <th>Status</th>
                    <th>Created At</th>
                    <th>Updated At</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($transactions as $transaction)
                <tr>
                    <td>{{ $transaction->id }}</td>
                    <td>{{ $transaction->id_user }}</td>
                    <td>{{ $transaction->user->name }}</td>
                    <td>{{ $transaction->id_obat }}</td>
                    <td>{{ $transaction->obat->nama }}</td>
                    <td>{{ $transaction->type }}</td>
                    <td>{{ $transaction->qty_item }}</td>
                    <td>{{ number_format($transaction->total_harga, 0, ',', '.') }}</td>
                    <td>{{ $transaction->metode_payment }}</td>
                    <td>{{ $transaction->status }}</td>
                    <td>{{ $transaction->created_at }}</td>
                    <td>{{ $transaction->updated_at }}</td>
                </tr>
                @endforeach
                <tr>
                    <td colspan="10">
                        Total Penghasilan Tranksasi :Rp.  {{ number_format($total_pendapatan, 0, ',', '.') }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    <h2 class="mt-10  font-medium">Trend Obat yang Banyak Dipesan</h2>
    <table class="mt-10 table w-full">
        <thead>
            <tr>
                <th>Obat ID</th>
                <th>Nama Obat</th>
                <th>Jumlah Transaksi</th>
                <th>Total Obat Dibeli</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($trendObat as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->nama }}</td>
                <td>{{ $item->jumlahTransaksi }}</td>
                <td>{{ $item->totalObat }}</td>
            </tr>
        @endforeach

        </tbody>
    </table>
    <!-- ... -->
</div>



@endsection
