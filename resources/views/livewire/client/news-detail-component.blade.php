<div class="bg-gray-50 min-h-screen pt-24 pb-20">
    <div class="max-w-5xl mx-auto px-4 sm:px-6 lg:px-8">

        {{-- Breadcrumb: Modern & Minimalist --}}
        <nav class="flex items-center text-sm font-medium text-gray-500 mb-8 space-x-2">
            <a href="{{ route('home') }}" class="hover:text-rose-600 transition-colors duration-200">Home</a>
            <span class="text-gray-300">/</span>
            <a href="{{ route('media') }}" class="hover:text-rose-600 transition-colors duration-200">Media</a>
            <span class="text-gray-300">/</span>
            <span class="text-gray-900 truncate max-w-[200px] sm:max-w-md">{{ $news->title }}</span>
        </nav>

        {{-- Header Section: Better Typography & Spacing --}}
        <div class="max-w-4xl mx-auto text-center mb-10">
            {{-- Meta (Date & Author) --}}
            <div class="flex items-center justify-center gap-3 text-sm text-rose-600 font-semibold mb-4 tracking-wide uppercase">
                <span>{{ $news->published_at->format('d F Y') }}</span>
                @if($news->author)
                    <span class="w-1 h-1 bg-rose-600 rounded-full"></span>
                    <span>{{ $news->author }}</span>
                @endif
            </div>

            {{-- Title --}}
            <h1 class="text-3xl sm:text-4xl md:text-5xl font-extrabold text-gray-900 leading-tight sm:leading-tight mb-6 tracking-tight">
                {{ $news->title }}
            </h1>
        </div>

        {{-- Featured Image: Aspect Ratio & Modern Shadow --}}
        <div class="relative rounded-3xl overflow-hidden shadow-2xl shadow-gray-200 mb-12 ring-1 ring-black/5">
            <img src="{{ asset('storage/' . $news->image_path) }}" 
                 class="w-full aspect-video object-cover transform hover:scale-105 transition duration-700 ease-in-out"
                 alt="{{ $news->title }}">
        </div>

        {{-- Content Wrapper: Centered & Focused Reading Experience --}}
        <div class="bg-white rounded-3xl p-6 sm:p-10 shadow-sm border border-gray-100 max-w-4xl mx-auto -mt-24 relative z-10">
            <article class="prose prose-lg prose-slate mx-auto max-w-none 
                prose-headings:font-bold prose-headings:tracking-tight prose-headings:text-gray-900 
                prose-a:text-rose-600 prose-a:no-underline hover:prose-a:underline 
                prose-img:rounded-2xl prose-img:shadow-md">
                {!! $news->content !!}
            </article>
        </div>

        {{-- Related News --}}
        @if($related->count())
            <div class="mt-24 max-w-5xl mx-auto border-t border-gray-200 pt-16">
                <div class="flex items-center justify-between mb-8">
                    <h3 class="text-2xl font-bold text-gray-900 tracking-tight">Berita Terkait</h3>
                    <a href="{{ route('media') }}" class="text-sm font-semibold text-rose-600 hover:text-rose-700">
                        Lihat Semua &rarr;
                    </a>
                </div>

                <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-8">
                    @foreach($related as $item)
                        <a href="{{ route('media.news.detail', $item->slug) }}" class="group flex flex-col h-full">
                            {{-- Card Image --}}
                            <div class="relative overflow-hidden rounded-2xl shadow-sm mb-4">
                                <div class="absolute inset-0 bg-gray-900/10 group-hover:bg-transparent transition z-10"></div>
                                <img src="{{ asset('storage/' . $item->image_path) }}"
                                     class="w-full aspect-[4/3] object-cover transform group-hover:scale-110 transition duration-500">
                            </div>

                            {{-- Card Content --}}
                            <div class="flex-1 flex flex-col">
                                <div class="text-xs font-medium text-rose-600 mb-2">
                                    {{ $item->published_at->format('d M Y') }}
                                </div>
                                <h4 class="text-lg font-bold text-gray-900 group-hover:text-rose-600 transition leading-snug line-clamp-2 mb-2">
                                    {{ $item->title }}
                                </h4>
                                {{-- Optional: If you want a read more text --}}
                                <span class="text-sm text-gray-500 mt-auto group-hover:text-rose-600 transition flex items-center gap-1">
                                    Baca selengkapnya
                                </span>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        @endif

    </div>
</div>