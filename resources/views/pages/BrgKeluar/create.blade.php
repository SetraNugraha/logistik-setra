<x-main :title="$title">

    {{-- Alert --}}
    @if (Session::has('message'))
        <script>
            Swal.fire({
                title: 'Error',
                text: "{{ Session::get('message') }}",
                icon: 'error',
                confirmButtonText: 'Continue'
            })
        </script>
    @endif


    <section>
        <div class="w-full text-center">
            <h1 class="font-bold text-xl py-7 tracking-wider text-red-500">Tambah Barang Keluar</h1>
        </div>
        <form action="{{ route('brg-keluar-store') }}" method="POST" class="max-w-md mx-auto">
            @csrf

            {{-- Kode Barang --}}
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="kode_brg" id="floating_kode_brg"
                    class="block uppercase py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required maxlength="6" minlength="6" />
                <label for="floating_kode_brg" id="label_kode_brg"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Kode
                    Barang (ex: BRGMSK, min/max:6)</label>
            </div>

            {{-- Barang by kode barang --}}
            <div id="brg-info" class="mb-5"></div>

            {{-- Quantity --}}
            <div class="relative z-0 w-full mb-5 group">
                <input type="number" name="quantity" id="floating_quantity"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_quantity"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Quantity</label>
            </div>

            {{-- Destination --}}
            <div class="relative z-0 w-full mb-5 group">
                <input type="text" name="destination" id="floating_destination"
                    class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-0 border-b-2 border-gray-300 appearance-none  focus:outline-none focus:ring-0 focus:border-blue-600 peer"
                    placeholder=" " required />
                <label for="floating_destination"
                    class="peer-focus:font-medium absolute text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 scale-75 top-3 -z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 peer-focus:text-blue-600  peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:scale-75 peer-focus:-translate-y-6">Destination
                    (Tujuan Barang)</label>
            </div>

            {{-- Button Submit --}}
            <button type="submit"
                class="text-white mb-3 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm w-full sm:w-auto px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Submit</button>
        </form>
    </section>

    {{-- Show Exists Barang --}}
    <script>
        const kodeInput = document.querySelector("#floating_kode_brg")
        const barangInfo = document.querySelector("#brg-info")

        // Kode Input
        kodeInput.addEventListener("input", () => {
            const kodeBrg = kodeInput.value.trim().toUpperCase()

            if (kodeBrg.length === 6) {
                fetch(`/barang/${kodeBrg}`)
                    .then((response) => response.json())
                    .then((data) => {
                        if (data.exists) {
                            barangInfo.innerHTML = `
                            <div"
                                class="flex justify-between items-center px-5 py-2 ring-2 ring-slate-300 rounded-xl shadow-lg shadow-slate-300">
                                    <div>
                                        <h1 class="font-semibold text-slate-700">Kode Barang</h1>
                                    <p class="text-sm font-semibold text-slate-500">${data.barang.kode_brg}</p>
                                    </div>

                                    <div>
                                        <h1 class="font-semibold text-slate-700">Stok</h1>
                                        <p class="text-sm font-semibold text-slate-500">${data.barang.stok}</p>
                                    </div>
                            </div>`
                        } else {
                            barangInfo.innerHTML =
                                `<p class="text-white font-semibold py-2 px-5 mb-5 tracking-widest bg-red-500 rounded-lg">${data.message}</p>`
                        }
                    })
                    .catch((error) => {
                        console.error("Error fetching data barang", error)
                        barangInfo.innerHTML =
                            `<p class="text-white font-semibold p-2 bg-red-500 rounded-lg">Terjadi error saat mengambil data barang</p>`
                    })
            } else {
                barangInfo.innerHTML = ` `
            }
        })
    </script>

    {{-- Input Value --}}
    <script>
        const inputKode = document.querySelector("#floating_kode_brg")
        const labelKode = document.querySelector("#label_kode_brg")

        inputKode.addEventListener('input', () => {
            if (inputKode.value.length !== 6) {
                // Label
                labelKode.classList.add("peer-focus:text-red-500")
                labelKode.classList.remove("peer-focus:text-blue-600")

                // Input
                inputKode.classList.add("focus:border-red-500")
                inputKode.classList.remove("focus:border-blue-600")
            } else {
                // Label
                labelKode.classList.add("peer-focus:text-blue-600")
                labelKode.classList.remove("peer-focus:text-red-500")

                // Input
                inputKode.classList.add("focus:border-blue-600")
                inputKode.classList.remove("focus:border-red-500")
            }
        })
    </script>
</x-main>
