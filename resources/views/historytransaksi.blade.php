@extends('layout.layout')

@section('content')
<div>
    <h1 class="text-[#6A62C4] mt-[80px] ml-[150px] text-[14px] font-bold">History Transaksi</h1>
    <div class="flex justify-center ">
        <div class="w-[1220px] h-[1px] bg-[#6A62C4] mt-[8px] "></div>
    </div>

    <div class="flex mt-[33px] p-5">
        <h1 class="ml-[140px]">#ID</h1>
        <h1 class="ml-[50px]">Deskripsi</h1>
        <h1 class="ml-[160px]">Waktu</h1>
        <h1 class="ml-[550px]">Status Transaksi</h1>
        <h1 class="ml-[200px]">Total</h1>
    </div>

    {{-- <div class="flex justify-center ">

            <div class="flex mt-[25px] ">
                @forelse($transactions as $show)
                <div>
                    <h1 class="ml-[50px] text-[14px]">{{ $show->type }}</h1>
                </div>
                <h1 class="ml-[180px] text-[14px]">{{ date('d F Y H:i:s', strtotime($show->created_at)) }}</h1>
                @if($show->status = 'Selesai (sudah melakukan pembayaran)')
                <h1 class="ml-[390px] text-[14px]">Lunas</h1>
                @endif
                <div>
                    <h1 class="ml-[180px] text-[14px]">Rp{{ number_format($show->total_harga, 0, ',', '.') }}</h1>
                    <p class="ml-[180px] text-[10px] text-[#6A62C4]">{{ $show->metode_payment }}</p>
                </div>
                @empty
                <p>Tidak ada Transaksi</p>
                @endforelse
            </div>
        </div>
    </div> --}}
    <div class=" border rounded-[12px] mt-[30px] p-5">
        <div class="overflow-x-auto mt-[33px] ml-[130px] ">
        <table class="table table-zebra w-full">
          <!-- head -->
          <tbody>
            @forelse($transactions as $show)
            <!-- row -->
            <tr>
              <th>#{{ $show->id }}</th>
              <td class="ml-10">{{ $show->type }}</td>
              <td>{{ date('d F Y H:i:s', strtotime($show->created_at)) }}</td>
              <td>
                @if($show->status = 'Selesai (sudah melakukan pembayaran)')
                <h1 class="ml-[390px] text-[14px]">Lunas</h1>
                @endif
              </td>
              <td>Rp{{ number_format($show->total_harga, 0, ',', '.') }}</td>
            </tr>

            @empty
            <p>Tidak ada Transaksi</p>
            @endforelse
          </tbody>
        </table>
        </div>
    </div>

</div>
@endsection
