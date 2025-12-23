<div class="min-h-screen bg-gray-50 py-20">
    <div class="max-w-7xl mx-auto px-4">

        <h1 class="text-4xl font-extrabold mb-12 text-center">
            Galeri Foto
        </h1>

        <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-8">
            @foreach ($galleries as $gallery)
                <a href="{{ route('galleries.show', $gallery->slug) }}"
                   class="group rounded-2xl overflow-hidden shadow-lg bg-white">

                    <img
                        src="{{ asset('storage/' . $gallery->cover_image) }}"
                        class="w-full h-60 object-cover group-hover:scale-105 transition"
                    >

                    <div class="p-4">
                        <h3 class="text-lg font-bold">
                            {{ $gallery->title }}
                        </h3>
                    </div>
                </a>
            @endforeach
        </div>

    </div>
</div>
