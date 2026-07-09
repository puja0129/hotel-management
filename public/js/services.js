// services.js — Hotel Services JS

// Navbar scroll shadow
window.addEventListener('scroll', () => {
    const nav = document.querySelector('.navbar');
    if (nav) {
        nav.style.boxShadow = window.scrollY > 10
            ? '0 2px 12px rgba(0,0,0,0.08)'
            : 'none';
    }
});

// Lazy image fallback
document.querySelectorAll('img[onerror]').forEach(img => {
    img.addEventListener('error', function () {
        this.src = 'https://images.unsplash.com/photo-1566073771259-6a8506099945?w=400&q=80';
    });
});
