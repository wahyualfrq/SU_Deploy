
@php
$all_office = [
    // ... data pelatih (sama seperti sebelumnya)
    (object)[
        'id' => 'nilmaizar',
        'name' => 'Nilmaizar',
        'position' => 'Pelatih Kepala',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF181710.png'
    ],
    (object)[
        'id' => 'amirul-mukminin',
        'name' => 'Amirul Mukminin',
        'position' => 'Asisten Pelatih',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF222678.png'
    ],
    (object)[
        'id' => 'muhammad-nur-iskandar',
        'name' => 'Muhammad Nur Iskandar',
        'position' => 'Asisten Pelatih',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF252828.png'
    ],
    (object)[
        'id' => 'dino-sefriyanto',
        'name' => 'Drs. Dino Sefriyanto',
        'position' => 'Pelatih Fisik',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF210451.png'
    ],
    (object)[
        'id' => 'sahari-gultom',
        'name' => 'Sahari Gultom',
        'position' => 'Pelatih Kiper',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF172239.png'
    ],
    (object)[
        'id' => 'dinar-bayu-aji',
        'name' => 'Dinar Bayu Aji',
        'position' => 'Analis',
        'number' => 1,
        'image' => 'https://lias.ligaindonesiabaru.com/liasfile/official/OF252817.png'
    ],
];

$playersByPos = [
    'GK' => collect($all_players)->where('position', 'GK'),
    'DF' => collect($all_players)->where('position', 'DF'),
    'MID' => collect($all_players)->where('position', 'MF'),
    'FWD' => collect($all_players)->where('position', 'FW'),
];

$playersData = collect($all_players)->mapWithKeys(function ($p) {
    return [
        'player_' . $p->id => [   // 🔥 prefix string
            'id'     => $p->id,
            'name'   => $p->name,
            'pos'    => $p->position,
            'number' => $p->number,
            'age'    => $p->age ?? null,
            'image'  => $p->photo_url
                ? (Str::startsWith($p->photo_url, 'http')
                    ? $p->photo_url
                    : asset($p->photo_url))
                : asset('images/blankprofile.png'),
        ]
    ];
})->toArray();


