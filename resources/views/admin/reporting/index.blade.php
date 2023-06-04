@extends('layout.layout-admin')

@section('content')

<div class="flex justify-between items-center mt-6">
    <h1 class="text-2xl font-bold text-gray-800 ml-60">Pelaporan Pemesanan Obat</h1>
    <a href="{{ url('/dashboard') }}" class="bg-gray-200 hover:bg-gray-300 text-gray-800 hover:text-gray-900 rounded-lg py-2 px-4 mr-10">
        Back to Dashboard
    </a>
</div>
<div class="ml-48 p-8 mt-8">
    <div class=" top-0 left-[202px] flex items-center mb-32">
        <div class="text-sm breadcrumbs">
            <ul>

              <li><a href="{{ url('/dashboard') }}" class="text-grey">Dashboard</a></li>

              <li><a href="" class="text-primary"> Transaksi Pemesanan Obat </a></li>
            </ul>
        </div>

    </div>
    @if (session('success'))
    <div class="alert alert-success shadow-lg mb-4">
        <div>
        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
        <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger shadow-lg">
            {{ session('error') }}
        </div>
    @endif
        <div class="bg-white shadow-md rounded-lg overflow-hidden">
            <table class="w-full">
              <thead class="bg-gray-200 text-gray-700">
                <tr>
                  <th class="py-3 px-4 text-left">Nama User</th>
                  <th class="py-3 px-4 text-left">Type Transaksi</th>
                  <th class="py-3 px-4 text-left">Jumlah Item Pembelian</th>
                  <th class="py-3 px-4 text-left">Total Pembayaran</th>
                  <th class="py-3 px-4 text-left">Bukti Pembayaran</th>
                  <th class="py-3 px-4 text-left">Metode Pembayaran</th>
                  <th class="py-3 px-4 text-left">Status</th>

                  <th class="py-3 px-4 text-left">Aksi</th>

                </tr>
              </thead>
              <tbody>
                @forelse ($transaction as $show)
                  <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-gray-100' : 'bg-white' }}">
                    <td class="py-3 px-4">{{ $show->user->name }}</td>
                    <td class="py-3 px-4">{{ $show->type }}</td>
                    <td class="py-3 px-4">{{ $show->qty_item }}</td>
                    <td class="py-3 px-4">{{ $show->total_harga }}</td>
                    <td class="py-3 px-4"><img class="w-24 h-24 mb-3 rounded-full shadow-lg" src="{{asset('upload/payment/'.$show->images)}}" alt=""/></td>
                    <td class="py-3 px-4">{{ $show->metode_payment }}</td>
                    <td class="py-3 px-4">
                        @if($show->status == "Tertunda")
                        <div class="badge badge-error text-white">{{ $show->status }}</div>
                        @elseif($show->status == "Gagal")
                            <div class="badge badge-warning text-white">{{ $show->status }}</div>
                        @elseif($show->status == "Selesai")
                            <div class="badge badge-success text-white">{{ $show->status }}</div>
                        @endif
                    </td>
                    <td class="">
                        {{-- <div class="badge badge-secondary"><a href="{{ route('show.detail', $show->id) }}" class="text-white">Detail</a></div> --}}
                        @if ($show->status == "Selesai")
                        <a href="{{ route('show.edit', $show->id) }}" class="btn badge-secondary text-white">Lihat Detail</a>
                        @elseif($show->status == "Tertunda")
                        <a href="{{ route('show.edit', $show->id) }}" class="btn badge-accent text-white">Konfirmasi</a>
                        @else

                        @endif
                      {{-- <form action="{{ route('show.delete', $show->id) }}" method="POST" class="inline-block">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="badge badge-error text-white">Hapus</button>
                      </form> --}}
                    </td>
                  </tr>

                @empty
                  <tr>
                    <td class="py-3 px-4 text-center" colspan="6">Tidak ada data Transaksi yang ditemukan.</td>
                  </tr>

                @endforelse
              </tbody>
            </table>
        </div>
    @if (session('success'))
    <div class="alert alert-success shadow-lg mb-4">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>{{ session('success') }}</span>
        </div>
    </div>
    @endif
    @if (session('error'))
        <div class="alert alert-danger shadow-lg">
            {{ session('error') }}
        </div>
    @endif

</div>
@endsection
