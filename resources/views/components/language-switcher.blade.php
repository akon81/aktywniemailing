<div class="flex items-center gap-1.5 text-[12px] font-mono font-medium tracking-wider">
    @foreach(['pl', 'en'] as $lang)
        <form method="POST" action="{{ route('locale.switch', $lang) }}">
            @csrf
            <button type="submit"
                class="{{ app()->getLocale() === $lang
                    ? 'text-h-dark cursor-pointer'
                    : 'text-h-gray hover:text-h-dark transition-colors duration-200 cursor-pointer' }}">
                {{ strtoupper($lang) }}
            </button>
        </form>
        @if(!$loop->last)
            <span class="text-h-light/70">|</span>
        @endif
    @endforeach
</div>