@endphp
<div>
    <section class="relative py-28 bg-white overflow-hidden">
    
        <div class="absolute inset-0 pointer-events-none">
            <div class="absolute -top-20 -right-20 w-[600px] h-[600px] bg-rose-50/60 rounded-full blur-[100px]" data-aos="fade-left" data-aos-duration="2000"></div>
            <div class="absolute top-40 -left-20 w-[500px] h-[500px] bg-gray-50/80 rounded-full blur-[80px]" data-aos="fade-right" data-aos-duration="2000"></div>
            <div class="absolute inset-0 opacity-[0.03]" style="background-image: radial-gradient(#000 1px, transparent 1px); background-size: 32px 32px;"></div>
        </div>

        <div class="relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
            
            <div class="mb-8 flex justify-center fade-in-up" data-aos="fade-down" data-aos-delay="0">
                <div class="inline-flex items-center space-x-2 bg-white border border-gray-200 rounded-full px-4 py-1.5 shadow-sm hover:border-rose-200 transition-colors duration-300">
                    <span class="relative flex h-2.5 w-2.5">
                      <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-rose-400 opacity-75"></span>
                      <span class="relative inline-flex rounded-full h-2.5 w-2.5 bg-rose-600"></span>
                    </span>
                    <span class="text-gray-600 text-[11px] font-bold tracking-[0.2em] uppercase font-oswald">Tim Profesional</span>
                </div>
            </div>

            <div class="mb-10">
                <h1 class="font-oswald text-gray-900 leading-[0.9]">
                    <span class="block text-5xl md:text-7xl font-bold tracking-tight mb-2" data-aos="fade-up" data-aos-delay="100">SKUAD</span>
                    <span class="block text-6xl md:text-8xl font-black tracking-tighter text-transparent bg-clip-text bg-gradient-to-br from-rose-600 via-red-600 to-rose-800 drop-shadow-sm" data-aos="fade-up" data-aos-delay="200">
                        SUMSEL UNITED
                    </span>
                </h1>
            </div>
            
            <p class="text-lg md:text-xl text-gray-500 max-w-2xl mx-auto mb-16 leading-relaxed font-light" data-aos="fade-up" data-aos-delay="300">
                Kenali para pejuang yang membawa nama klub dengan bangga. Dari talenta muda berbakat hingga legenda berpengalaman, inilah komposisi terbaik kami.
            </p>

            <div class="grid grid-cols-2 md:grid-cols-4 gap-6 max-w-5xl mx-auto">
                <div class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(225,29,72,0.1)] hover:-translate-y-1 transition-all duration-300 cursor-default" 
                     data-aos="zoom-in-up" data-aos-delay="400">
                    <div class="text-5xl font-black text-gray-900 font-oswald mb-2 group-hover:text-rose-600 transition-colors">
                        {{ collect($all_players)->count() }}
                    </div>
                    <div class="h-1 w-8 bg-gray-100 mx-auto rounded-full mb-3 group-hover:bg-rose-100 transition-colors"></div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Pemain Aktif</div>
                </div>

                <div class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(225,29,72,0.1)] hover:-translate-y-1 transition-all duration-300 cursor-default"
                     data-aos="zoom-in-up" data-aos-delay="500">
                    <div class="text-5xl font-black text-gray-900 font-oswald mb-2 group-hover:text-rose-600 transition-colors">{{ collect($all_office)->count() }}</div>
                    <div class="h-1 w-8 bg-gray-100 mx-auto rounded-full mb-3 group-hover:bg-rose-100 transition-colors"></div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Staf Pelatih</div>
                </div>

                <div class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(225,29,72,0.1)] hover:-translate-y-1 transition-all duration-300 cursor-default"
                     data-aos="zoom-in-up" data-aos-delay="600">
                    <div class="text-5xl font-black text-gray-900 font-oswald mb-2 group-hover:text-rose-600 transition-colors">{{ collect($all_players)->pluck('country')->filter()->unique()->count() }}
    </div>
                    <div class="h-1 w-8 bg-gray-100 mx-auto rounded-full mb-3 group-hover:bg-rose-100 transition-colors"></div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Kebangsaan</div>
                </div>

                <div class="group bg-white p-6 rounded-3xl border border-gray-100 shadow-[0_8px_30px_rgb(0,0,0,0.04)] hover:shadow-[0_8px_30px_rgb(225,29,72,0.1)] hover:-translate-y-1 transition-all duration-300 cursor-default"
                     data-aos="zoom-in-up" data-aos-delay="700">
                    <div class="text-5xl font-black text-gray-900 font-oswald mb-2 group-hover:text-rose-600 transition-colors">{{ number_format(
        collect($all_players)->pluck('age')->filter()->avg(),
        1
    ) }}</div>
                    <div class="h-1 w-8 bg-gray-100 mx-auto rounded-full mb-3 group-hover:bg-rose-100 transition-colors"></div>
                    <div class="text-[10px] font-bold text-gray-400 uppercase tracking-widest">Rata-rata Usia</div>
                </div>
            </div>
        </div>
    </section>

    <section class="sticky top-0 z-40 bg-white/90 backdrop-blur-xl border-b border-gray-100">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex space-x-2 overflow-x-auto scrollbar-hide py-4 justify-center">
                <button id="tab-main-squad" onclick="showSection('main-squad')"
                    class="team-tab active relative py-2.5 px-6 rounded-full text-sm font-bold transition-all duration-300 bg-gray-900 text-white shadow-lg shadow-gray-900/20 tracking-wide uppercase">
                    Skuad Utama
                </button>

                <button id="tab-coaching-staff" onclick="showSection('coaching-staff')"
                    class="team-tab py-2.5 px-6 rounded-full text-sm font-bold text-gray-500 hover:bg-gray-100 transition-all duration-300 tracking-wide uppercase">
                    Staf Pelatih
                </button>
            </div>
        </div>
    </section>

    <section id="main-squad" class="team-section py-20 bg-gray-50/50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

            <div class="mb-24">
                <div class="text-center mb-12" data-aos="fade-up">
                    <h2 class="text-3xl font-black text-gray-900 mb-2 font-oswald uppercase">Formasi Taktis</h2>
                    <p class="text-gray-500 font-medium">Susunan 4-3-3 Menyerang</p>
                </div>

                <div class="relative bg-gradient-to-b from-emerald-600 to-emerald-800 rounded-[3rem] p-8 mx-auto max-w-4xl shadow-2xl shadow-emerald-900/30 border-[6px] border-white ring-1 ring-gray-200"
                    style="aspect-ratio:3/4;" data-aos="zoom-in" data-aos-duration="1000">
                    
                    <div class="absolute inset-0 opacity-20 bg-[url('https://www.transparenttextures.com/patterns/grass.png')] rounded-[2.5rem]"></div>
                    
                    <div class="absolute inset-6 border-2 border-white/50 rounded-[2rem]">
                        <div class="absolute top-0 left-1/2 -translate-x-1/2 w-32 h-20 border-2 border-white/50 border-t-0 rounded-b-2xl"></div>
                        <div class="absolute bottom-0 left-1/2 -translate-x-1/2 w-32 h-20 border-2 border-white/50 border-b-0 rounded-t-2xl"></div>
                        <div class="absolute top-1/2 left-0 right-0 h-px bg-white/40"></div>
                        <div class="absolute top-1/2 left-1/2 -translate-x-1/2 -translate-y-1/2 w-24 h-24 border-2 border-white/50 rounded-full"></div>
                    </div>

                    @foreach($playersByPos['GK']->take(1) as $p)
                        <div class="absolute bottom-12 left-1/2 -translate-x-1/2 z-10" data-aos="zoom-in" data-aos-delay="300">
                            <div class="group cursor-pointer flex flex-col items-center"
                                onclick="showPlayerModal('{{ $p->id }}')">
                                <div class="relative">
                                    <img src="{{ $p->photo_url ? (Str::startsWith($p->photo_url, 'http') ? $p->photo_url : asset($p->photo_url)) : asset('images/blankprofile.png') }}"
                                         class="w-16 h-16 rounded-full border-4 border-white shadow-xl transition-transform hover:scale-110">
                                    <div class="absolute -bottom-2 -right-2 w-6 h-6 bg-yellow-400 text-yellow-900 flex items-center justify-center rounded-full text-[10px] font-bold border-2 border-white">
                                        GK
                                    </div>
                                </div>
                                <div class="mt-2 bg-white/95 px-3 py-1 rounded-full shadow-md">
                                    <span class="text-[10px] font-bold uppercase">{{ Str::limit($p->name,14) }}</span>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    <div class="absolute bottom-36 left-0 right-0 flex justify-between px-16 z-10">
                        @foreach($playersByPos['DF']->take(4) as $p)
                        <div class="group cursor-pointer flex flex-col items-center"
                            onclick="showPlayerModal('{{ $p->id }}')" data-aos="zoom-in" data-aos-delay="{{ 400 + ($loop->index * 100) }}">
                            <div class="relative">
                                <img src="{{ $p->photo_url ? (Str::startsWith($p->photo_url, 'http') ? $p->photo_url : asset($p->photo_url)) : asset('images/blankprofile.png') }}"
                                     class="w-14 h-14 rounded-full border-4 border-white shadow-xl transition-transform hover:scale-110">
                                <div class="absolute -top-1 -right-2 w-6 h-6 bg-rose-600 text-white flex items-center justify-center rounded-full text-[10px] font-bold border-2 border-white">
                                    {{ $p->number }}
                                </div>
                            </div>
                            <div class="mt-2 bg-white/95 px-2 py-1 rounded-full shadow-md min-w-[70px] text-center">
                                <span class="text-[9px] font-bold uppercase block truncate">{{ $p->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="absolute top-1/2 left-0 right-0 -translate-y-1/2 flex justify-center space-x-20 z-10">
                        @foreach($playersByPos['MID']->take(3) as $p)
                        <div class="group cursor-pointer flex flex-col items-center"
                            onclick="showPlayerModal('{{ $p->id }}')" data-aos="zoom-in" data-aos-delay="{{ 800 + ($loop->index * 100) }}">
                            <div class="relative">
                                <img src="{{ $p->photo_url ? (Str::startsWith($p->photo_url, 'http') ? $p->photo_url : asset($p->photo_url)) : asset('images/blankprofile.png') }}"
                                     class="w-14 h-14 rounded-full border-4 border-white shadow-xl transition-transform hover:scale-110">
                                <div class="absolute -top-1 -right-2 w-6 h-6 bg-rose-600 text-white flex items-center justify-center rounded-full text-[10px] font-bold border-2 border-white">
                                    {{ $p->number }}
                                </div>
                            </div>
                            <div class="mt-2 bg-white/95 px-2 py-1 rounded-full shadow-md min-w-[70px] text-center">
                                <span class="text-[9px] font-bold uppercase block truncate">{{ $p->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <div class="absolute top-24 left-0 right-0 flex justify-center space-x-24 z-10">
                        @foreach($playersByPos['FWD']->take(3) as $p)
                        <div class="group cursor-pointer flex flex-col items-center"
                            onclick="showPlayerModal('{{ $p->id }}')" data-aos="zoom-in" data-aos-delay="{{ 1100 + ($loop->index * 100) }}">
                            <div class="relative">
                               <img src="{{ $p->photo_url ? (Str::startsWith($p->photo_url, 'http') ? $p->photo_url : asset($p->photo_url)) : asset('images/blankprofile.png') }}"
                                    class="w-16 h-16 rounded-full border-4 border-white shadow-xl ring-2 ring-rose-500/30 transition-transform hover:scale-110">
                                <div class="absolute -top-1 -right-2 w-6 h-6 bg-rose-600 text-white flex items-center justify-center rounded-full text-[10px] font-bold border-2 border-white">
                                    {{ $p->number }}
                                </div>
                            </div>
                            <div class="mt-2 bg-white/95 px-3 py-1 rounded-full shadow-md min-w-[80px] text-center">
                                <span class="text-[10px] font-bold uppercase block truncate">{{ $p->name }}</span>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="py-12">
                <div class="flex flex-wrap items-center justify-between gap-6 mb-12" data-aos="fade-right">
                    <h3 class="text-4xl font-black text-gray-900 font-oswald uppercase">Roster Lengkap</h3>
                    
                    <div class="flex flex-wrap gap-2">
                        @foreach ([
                            ['key'=>'all','label'=>'Semua'],
                            ['key'=>'GK','label'=>'Kiper'],
                            ['key'=>'DF','label'=>'Bek'],
                            ['key'=>'MF','label'=>'Gelandang'],
                            ['key'=>'FW','label'=>'Penyerang'],
                        ] as $pos)
                        <button onclick="filterByPosition('{{ $pos['key'] }}')"
                            class="position-filter px-5 py-2 rounded-full font-bold text-[10px] uppercase tracking-widest transition-all duration-300 border {{ $loop->first ? 'bg-rose-600 text-white border-rose-600 shadow-lg shadow-rose-600/30' : 'bg-white text-gray-500 border-gray-200 hover:border-gray-300 hover:text-gray-900' }}">
                            {{ $pos['label'] }}
                        </button>
                        @endforeach
                    </div>
                </div>

                <div id="players-grid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                    @foreach($all_players as $player)

                    <div class="player-card-item group cursor-pointer" 
                         data-position="{{ $player->position }}" 
                         onclick="showPlayerModal('{{ $player->id }}')"
                         data-aos="fade-up" 
                         data-aos-anchor-placement="top-bottom">
                        
                        <div class="relative aspect-[3/4] rounded-[2.5rem] overflow-hidden bg-gray-100 mb-6 transition-all duration-500 group-hover:shadow-[0_20px_50px_-12px_rgba(225,29,72,0.25)] ring-1 ring-black/5">
                            
                            <img src="{{ $player->photo_url ? (Str::startsWith($player->photo_url, 'http') ? $player->photo_url : asset($player->photo_url)) : asset('images/blankprofile.png') }}"
                                class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 transition-all duration-500 transform group-hover:scale-105"
                                alt="{{ $player->name }}">
                            
                            <div class="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>

                            <div class="absolute top-5 right-5 w-12 h-12 rounded-full bg-white/80 backdrop-blur-md flex items-center justify-center text-rose-600 font-black text-lg border border-white/50 shadow-sm group-hover:bg-rose-600 group-hover:text-white group-hover:border-rose-600 transition-all duration-300 font-oswald">
                                {{ $player->number }}
                            </div>
                        </div>

                        <div class="text-center px-4">
                            <h4 class="text-2xl font-black uppercase font-oswald text-gray-900 leading-none mb-2 group-hover:text-rose-600 transition-colors duration-300 tracking-tight">
                                {{ $player->name }}
                            </h4>
                            <div class="inline-block relative">
                                <div class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em] group-hover:text-gray-600 transition-colors duration-300">
                                    {{ $player->position }}
                                </div>
                                <div class="absolute -bottom-2 left-1/2 -translate-x-1/2 w-0 h-0.5 bg-rose-600 transition-all duration-300 group-hover:w-full"></div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <section id="coaching-staff" class="team-section hidden py-24 bg-white">
        <div class="max-w-7xl mx-auto px-6">

            <div class="text-center mb-20" data-aos="fade-down">
                <h2 class="text-5xl font-black uppercase font-oswald">Tim Pelatih</h2>
                <p class="text-gray-500">
                    Arsitek di balik strategi dan filosofi permainan Sumsel United
                </p>
            </div>

            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-x-8 gap-y-16">
                @foreach($all_office as $staff)
                <div class="group text-center" data-aos="fade-up" data-aos-delay="{{ $loop->index * 100 }}">

                    <div class="relative aspect-[3/4] rounded-[2.5rem] overflow-hidden bg-gray-100 mb-6 transition-all duration-500 group-hover:shadow-[0_20px_50px_-12px_rgba(225,29,72,0.3)]">

                        <img src="{{ $staff->image }}"
                             alt="{{ $staff->name }}"
                             class="absolute inset-0 w-full h-full object-cover grayscale group-hover:grayscale-0 group-hover:scale-105 transition-all duration-500">

                        <div class="absolute inset-0 bg-gradient-to-t from-black/30 to-transparent opacity-0 group-hover:opacity-100 transition-opacity"></div>
                    </div>

                    <h3 class="text-2xl font-black uppercase font-oswald mb-2">
                        {{ $staff->name }}
                    </h3>

                    <p class="text-[10px] font-bold text-gray-400 uppercase tracking-[0.3em]">
                        {{ $staff->position }}
                    </p>

                </div>
                @endforeach
            </div>
        </div>
    </section>

    <div id="player-modal" class="fixed inset-0 bg-black/90 backdrop-blur-sm z-50 hidden items-center justify-center p-4">
        <div class="bg-white rounded-[3rem] max-w-4xl w-full overflow-hidden shadow-2xl relative">
            <button onclick="closePlayerModal()" class="absolute top-6 right-6 w-10 h-10 rounded-full bg-gray-100 flex items-center justify-center hover:bg-rose-600 hover:text-white transition-all z-10">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" /></svg>
            </button>
            <div class="p-0">
                <div id="modal-content">
                    </div>
            </div>
        </div>
    </div>
</div>

<script>
     window.playersData = @json($playersData);
    // INISIALISASI AOS
    AOS.init({
        once: true, // Animasi hanya berjalan sekali saat scroll ke bawah
        offset: 50, // Trigger offset
        duration: 800, // Durasi standar
    });

    
    function showSection(sectionId) {
        document.querySelectorAll('.team-section').forEach(section => section.classList.add('hidden'));
        const targetSection = document.getElementById(sectionId);
        if(targetSection) {
            targetSection.classList.remove('hidden');
            // Refresh AOS saat tab berubah agar posisi kalkulasi ulang
            setTimeout(() => { AOS.refresh(); }, 100); 
        }

        document.querySelectorAll('.team-tab').forEach(tab => {
            tab.classList.remove('bg-gray-900', 'text-white', 'shadow-lg', 'shadow-gray-900/20');
            tab.classList.add('text-gray-500', 'hover:bg-gray-100');
        });

        const activeTab = document.getElementById('tab-' + sectionId);
        if(activeTab) {
            activeTab.classList.remove('text-gray-500', 'hover:bg-gray-100');
            activeTab.classList.add('bg-gray-900', 'text-white', 'shadow-lg', 'shadow-gray-900/20');
        }
    }

const fallback = {
    id: null,
    name: 'Pemain Tidak Ditemukan',
    pos: '-',
    number: '-',
    age: '-',
    image: ''
};

function showPlayerModal(playerId) {
    console.log('CLICKED ID:', playerId);
    console.log('DATA:', window.playersData['player_' + playerId]);

    const modal = document.getElementById('player-modal');
    const contentDiv = document.getElementById('modal-content');

    const data = window.playersData['player_' + playerId] || fallback;

    contentDiv.innerHTML = `
  <div class="flex flex-col md:flex-row min-h-[520px] bg-white rounded-3xl overflow-hidden shadow-2xl">
    
    <div class="w-full md:w-1/2 relative min-h-[400px] md:min-h-full group">
        <img src="${data.image}" class="absolute inset-0 w-full h-full object-cover transition-transform duration-700 group-hover:scale-105">
        
        <div class="absolute inset-0 bg-gradient-to-t from-gray-900 via-gray-900/40 to-transparent opacity-90"></div>
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-rose-500 to-transparent"></div>

        <div class="absolute bottom-6 left-6 md:bottom-10 md:left-10 z-10">
             <div class="flex items-center gap-3">
                <div class="h-12 w-1 bg-rose-500"></div>
                <div class="text-white">
                    <p class="text-rose-400 text-xs font-bold uppercase tracking-[0.2em] mb-1">Squad Number</p>
                    <div class="text-6xl md:text-7xl font-black font-oswald leading-none tracking-tighter shadow-black drop-shadow-lg">
                        ${data.number ?? '-'}
                    </div>
                </div>
             </div>
        </div>
    </div>

    <div class="w-full md:w-1/2 relative bg-white p-8 md:p-12 flex flex-col justify-center overflow-hidden">
        
        <div class="absolute -right-10 -bottom-20 text-[200px] leading-none font-black font-oswald text-gray-100 select-none pointer-events-none opacity-50 z-0">
            ${data.number ?? ''}
        </div>

        <div class="relative z-10">
            <div class="flex items-center gap-3 mb-4">
                <span class="px-4 py-1.5 bg-rose-50 text-rose-600 text-xs font-extrabold uppercase tracking-widest rounded-full border border-rose-100">
                    ${data.pos}
                </span>
                <div class="h-px flex-grow bg-gray-200"></div>
            </div>

            <h2 class="text-5xl md:text-6xl font-black font-oswald uppercase text-gray-900 leading-[0.9] tracking-tight mb-8">
                ${data.name}
            </h2>

            <div class="w-full">
                <div class="bg-white p-6 rounded-xl border border-gray-100 shadow-lg shadow-gray-100 hover:border-rose-200 transition-colors group w-full">
                    <div class="flex items-center justify-between mb-3">
                        <div class="text-xs uppercase tracking-[0.2em] font-bold text-gray-400 group-hover:text-rose-500 transition-colors">
                            Usia Pemain
                        </div>
                        <svg class="w-5 h-5 text-gray-300" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"></path></svg>
                    </div>
                    
                    <div class="flex items-baseline gap-2">
                        <div class="text-5xl font-black font-oswald text-gray-800 leading-none">
                            ${data.age ?? '-'}
                        </div>
                        <span class="text-lg font-semibold text-gray-400">Tahun</span>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</div>
`;


    modal.classList.remove('hidden');
    modal.classList.add('flex');
}



    function closePlayerModal() {
    const modal = document.getElementById('player-modal');
    modal.classList.add('hidden');
    modal.classList.remove('flex');
}


    function filterByPosition(position) {
        document.querySelectorAll('.position-filter').forEach(btn => {
            btn.classList.remove('bg-rose-600', 'text-white', 'shadow-lg', 'shadow-rose-600/30', 'border-rose-600');
            btn.classList.add('bg-white', 'text-gray-500', 'border-gray-200');
        });
        
        event.target.classList.remove('bg-white', 'text-gray-500', 'border-gray-200');
        event.target.classList.add('bg-rose-600', 'text-white', 'shadow-lg', 'shadow-rose-600/30', 'border-rose-600');

        const cards = document.querySelectorAll('.player-card-item');
        cards.forEach(card => {
            const pPos = card.getAttribute('data-position') || "";
            if (position === 'all' || pPos.includes(position)) {
                card.style.display = 'block';
            } else {
                card.style.display = 'none';
            }
        });
        
        // Refresh layout AOS setelah filter
        setTimeout(() => { AOS.refresh(); }, 100);
    }

    window.onclick = function(event) {
        const modal = document.getElementById('player-modal');
        if (event.target == modal) closePlayerModal();
    }
</script>