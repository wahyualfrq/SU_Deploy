<div class="space-y-8">

  {{-- HEADER --}}
  <div>
    <h1 class="text-2xl font-bold text-gray-800">Dashboard Admin</h1>
    <p class="text-sm text-gray-500">
      Ringkasan aktivitas & kontrol sistem Sumsel United
    </p>
  </div>

  {{-- STAT CARDS --}}
  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">

    <div class="bg-white rounded-xl shadow p-5">
      <p class="text-sm text-gray-500">Live Match</p>

      @if($liveMatch)
        <h2 class="text-3xl font-bold text-red-600">LIVE</h2>
        <p class="text-sm mt-1">
          Skor: {{ $liveMatch->home_score }} - {{ $liveMatch->away_score }}
        </p>

        <a href="{{ route('admin.matches.live', $liveMatch->id) }}"
          class="inline-block mt-3 text-sm font-semibold text-red-600 hover:underline">
          Live Control →
        </a>
      @else
        <h2 class="text-xl font-bold text-gray-400">TIDAK ADA</h2>
        <p class="text-sm text-gray-500">Tidak ada pertandingan live</p>
      @endif
    </div>


    <div class="bg-white rounded-xl shadow p-5">
      <p class="text-sm text-gray-500">Total Pertandingan</p>
      <h2 class="text-3xl font-bold">{{ $totalMatches }}</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
      <p class="text-sm text-gray-500">Tiket Aktif</p>
      <h2 class="text-3xl font-bold text-green-600">{{ $activeTickets }}</h2>
    </div>

    <div class="bg-white rounded-xl shadow p-5">
      <p class="text-sm text-gray-500">Konten Media</p>
      <h2 class="text-3xl font-bold text-blue-600">{{ $totalMedia }}</h2>
    </div>


  </div>

  {{-- LIVE MATCH --}}
  @if($liveMatch)
    <div class="bg-red-50 border border-red-200 rounded-xl p-6 flex justify-between items-center">
      <div>
        <p class="text-sm text-red-600 font-semibold">🔴 LIVE NOW</p>
        <h3 class="text-xl font-bold">
          {{ $liveMatch->homeClub->name }}
          vs
          {{ $liveMatch->awayClub->name }}
        </h3>
        <p class="text-sm text-gray-600">
          Menit {{ $liveMatch->minute }}’ •
          Skor {{ $liveMatch->home_score }} - {{ $liveMatch->away_score }}
        </p>
      </div>

      <a href="{{ route('admin.matches.live', $liveMatch->id) }}"
        class="px-5 py-2 bg-red-600 text-white rounded-lg font-semibold">
        Masuk Live Control
      </a>
    </div>
  @endif


  {{-- QUICK ACTION --}}
  <div class="flex flex-wrap gap-3">
    <a href="{{ route('admin.matches.create') }}" class="px-4 py-2 bg-blue-600 text-white rounded-lg text-sm">
      + Tambah Jadwal
    </a>
    <a href="{{ route('admin.tickets.create') }}" class="px-4 py-2 bg-green-600 text-white rounded-lg text-sm">
      + Tambah Tiket
    </a>
    <a href="{{ route('admin.news.create') }}" class="px-4 py-2 bg-purple-600 text-white rounded-lg text-sm">
      + Tambah Berita
    </a>
    <a href="{{ route('admin.videos.sync') }}" class="px-4 py-2 bg-red-600 text-white rounded-lg text-sm">
      Sync YouTube
    </a>
  </div>

</div>