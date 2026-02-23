<div>
    @if ($submitted)
        {{-- SUCCESS STATE --}}
        <div class="text-center py-10 animate-fade-in">
            <div class="inline-flex items-center justify-center w-20 h-20 rounded-full bg-gold/10 mb-6">
                <svg class="w-10 h-10 text-gold" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5"
                        d="M4.5 12.75l6 6 9-13.5"/>
                </svg>
            </div>
            <h3 class="font-display text-3xl text-stone-800 mb-3">Dziękujemy, {{ $name }}!</h3>
            <p class="text-stone-500 text-lg leading-relaxed max-w-sm mx-auto">
                Twoje miejsce jest zarezerwowane. Napisaliśmy do Ciebie na adres
                <span class="text-gold font-medium">{{ $email }}</span> — sprawdź skrzynkę.
            </p>
        </div>
    @else
        {{-- FORM STATE --}}
        <form wire:submit="submit" class="space-y-4" novalidate>
            <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                {{-- NAME --}}
                <div>
                    <label for="name" class="block text-xs font-semibold tracking-widest uppercase text-stone-400 mb-2">
                        Imię
                    </label>
                    <input
                        wire:model="name"
                        type="text"
                        id="name"
                        placeholder="Twoje imię"
                        autocomplete="given-name"
                        class="w-full bg-white/60 border @error('name') border-rose-300 @else border-stone-200 @enderror
                               rounded-xl px-4 py-3.5 text-stone-700 placeholder-stone-300
                               focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold/50
                               transition-all duration-200"
                    >
                    @error('name')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>

                {{-- EMAIL --}}
                <div>
                    <label for="email" class="block text-xs font-semibold tracking-widest uppercase text-stone-400 mb-2">
                        Email
                    </label>
                    <input
                        wire:model="email"
                        type="email"
                        id="email"
                        placeholder="twoj@email.pl"
                        autocomplete="email"
                        class="w-full bg-white/60 border @error('email') border-rose-300 @else border-stone-200 @enderror
                               rounded-xl px-4 py-3.5 text-stone-700 placeholder-stone-300
                               focus:outline-none focus:ring-2 focus:ring-gold/30 focus:border-gold/50
                               transition-all duration-200"
                    >
                    @error('email')
                        <p class="mt-1.5 text-xs text-rose-400">{{ $message }}</p>
                    @enderror
                </div>
            </div>

            {{-- SUBMIT --}}
            <button
                type="submit"
                class="w-full bg-gold-dark text-white font-semibold tracking-wide
                       py-4 rounded-sm transition-all duration-300 hover:shadow-lg hover:shadow-gold/20
                       hover:-translate-y-0.5 active:translate-y-0 flex items-center justify-center gap-2 btn-transition"
            >
                <span wire:loading.remove>Dołącz do listy</span>
                <span wire:loading class="flex items-center gap-2">
                    <svg class="animate-spin h-4 w-4" fill="none" viewBox="0 0 24 24">
                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"/>
                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"/>
                    </svg>
                    Zapisuję...
                </span>
            </button>

            <p class="text-center text-xs text-stone-400 leading-relaxed">
                Bez spamu. Tylko to, co ważne. Możesz się wypisać w dowolnym momencie.
            </p>
        </form>
    @endif
</div>
