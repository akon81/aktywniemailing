{{-- Scroll to Top Button --}}
<button
    id="scroll-to-top"
    class="fixed bottom-8 right-8 z-40 p-3 rounded-sm bg-gold-dark text-white opacity-0 invisible transition-all duration-300 hover:bg-gold hover:shadow-lg transform translate-y-4"
    aria-label="{{ __('ui.scroll_to_top_label') }}"
    style="display: none;">
    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7" />
    </svg>
</button>

<script>
    const scrollButton = document.getElementById('scroll-to-top');

    // Pokaż/ukryj przycisk na podstawie scrolla
    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            scrollButton.style.display = 'block';
            setTimeout(() => {
                scrollButton.classList.remove('opacity-0', 'invisible', 'translate-y-4');
                scrollButton.classList.add('opacity-100', 'visible', 'translate-y-0');
            }, 10);
        } else {
            scrollButton.classList.add('opacity-0', 'invisible', 'translate-y-4');
            scrollButton.classList.remove('opacity-100', 'visible', 'translate-y-0');
            setTimeout(() => {
                scrollButton.style.display = 'none';
            }, 300);
        }
    });

    // Scroll do góry
    scrollButton.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
</script>
