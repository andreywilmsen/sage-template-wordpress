document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.querySelector('#mobile-menu-trigger');
    const overlay = document.querySelector('#mobile-menu-overlay');

    if (trigger && overlay) {
        trigger.addEventListener('click', (e) => {
            e.preventDefault();
            trigger.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        });
    }
});