<div class="min-h-screen bg-gray-50 pt-24 pb-20">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- TITLE SECTION --}}
        <div class="max-w-4xl mx-auto text-center mb-12">
            {{-- Optional decorative line --}}
            <div class="w-20 h-1.5 bg-rose-600 mx-auto rounded-full mb-6"></div>
            
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 tracking-tight leading-tight">
                {{ $gallery->title }}
            </h1>
        </div>

        {{-- HERO IMAGE / COVER --}}
        <div class="relative group max-w-6xl mx-auto">
            {{-- Decorative Blur Effect (Glow di belakang gambar) --}}
            <div class="absolute -inset-1 bg-gradient-to-r from-gray-200 to-gray-300 rounded-[2.5rem] blur opacity-30 group-hover:opacity-50 transition duration-1000"></div>

            {{-- Main Image Container --}}
            <div class="relative rounded-[2rem] overflow-hidden shadow-2xl shadow-gray-200 ring-1 ring-black/5 bg-white">
                {{-- Menggunakan aspect-ratio yang responsive: Video standard di HP, Cinematic di Desktop --}}
                <img src="{{ $gallery->cover_image_url}}" 
                     class="w-full aspect-video md:aspect-[21/9] object-cover transform transition duration-1000 hover:scale-105"
                     alt="{{ $gallery->title }}"
                     onerror="this.src='https://images.pexels.com/photos/274506/pexels-photo-274506.jpeg';">
                
                {{-- Optional Overlay Gradient untuk kesan premium --}}
                <div class="absolute inset-0 bg-gradient-to-t from-black/10 to-transparent pointer-events-none"></div>
            </div>
        </div>

    </div>
</div>