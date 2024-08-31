// document.addEventListener('DOMContentLoaded', function() {
//     const menuItems = document.querySelectorAll('.menu-item-persistent');

//     // Hàm đóng tất cả các menu
//     function closeAllMenus() {
//         menuItems.forEach(item => {
//             item.classList.remove('show');
//         });
//     }

//     // Hàm mở menu được chỉ định
//     function openMenu(menuId) {
//         closeAllMenus();
//         const menuToOpen = document.getElementById(menuId);
//         if (menuToOpen) {
//             menuToOpen.classList.add('show');
//         }
//         localStorage.setItem('openMenuId', menuId);
//     }

//     // Khôi phục trạng thái menu
//     const openMenuId = localStorage.getItem('openMenuId');
//     if (openMenuId) {
//         openMenu(openMenuId);
//     }

//     // Xử lý click vào các menu item
//     menuItems.forEach(item => {
//         item.addEventListener('click', function(e) {
//             if (!this.classList.contains('show')) {
//                 openMenu(this.id);
//             }
//             // Ngăn chặn sự kiện click lan ra ngoài
//             e.stopPropagation();
//         });
//     });

//     // Xử lý click vào các liên kết trong submenu
//     document.querySelectorAll('.menu-sub a').forEach(link => {
//         link.addEventListener('click', function(e) {
//             const parentMenu = this.closest('.menu-item-persistent');
//             if (parentMenu) {
//                 openMenu(parentMenu.id);
//             }
//             // Không ngăn chặn hành vi mặc định của liên kết
//         });
//     });

//     // Đóng tất cả các menu khi click bên ngoài
//     document.addEventListener('click', function(e) {
//         if (!e.target.closest('.menu-item-persistent')) {
//             closeAllMenus();
//             localStorage.removeItem('openMenuId');
//         }
//     });
// });
document.addEventListener('DOMContentLoaded', function () {
    const menuItems = document.querySelectorAll('.menu-item-persistent');

    // Hàm đóng tất cả các menu ngoại trừ menu được chỉ định
    function closeOtherMenus(exceptMenuId) {
        menuItems.forEach(item => {
            if (item.id !== exceptMenuId) {
                item.classList.remove('show');
            }
        });
    }

    // Hàm mở/đóng menu được chỉ định
    function toggleMenu(menuId) {
        const menuToToggle = document.getElementById(menuId);
        if (menuToToggle) {
            if (menuToToggle.classList.contains('show')) {
                menuToToggle.classList.remove('show');
            } else {
                closeOtherMenus(menuId);
                menuToToggle.classList.add('show');
            }
            localStorage.setItem('openMenuId', menuToToggle.classList.contains('show') ? menuId : '');
        }
    }

    // Khôi phục trạng thái menu
    const openMenuId = localStorage.getItem('openMenuId');
    if (openMenuId) {
        const menuToOpen = document.getElementById(openMenuId);
        if (menuToOpen) {
            menuToOpen.classList.add('show');
        }
    }

    // Xử lý click vào các menu item
    menuItems.forEach(item => {
        item.addEventListener('click', function (e) {
            if (e.target === this || e.target.parentNode === this) {
                toggleMenu(this.id);
                e.stopPropagation();
            }
        });
    });

    // Xử lý click vào các liên kết trong submenu
    document.querySelectorAll('.menu-sub a').forEach(link => {
        link.addEventListener('click', function (e) {
            const parentMenu = this.closest('.menu-item-persistent');
            if (parentMenu) {
                parentMenu.classList.add('show');
                localStorage.setItem('openMenuId', parentMenu.id);
            }
            // Không ngăn chặn hành vi mặc định của liên kết
        });
    });

    // Đóng tất cả các menu khi click bên ngoài
    document.addEventListener('click', function (e) {
        if (!e.target.closest('.menu-item-persistent')) {
            closeOtherMenus('');
            localStorage.removeItem('openMenuId');
        }
    });
});