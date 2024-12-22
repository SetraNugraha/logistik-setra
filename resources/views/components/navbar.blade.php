<section class="navbar bg-base-100 shadow-lg shadow-slate-300 px-7 rounded-xl border border-slate-200">
    <div class="navbar-start">
        <a href="{{ route("gudang") }}" class="btn btn-ghost text-xl">Setra Logistik</a>
    </div>
    <div class="navbar-center hidden lg:flex">
        <ul class="menu menu-horizontal flex items-center gap-x-3">

            {{-- Gudang --}}
            <li class="{{ Request::is('/') ? 'bg-slate-200 font-semibold rounded-lg' : '' }}"><a
                    href="{{ route('gudang') }}">Gudang</a></li>

            {{-- Barang Masuk --}}
            <li class="{{ Request::is('brg-masuk') ? 'bg-slate-200 font-semibold rounded-lg' : '' }}"><a
                    href="{{ route('brg-masuk-index') }}">Barang Masuk</a></li>

            {{-- Barang Keluar --}}
            <li class="{{ Request::is('brg-keluar') ? 'bg-slate-200 font-semibold rounded-lg' : '' }}"><a
                    href="{{ route('brg-keluar-index') }}">Barang Keluar</a></li>
        </ul>
    </div>
    <div class="navbar-end">
        <img src="/assets/img/penguin.png" alt="penguin" class="size-10">
    </div>
</section>
