<x-main :title="$title">
    <table class="table table-sm text-center my-10">

        {{-- Head --}}
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Barang</th>
                <th>Stok</th>
            </tr>
        </thead>

        {{-- Body --}}
        <tbody>
            @if ($barang->count() == 0)
                <tr class="hover">
                    <td colspan="3" class="font-semibold">No data found</td>
                </tr>
            @else
                @foreach ($barang as $item)
                    <tr class="hover">
                        <td class="font-semibold">{{ $loop->iteration }}</td>
                        <td>{{ $item->kode_brg }}</td>
                        <td>{{ $item->stok }}</td>
                    </tr>
                @endforeach
            @endif
        </tbody>
    </table>

    <div class="join mt-10 ml-5">
        {{-- Prev Button --}}
        @if ($barang->onFirstPage())
            <button class="join-item btn btn-xs" disabled>«</button>
        @else
            <a href="{{ $barang->previousPageUrl() }}" class="join-item btn btn-xs">«</a>
        @endif

        {{-- Current Page --}}
        <button class="join-item btn btn-xs">Page {{ $barang->currentPage() }}</button>

        {{-- Next Button --}}
        @if ($barang->hasMorePages())
            <a href="{{ $barang->nextPageUrl() }}" class="join-item btn btn-xs">»</a>
        @else
            <button class="join-item btn btn-xs" disabled>»</button>
        @endif
    </div>
</x-main>
