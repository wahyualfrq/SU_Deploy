<div class="max-w-2xl p-6">

    {{-- HEADER --}}
    <div class="mb-6">
        <h1 class="text-2xl font-bold text-slate-900">
            Import Pemain (Excel)
        </h1>
        <p class="text-sm text-slate-500">
            Unggah file Excel untuk menambahkan data pemain secara massal
        </p>
    </div>

    {{-- CARD --}}
    <div class="bg-white rounded-2xl shadow-sm border border-slate-200 p-6 space-y-6">

        {{-- FILE INPUT --}}
        <div>
            <label class="block text-sm font-semibold text-slate-700 mb-2">
                File Excel
            </label>

            <label
                class="flex flex-col items-center justify-center w-full h-40
                       border-2 border-dashed rounded-xl cursor-pointer
                       border-slate-300 bg-slate-50
                       hover:border-rose-400 hover:bg-rose-50
                       transition">

                <div class="text-center space-y-2">
                    <svg class="w-8 h-8 mx-auto text-slate-400" fill="none" stroke="currentColor"
                         viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                              d="M7 16V4m0 0L3 8m4-4l4 4m6 4v8m0 0l4-4m-4 4l-4-4" />
                    </svg>

                    <p class="text-sm text-slate-600">
                        Klik untuk upload atau drag & drop file Excel
                    </p>
                    <p class="text-xs text-slate-400">
                        Format: .xlsx / .xls
                    </p>
                </div>

                <input
                    type="file"
                    wire:model="file"
                    accept=".xlsx,.xls"
                    class="hidden">
            </label>

            {{-- FILE NAME --}}
            @if ($file)
                <p class="mt-2 text-sm text-slate-600">
                    📄 File dipilih: <span class="font-semibold">{{ $file->getClientOriginalName() }}</span>
                </p>
            @endif

            {{-- ERROR --}}
            @error('file')
                <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
            @enderror
        </div>

        {{-- ACTION --}}
        <div class="flex justify-between pt-2">
            <a href="{{ route('admin.players.index') }}"
               class="px-4 py-2 rounded-lg border border-slate-300
                      text-slate-700 font-semibold hover:bg-slate-50">
                Batal
            </a>

            <button
                wire:click="import"
                wire:loading.attr="disabled"
                class="px-6 py-2 rounded-lg bg-rose-600 text-white
                       font-semibold hover:bg-rose-700 transition
                       disabled:opacity-50">

                <span wire:loading.remove>📥 Import Pemain</span>
                <span wire:loading>Memproses...</span>
            </button>
        </div>

    </div>
</div>
