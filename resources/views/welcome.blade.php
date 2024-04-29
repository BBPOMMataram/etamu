<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="dark">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>{{ env('APP_NAME') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

    @vite(['resources/css/app.css', 'resources/js/app.js'])

    <script src="{{ asset('assets/js/webcam/webcam.min.js') }}"></script>
</head>

<body class="font-sans antialiased dark:bg-black dark:text-white/50">
    <div class="bg-gray-50 text-black/50 dark:bg-black dark:text-white/50">
        <img id="background" class="absolute -left-20 top-0 max-w-[877px]"
            src="https://laravel.com/assets/img/welcome/background.svg" />
        <div
            class="relative min-h-screen flex flex-col items-center justify-center selection:bg-[#FF2D20] selection:text-white">
            <div class="relative w-full max-w-2xl px-6 lg:max-w-7xl">
                <header class="flex flex-col text-center items-center mt-10">
                    <img src="{{ asset('images/logo-without-label.png') }}" alt="logo BPOM" width="50px">
                    <h1 class="mt-2 text-red-100 font-semibold">E Tamu - BBPOM di Mataram</h1>
                </header>

                <main class="mt-6">
                    <form id="tamu" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid gap-6 lg:grid-cols-2 lg:gap-8">
                            <div href="#" id="docs-card"
                                class="flex flex-col items-start gap-6 overflow-hidden rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] md:row-span-3 lg:p-10 lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">
                                <div class="relative flex items-center gap-6 lg:items-end w-full">
                                    <div id="docs-card-content" class="flex items-start lg:flex-col w-full">
                                        <div class="pt-3 sm:pt-5 lg:pt-0 w-full">
                                            <h2 class="text-xl font-semibold text-black dark:text-white">DATA DIRI</h2>
                                            <div class="mt-4 [&_select]:text-black [&_input]:text-black">
                                                <div class="flex flex-col mb-4">
                                                    <label class="mb-1" for="layanan">
                                                        Layanan <span class="text-red-500">*</span>
                                                    </label>
                                                    <select name="layanan" id="layanan" class="rounded" required>
                                                        <option value="">==Pilih Layanan==</option>
                                                        @foreach ($services as $item)
                                                            <option value="{{ $item->id }}">{{ $item->name }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                    <input type="text" name="layananCustom" id="layananCustom"
                                                        class="rounded mt-1 hidden" placeholder="isi keperluan disini">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="nama">nama <span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="nama" id="nama" class="rounded"
                                                        list="guests" required autofocus>
                                                    <datalist id='guests'>
                                                        @foreach ($guests as $item)
                                                            <option value="{{ $item->name }}" />
                                                        @endforeach
                                                    </datalist>
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="hp">hp <span
                                                            class="text-red-500">*</span></label>
                                                    <input type="text" name="hp" id="hp" class="rounded"
                                                        required>
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="email">email</label>
                                                    <input type="text" name="email" id="email" class="rounded">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="instansi">instansi</label>
                                                    <input type="text" name="instansi" id="instansi"
                                                        class="rounded">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="alamat">alamat</label>
                                                    <input type="text" name="alamat" id="alamat" class="rounded">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="pangkat">pangkat</label>
                                                    <input type="text" name="pangkat" id="pangkat" class="rounded">
                                                </div>
                                                <div class="flex flex-col mb-4">
                                                    <label class="capitalize mb-1" for="jabatan">jabatan</label>
                                                    <input type="text" name="jabatan" id="jabatan"
                                                        class="rounded">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div
                                class="flex justify-center text-center rounded-lg bg-white p-6 shadow-[0px_14px_34px_0px_rgba(0,0,0,0.08)] ring-1 ring-white/[0.05] transition duration-300 hover:text-black/70 hover:ring-black/20 focus:outline-none focus-visible:ring-[#FF2D20] lg:pb-10 dark:bg-zinc-900 dark:ring-zinc-800 dark:hover:text-white/70 dark:hover:ring-zinc-700 dark:focus-visible:ring-[#FF2D20]">

                                <div class="pt-3 sm:pt-5 flex flex-col">
                                    <h2 class="text-xl font-semibold text-black dark:text-white mb-0">SELFIE</h2>
                                    <div class="text-xl">📷</div>

                                    <div id="my_camera" class="" style="width:320px; height:240px;"></div>
                                    <div id="my_result"></div>

                                    <div class="flex w-full justify-between mt-2">
                                        <button type="button" onclick="take_snapshot()"
                                            class="flex-1 bg-[#FF2D20]/10 px-4 py-2 hover:bg-[#ff2b205d] rounded-l">SNAP</button>
                                        <button type="button" onclick="reset_snapshot()"
                                            class="flex-1 bg-[#6d5c5b]/10 px-4 py-2 hover:bg-[#6d5c5b5d] rounded-r">ULANG</button>
                                    </div>
                                </div>
                            </div>
                            <div class="flex w-full justify-around">
                                <button type="submit"
                                    class="bg-[#FF2D20]/10 px-12 py-3 rounded hover:bg-[#ff2b205d]">SIMPAN</button>
                                <button type="reset"
                                    class="bg-[#6d5c5b]/10 px-12 py-3 rounded hover:bg-[#6d5c5b5d]">RESET</button>
                            </div>
                        </div>
                    </form>
                </main>

                <footer class="py-16 text-center text-sm text-black dark:text-white/70">
                    ❤️ BBPOM DI MATARAM
                </footer>
            </div>
        </div>
    </div>

    @if (session('status') === 'new-guest-saved')
        <div x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 10000)"
            class="fixed inset-0 my-10 mx-32 m-fit h-fit p-10 bg-[#20f8fff3] text-black px-12 py-3 rounded">
            <h2 class="font-bold mb-3">Data Tersimpan</h2>

            <p>
                Hay, {{ session('name') }} 👋
            </p>

            <p>
                Selamat datang di Balai Besar POM di Mataram.
            </p>

        </div>
    @endif

    <script language="JavaScript">
        // manage webcam
        let imageUri = ''

        Webcam.attach('#my_camera');

        function take_snapshot() {
            Webcam.snap(function(data_uri) {
                document.getElementById('my_camera').innerHTML = '<img src="' + data_uri + '"/>';
                imageUri = data_uri
            });
        }

        function reset_snapshot() {
            Webcam.reset()
            Webcam.attach('#my_camera');
        }

        Webcam.set({
            fps: 45
        })
    </script>
    <script>
        // manage layanan input
        const layananInput = document.getElementById('layanan')
        const layananCustom = document.getElementById('layananCustom')

        function toggleLayananCustom(layananInputValue) {
            if (layananInputValue == '8') { //jika dipilih layanan lainnya
                layananCustom.classList.add('block')
                layananCustom.classList.remove('hidden')
                layananCustom.setAttribute('required', true)
            } else {
                layananCustom.classList.add('hidden')
                layananCustom.classList.remove('block')
                layananCustom.removeAttribute('required', false)
            }
        }

        layananInput.addEventListener('change', function() {
            const value = this.value
            toggleLayananCustom(value)
        })
    </script>
    <script>
        const nameInput = document.getElementById('nama')
        nameInput.addEventListener('change', function() {
            axios.get(`/api/guest-book/search/${this.value}`)
                .then(({
                    data
                }) => {
                    if (data.name) {
                        formAutoFill(data)
                    }
                })
                .catch(err => console.log(err))
        })

        function formAutoFill(data) {
            const hpInput = document.getElementById('hp')
            hpInput.value = data.hp

            const emailInput = document.getElementById('email')
            emailInput.value = data.email

            const instansiInput = document.getElementById('instansi')
            instansiInput.value = data.company

            const alamatInput = document.getElementById('alamat')
            alamatInput.value = data.address

            const pangkatInput = document.getElementById('pangkat')
            pangkatInput.value = data.pangkat

            const jabatanInput = document.getElementById('jabatan')
            jabatanInput.value = data.jabatan

            layananInput.value = data.service
            toggleLayananCustom(layananInput.value)
        }
    </script>
    <script>
        const form = document.querySelector('form#tamu')
        form.addEventListener('submit', function(e) {
            // Membuat elemen input baru
            const foto = document.createElement('input');
            foto.type = 'hidden';
            foto.name = 'imageUri'; // Ganti 'newField' dengan nama yang diinginkan
            foto.value = imageUri

            // Menambahkan elemen input baru ke dalam form
            form.appendChild(foto);

            if (!imageUri) {
                alert('Silahkan Selfie dulu !')
                e.preventDefault()
            }
        })
    </script>
</body>

</html>
