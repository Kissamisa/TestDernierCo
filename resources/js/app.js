import './bootstrap';
const loader = document.getElementById('loader');
const form = document.querySelector('form');

document.querySelectorAll('.photo-link').forEach(link => {
    link.addEventListener('click', () => {
        loader.style.display = 'block';
    });
});
document.addEventListener('DOMContentLoaded', () => {
    const btn = document.getElementById('themeBtn');

    if (!btn) {
        return;
    }

    btn.addEventListener('click', () => {
        document.body.classList.toggle('dark');
        //console.log("Thème changé");
    });
});

