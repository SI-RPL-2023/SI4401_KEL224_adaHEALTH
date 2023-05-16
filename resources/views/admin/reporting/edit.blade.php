@extends('layout.layout-admin')

@section('content')

<div class="mt-32 ml-48">

    <div class="text-sm breadcrumbs">
        <ul>
          <li><a href="{{ url('/dashboard') }}" class="text-grey">Dashboard</a></li>
          <li><a href="" class="text-primary">Detail Transaksi Pemesanan Obat # {{ $transaction->id }}</a></li>
        </ul>
    </div>
    <a href="{{ url('/transaksi') }}" class="btn">Kembali</a>
   <div class="bg-gray-100 p-8 rounded-lg min-w-min mt-32">
    <h1 class="text-lg font-semibold mb-4">Transaksi Obat Form</h1>
    <div class="grid grid-cols-4 mt-16 mb-3">
        <div>
            <span>ID TRANSAKSI </span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="id" name="id" value="{{ $transaction->id }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div class="ml-5">
            <span>ID USER </span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="id_user" name="id_user" value="{{ $transaction->id_user }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>

    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>NAMA USER</span>
        </div>
        <div>
            <input type="text" placeholder="Type here" value="{{ $transaction->user->name }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div></div>
        <div></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>TIPE TRANSAKSI</span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="type" name="type" value="{{ $transaction->type }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div class="ml-3">JENIS OBAT</div>
        <div><input type="text" placeholder="Type here" id="type" name="type" value="{{ $transaction->obat->nama }}" class="input input-bordered w-full max-w-xs" readonly/></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>TOTAL ITEM</span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="qty_item" name="qty_item" value="{{ $transaction->qty_item }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div class="ml-3">GAMBAR OBAT</div>
        <div><div><img class="" src="{{asset('upload/obat/'.$transaction->obat->photo)}}" width="50%" alt="{{ $transaction->photo }}"></div></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>TOTAL PEMBAYARAN</span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="total_harga" name="total_harga" value="Rp{{ number_format($transaction->total_harga, 0, ',', '.') }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div></div>
        <div></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>METODE PEMBAYARAN</span>
        </div>
        <div>
            <input type="text" placeholder="Type here" id="metode_payment" name="metode_payment"  value="{{ $transaction->metode_payment }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div class="ml-5">BUKTI PEMBAYARAN <label for="my-modal-3" class="btn">Lihat lebih jelas</label></div>
        <!-- The button to open modal -->


        <!-- Put this part before </body> tag -->
        <input type="checkbox" id="my-modal-3" class="modal-toggle" />
        <div class="modal">
            <div class="modal-box relative">
                <label for="my-modal-3" class="btn btn-sm btn-circle absolute right-2 top-2">✕</label>
                <h3 class="text-lg font-bold">Bukti Pembayaran</h3>
                <img class="" src="{{asset('upload/payment/'.$transaction->images)}}"  alt="{{ $transaction->images }}">
            </div>
        </div>
        <div><img class="" src="{{asset('upload/payment/'.$transaction->images)}}" width="50%" alt="{{ $transaction->images }}"></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>STATUS</span>
        </div>
        <div>
            @if($transaction->status == "Tertunda")
                <div class="badge badge-error text-white">{{ $transaction->status }}</div>
            @elseif($transaction->status == "Gagal")
                <div class="badge badge-warning text-white">{{ $transaction->status }}</div>
            @elseif($transaction->status == "Selesai")
                <div class="badge badge-success text-white">{{ $transaction->status }}</div>
            @endif
        </div>
        <div></div>
        <div></div>
    </div>
    <div class="grid grid-cols-4 mt-8 mb-3">
        <div>
            <span>TANGGAL PEMESANAN</span>
        </div>
        <div>
            <input type="text" placeholder="Type here"  value="{{ $transaction->created_at }}" class="input input-bordered w-full max-w-xs" readonly/>
        </div>
        <div></div>
        <div></div>
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
    @if($transaction->status == "Tertunda" || $transaction->status == "Gagal")
    <form action="{{ route('show.update', ['id' => $transaction->id]) }}" method="POST" enctype="multipart/form-data" class="">
        @csrf
        <div class="px-4 py-3 mb-8 bg-white rounded-lg shadow-md">
            <select class="select select-accent w-full max-w-xs" id="status" name="status">
                <option selected>Tertunda</option>
                <option>Selesai</option>
                <option>Gagal</option>
            </select>
<p></p>
            <button type="submit" class="px-4 py-2 text-white bg-purple-600 rounded-lg hover:bg-purple-700 mt-8">
                Konfirmasi
            </button>
        </div>
    </form>
    @else
    <div class="alert alert-success shadow-lg p-8">
        <div>
          <svg xmlns="http://www.w3.org/2000/svg" class="stroke-current flex-shrink-0 h-6 w-6" fill="none" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>
          <span>Transaksi ini sudah ber-status Selesai</span>
        </div>
      </div>
        <p class="text-green-500"></p>
    @endif
</div>
@endsection

