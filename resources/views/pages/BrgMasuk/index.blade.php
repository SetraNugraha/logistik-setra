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
        <a href="{{ route('brg-masuk-create') }}" class="btn btn-primary btn-sm shadow-lg shadow-slate-300">Tambah
            Barang Masuk</a>
    </div>

    {{-- Table --}}
    <table class="table table-xs w-full text-center">

        {{-- Head --}}
        <thead>
            <tr>
                <th>No.</th>
                <th>No. Barang Masuk</th>
                <th>Kode Barang</th>
                <th>Quantity</th>
                <th>Origin</th>
                <th>Tanggal Masuk</th>
            </tr>
        </thead>

        {{-- Body --}}
        <tbody>
            @if ($barangMasuk->count() == 0)
                <tr class="hover">
                    <td colspan="6" class="font-semibold">No data found</td>
                </tr>
            @else
                @foreach ($barangMasuk as $item)
                    <tr class="hover">
                        <td class="font-semibold">{{ $loop->iteration }}</td>
                        <td>{{ $item->no_brg_masuk }}</td>
                        <td>{{ $item->barang->kode_brg }}</td>
                        <td>{{ $item->quantity }}</td>
                        <td>{{ $item->origin }}</td>
                        <td>{{ \Carbon\Carbon::parse($item->created_at)->format('d M Y') }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="join mt-10 ml-5">
        {{-- Prev Button --}}
        @if ($barangMasuk->onFirstPage())
            <button class="join-item btn btn-xs" disabled>«</button>
        @else
            <a href="{{ $barangMasuk->previousPageUrl() }}" class="join-item btn btn-xs">«</a>
        @endif

        {{-- Current Page --}}
        <button class="join-item btn btn-xs">Page {{ $barangMasuk->currentPage() }}</button>

        {{-- Next Button --}}
        @if ($barangMasuk->hasMorePages())
            <a href="{{ $barangMasuk->nextPageUrl() }}" class="join-item btn btn-xs">»</a>
        @else
            <button class="join-item btn btn-xs" disabled>»</button>
        @endif
    </div>

</x-main>
