<div>
    <div class="flex justify-between mb-6">
        <h2 class="text-xl font-bold">Video YouTube</h2>
        <button wire:click="sync"
            class="px-4 py-2 bg-red-600 text-white rounded-lg">
            🔄 Sync YouTube
        </button>
    </div>

    <table class="w-full">
        <thead>
            <tr>
                <th>Thumbnail</th>
                <th>Judul</th>
                <th>Tanggal</th>
                <th>Tampil</th>
            </tr>
        </thead>
        <tbody>
            @foreach($videos as $video)
            <tr>
                <td>
                    <img src="{{ $video->thumbnail }}" class="w-32 rounded">
                </td>
                <td>{{ $video->title }}</td>
                <td>{{ $video->published_at->format('d M Y') }}</td>
                <td>
                    <button wire:click="toggle({{ $video->id }})"
                        class="px-3 py-1 rounded
                        {{ $video->is_visible ? 'bg-green-500' : 'bg-gray-400' }}">
                        {{ $video->is_visible ? 'ON' : 'OFF' }}
                    </button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
