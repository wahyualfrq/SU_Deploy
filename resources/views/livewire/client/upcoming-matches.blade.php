<section>
    <h2 class="text-2xl font-bold mb-6">Pertandingan Akan Datang</h2>

    <div class="grid md:grid-cols-2 gap-6">
        @foreach($matches as $m)
            <div class="bg-white rounded-xl shadow p-6 text-center">

                <span class="inline-block bg-red-100 text-red-600 px-3 py-1 rounded-full text-xs">
                    Liga 1 Indonesia
                </span>

                <p class="mt-3 text-gray-600">
                    {{ $m->match_date->translatedFormat('l, d F Y') }}
                </p>

                <p class="text-xl font-bold text-red-600">
                    {{ $m->match_date->format('H:i') }} WIB
                </p>

                <p class="text-sm text-gray-500">{{ $m->stadium }}</p>

                <div class="grid grid-cols-3 items-center mt-6">
                    <div>
                        <img src="{{ $m->homeClub->logo_url }}" class="w-14 mx-auto">
                        <p class="text-sm mt-1">{{ $m->homeClub->name }}</p>
                    </div>

                    <span class="font-bold">VS</span>

                    <div>
                        <img src="{{ $m->awayClub->logo_url }}" class="w-14 mx-auto">
                        <p class="text-sm mt-1">{{ $m->awayClub->name }}</p>
                    </div>
                </div>

                <div class="mt-6 flex gap-3">
                    <a href="{{ route('tickets.detail', $m->id) }}" class="flex-1 bg-red-600 text-white py-2 rounded-lg">
                        Beli Tiket
                    </a>

                    <button class="flex-1 border border-red-600 text-red-600 rounded-lg">
                        Prediksi
                    </button>
                </div>
            </div>
        @endforeach
    </div>
</section>