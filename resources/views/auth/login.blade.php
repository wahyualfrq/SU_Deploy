<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sumsel United</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Tetap menggunakan font sporty */
        @import url('https://fonts.googleapis.com/css2?family=Teko:wght@400;600;700&family=Roboto:ital,wght@0,400;0,500;1,700&display=swap');
        
        body { font-family: 'Roboto', sans-serif; }
        .font-sport { font-family: 'Teko', sans-serif; }
        
        /* Pattern grid halus untuk background */
        .bg-grid-pattern {
            background-image: linear-gradient(to right, #262626 1px, transparent 1px),
            linear-gradient(to bottom, #262626 1px, transparent 1px);
            background-size: 40px 40px;
        }
    </style>
</head>

<body class="min-h-screen flex items-center justify-center bg-black text-white relative overflow-hidden">

    <div class="absolute inset-0 bg-neutral-950 bg-grid-pattern opacity-20 z-0"></div>
    
    <div class="absolute top-[-10%] left-[-10%] h-[120%] w-2/3 bg-gradient-to-br from-red-900 via-red-950 to-black transform -skew-x-12 mix-blend-normal border-r border-red-900/30 z-0 shadow-[10px_0_50px_rgba(220,38,38,0.2)]"></div>
    
    <div class="absolute bottom-0 right-0 w-[500px] h-[500px] bg-red-700 rounded-full blur-[150px] opacity-20 pointer-events-none"></div>

    <div class="relative z-10 w-full max-w-md bg-neutral-900/80 backdrop-blur-md border border-neutral-800 rounded-xl shadow-2xl shadow-red-900/20 p-8 sm:p-10">
        
        <div class="absolute top-0 left-0 w-full h-1 bg-gradient-to-r from-transparent via-red-600 to-transparent"></div>

        <div class="text-center mb-6">
            <div class="relative inline-block group">
                <div class="absolute inset-0 bg-red-600 blur-xl opacity-20 group-hover:opacity-50 transition-opacity duration-500 rounded-full"></div>
                <img src="{{ asset('images/favicon.png') }}" alt="Logo Sumsel United"
                    class="relative w-20 h-20 mx-auto mb-4 drop-shadow-lg grayscale group-hover:grayscale-0 transition-all duration-500">
            </div>
            
            <h1 class="text-5xl font-sport font-bold tracking-wider italic uppercase text-white">
                SUMSEL <span class="text-red-600">UNITED</span>
            </h1>
            <p class="text-xs text-neutral-400 mt-1 font-bold tracking-[0.2em] uppercase border-b border-neutral-800 inline-block pb-2">Online Member Login For Players</p>
        </div>

        @if ($errors->any())
            <div class="mb-6 p-4 rounded bg-red-950/40 border border-red-600/50 text-red-400 text-sm flex items-start shadow-[inset_0_0_20px_rgba(220,38,38,0.1)]">
                <svg class="w-5 h-5 mr-3 flex-shrink-0 mt-0.5 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                <div>
                    <span class="font-bold uppercase tracking-wider text-xs block mb-1 text-red-500">Akses Ditolak</span>
                    <span class="opacity-90">{{ $errors->first() }}</span>
                </div>
            </div>
        @endif

        <form method="POST" action="{{ route('login.submit') }}" class="space-y-6">
            @csrf

            <div class="group">
                <label for="email" class="block text-xs font-bold text-red-600 uppercase tracking-widest mb-1">Email Address</label>
                <div class="relative">
                    <input type="email" name="email" id="email" required autofocus value="{{ old('email') }}"
                        class="w-full px-4 py-3 bg-neutral-950 text-gray-200 rounded transition-all duration-300 outline-none placeholder-neutral-600
                        @error('email') 
                            border border-red-500 focus:ring-1 focus:ring-red-500
                        @else 
                            border border-neutral-800 focus:ring-1 focus:ring-red-600 focus:border-red-600 
                        @enderror"
                        placeholder="PLAYER@EXAMPLE.COM">
                </div>
                @error('email')
                    <p class="text-red-500 text-xs mt-1 italic font-medium tracking-wide flex items-center">
                        <span class="mr-1 text-base">•</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="group">
                <label for="password" class="block text-xs font-bold text-red-600 uppercase tracking-widest mb-1">Password</label>
                <div class="relative">
                    <input type="password" name="password" id="password" required
                        class="w-full px-4 py-3 bg-neutral-950 text-gray-200 rounded transition-all duration-300 outline-none placeholder-neutral-600
                        @error('password') 
                            border border-red-500 focus:ring-1 focus:ring-red-500
                        @else 
                            border border-neutral-800 focus:ring-1 focus:ring-red-600 focus:border-red-600 
                        @enderror"
                        placeholder="••••••••">
                </div>
                @error('password')
                    <p class="text-red-500 text-xs mt-1 italic font-medium tracking-wide flex items-center">
                        <span class="mr-1 text-base">•</span> {{ $message }}
                    </p>
                @enderror
            </div>

            <div class="flex items-center justify-between text-sm mt-2">
                <label class="flex items-center space-x-2 cursor-pointer">
                    <div class="relative">
                        <input type="checkbox" name="remember" class="peer sr-only">
                        <div class="w-4 h-4 border border-neutral-600 rounded bg-neutral-900 peer-checked:bg-red-600 peer-checked:border-red-600 transition-all"></div>
                        <svg class="absolute w-3 h-3 text-white hidden peer-checked:block top-0.5 left-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7" /></svg>
                    </div>
                    <span class="text-neutral-400 hover:text-white transition-colors text-xs uppercase font-semibold">Ingat saya</span>
                </label>
                <a href="#" class="text-neutral-400 hover:text-red-500 font-semibold transition-colors text-xs uppercase tracking-wide">
                    Lupa Password?
                </a>
            </div>

            <button type="submit"
                class="w-full py-4 mt-2 bg-red-700 hover:bg-red-600 text-white font-sport font-bold text-2xl tracking-widest rounded shadow-lg shadow-red-900/30 transform active:scale-[0.98] transition-all duration-200 border border-red-500 border-t-2 border-b-0 uppercase italic skew-x-[-6deg]">
                <span class="block skew-x-[6deg]">MASUK SEKARANG</span>
            </button>
        </form>

        <div class="mt-8 flex items-center justify-center text-xs text-neutral-600 uppercase tracking-widest">
            <span class="h-px bg-neutral-800 w-full"></span>
            <span class="mx-4 font-bold text-neutral-500">Atau</span>
            <span class="h-px bg-neutral-800 w-full"></span>
        </div>

        <div class="text-center mt-6">
            <p class="text-sm text-neutral-500">
                Belum bergabung dengan tim?
            </p>
            <a href="{{ route('register.page') }}" class="inline-block mt-2 text-white font-bold border-b border-red-600 pb-0.5 hover:text-red-500 transition-all uppercase tracking-wide text-xs">
                Registrasi Pemain Baru
            </a>
        </div>

    </div>

</body>
</html>