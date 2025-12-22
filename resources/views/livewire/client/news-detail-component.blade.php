<div class="bg-gray-50 min-h-screen pt-28 pb-20">
    <div class="max-w-4xl mx-auto px-4">

        {{-- Breadcrumb --}}
        <nav class="text-sm text-gray-500 mb-6">
            <a href="{{ route('home') }}" class="hover:text-rose-600">Home</a> /
            <a href="{{ route('media') }}" class="hover:text-rose-600">Media</a> /
            <span class="text-gray-800 font-semibold">{{ $news->title }}</span>
        </nav>

        {{-- Title --}}
        <h1 class="text-4xl font-extrabold text-gray-900 leading-tight mb-4">
            {{ $news->title }}
        </h1>

        {{-- Meta --}}
        <div class="flex items-center gap-4 text-sm text-gray-500 mb-8">
            <span>{{ $news->published_at->format('d F Y') }}</span>
            @if($news->author)
                <span>• {{ $news->author }}</span>
            @endif
        </div>

        {{-- Image --}}
        <div class="rounded-2xl overflow-hidden shadow-lg mb-10">
            <img src="{{ asset('storage/' . $news->image_path) }}" class="w-full h-[420px] object-cover"
                alt="{{ $news->title }}">
        </div>

        {{-- Content --}}
        <article class="prose prose-lg max-w-none prose-headings:text-gray-900 prose-a:text-rose-600">
            {!! $news->content !!}
        </article>

        {{-- Related News --}}
        @if($related->count())
            <div class="mt-20">
                <h3 class="text-2xl font-bold mb-6">Berita Terkait</h3>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach($related as $item)
                        <a href="{{ route('media.news.detail', $item->slug) }}"
                            class="group bg-white rounded-xl overflow-hidden border hover:shadow-lg transition">
                            <img src="{{ asset('storage/' . $item->image_path) }}"
                                class="w-full h-40 object-cover group-hover:scale-105 transition">
                            <div class="p-4">
                                <h4 class="font-semibold text-gray-900 line-clamp-2 group-hover:text-rose-600">
                                    {{ $item->title }}
                                </h4>
                                <p class="text-xs text-gray-500 mt-2">
                                    {{ $item->published_at->format('d M Y') }}
                                </p>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>