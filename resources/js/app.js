/*
 * Scroll-reveal: watches [data-animate] elements and adds .is-visible when
 * they enter the viewport. data-delay="N" staggers the reveal by N ms.
 * To use on any page: add data-animate="fade-up" (or other variant) to an
 * element. No imports needed — this file is bundled by Vite globally.
 */
document.addEventListener('DOMContentLoaded', () => {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (!entry.isIntersecting) return;
            const el = entry.target;
            const delay = parseInt(el.dataset.delay || 0, 10);
            const reveal = () => el.classList.add('is-visible');
            delay > 0 ? setTimeout(reveal, delay) : reveal();
            observer.unobserve(el);
        });
    }, {
        threshold: 0.08,
        rootMargin: '0px 0px -40px 0px',
    });

    document.querySelectorAll('[data-animate]').forEach(el => observer.observe(el));
});
