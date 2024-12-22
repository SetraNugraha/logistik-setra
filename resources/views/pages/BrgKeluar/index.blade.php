<x-main :title="$title">

    {{-- Alert --}}
    @if (Session::has('message'))
        <script>
            Swal.fire({
                title: 'Success',
                text: "{{ Session::get('message') }}",
                icon: 'success',
                confirmButtonText: 'Continue'
            })
        </script>
    @endif

    {{-- Button Add New  --}}
    <div class="my-5">
        <a href="{{ route('brg-keluar-create') }}" class="btn btn-warning btn-sm shadow-lg shadow-slate-300">Tambah
            Barang Keluar</a>
    </div>

    {{-- Table --}}
    <table class="table table-xs w-full text-center">

        {{-- Head --}}
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Barang Keluar</th>
                <th>Kode Barang</th>
                <th>Quantity</th>
                <th>Destination</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>

        {{-- Body --}}
        <tbody>
            @if ($barangKeluar->count() == 0)
                <tr class="hover">
                    <td colspan="6" class="font-semibold">No data found</td>
                </tr>
            @else
                @foreach ($barangKeluar as $item)
                    <tr class="hover">
                        <td class="font-semibold text-slate-500">{{ $loop->iteration }}</td>
                        <td>{{ $item->no_brg_keluar }}</td>
                        <td>{{ $item->barang->kode_brg }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->destination }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    {{-- Pagination --}}
    <div class="join mt-10 ml-5">
        {{-- Prev Button --}}
        @if ($barangKeluar->onFirstPage())
            <button class="join-item btn btn-xs" disabled>«</button>
        @else
            <a href="{{ $barangKeluar->previousPageUrl() }}" class="join-item btn btn-xs">«</a>
        @endif

        {{-- Current Page --}}
        <button class="join-item btn btn-xs">Page {{ $barangKeluar->currentPage() }}</button>

        {{-- Next Button --}}
        @if ($barangKeluar->hasMorePages())
            <a href="{{ $barangKeluar->nextPageUrl() }}" class="join-item btn btn-xs">»</a>
        @else
            <button class="join-item btn btn-xs" disabled>»</button>
        @endif
    </div>
</x-main>
