
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item-persistent');
    let isAnimating = false; // Cờ để ngăn chặn nhấp chuột liên tục

    function closeOtherMenus(exceptMenuId) {
        menuItems.forEach(item => {
            if (item.id !== exceptMenuId) {
                item.classList.remove('show');
            }
        });
    }

    function toggleMenu(menuId) {
        if (isAnimating) return; // Nếu đang hoạt hình, không làm gì

        const menuToToggle = document.getElementById(menuId);
        if (menuToToggle) {
            isAnimating = true; // Bắt đầu hoạt hình

            if (menuToToggle.classList.contains('show')) {
                menuToToggle.classList.remove('show');
            } else {
                closeOtherMenus(menuId);
                menuToToggle.classList.add('show');
            }

            localStorage.setItem('openMenuId', menuToToggle.classList.contains('show') ? menuId : '');

            menuToToggle.addEventListener('transitionend', function () {
                isAnimating = false; // Kết thúc hoạt hình
            }, { once: true });
        }
    }

    const openMenuId = localStorage.getItem('openMenuId');
    if (openMenuId) {
        const menuToOpen = document.getElementById(openMenuId);
        if (menuToOpen) {
            menuToOpen.classList.add('show');
        }
    }

    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            if (e.target === this || e.target.parentNode === this) {
                toggleMenu(this.id);
                e.stopPropagation();
            }
        });
    });

    document.querySelectorAll('.menu-sub a').forEach(link => {
        link.addEventListener('click', function (e) {
            const parentMenu = this.closest('.menu-item-persistent');
            if (parentMenu) {
                parentMenu.classList.add('show');
                localStorage.setItem('openMenuId', parentMenu.id);
            }
        });
    });

    document.addEventListener('click', function (e) {
        if (!e.target.closest('.menu-item-persistent')) {
            closeOtherMenus('');
            localStorage.removeItem('openMenuId');
        }
    });
});
