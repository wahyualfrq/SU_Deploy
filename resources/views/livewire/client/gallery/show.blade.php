<div class="min-h-screen bg-gray-50 py-16">
    <div class="max-w-7xl mx-auto px-4">

        {{-- TITLE --}}
        <div class="mb-10">
            <h1 class="text-4xl font-extrabold text-gray-900">
                {{ $gallery->title }}
            </h1>
        </div>

        {{-- GRID FOTO --}}
        <div class="rounded-2xl overflow-hidden shadow-lg bg-white">
            <img src="{{ asset('storage/' . $gallery->cover_image) }}" class="w-full h-[500px] object-cover"
                alt="{{ $gallery->title }}"
                onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';">
        </div>

    </div>
</div>