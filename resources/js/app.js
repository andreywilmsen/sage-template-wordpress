document.addEventListener('DOMContentLoaded', () => {
    const trigger = document.querySelector('#mobile-menu-trigger');
    const overlay = document.querySelector('#mobile-menu-overlay');
    const closeBtn = document.querySelector('.close-menu');

    const toggleMenu = (e) => {
        if (e) e.preventDefault();
        if (trigger && overlay) {
            trigger.classList.toggle('active');
            overlay.classList.toggle('active');
            document.body.classList.toggle('menu-open');
        }
    };

    if (trigger) trigger.addEventListener('click', toggleMenu);
    if (closeBtn) closeBtn.addEventListener('click', toggleMenu);

    const menuItemsWithChildren = document.querySelectorAll('.mobile-nav-links .menu-item-has-children > a');

    menuItemsWithChildren.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            e.stopPropagation();

            const parentLi = link.parentElement;

            parentLi.classList.toggle('is-open');
        });
    });
});