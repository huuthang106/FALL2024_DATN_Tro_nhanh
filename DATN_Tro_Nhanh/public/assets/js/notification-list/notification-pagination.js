document.addEventListener('DOMContentLoaded', function () {
    const selectElement = document.getElementById('notification-list_length');
    const searchForm = document.getElementById('search-form');

    selectElement.addEventListener('change', function () {
        const selectedValue = this.value;
        const queryParams = new URLSearchParams(window.location.search);

        queryParams.set('notification-list_length', selectedValue);
        window.location.search = queryParams.toString(); // Tải lại trang với tham số mới
    });

    // document.getElementById('search-input').addEventListener('input', function () {
    //     clearTimeout(this.delay);
    //     this.delay = setTimeout(function () {
    //         searchForm.submit();
    //     }, 500); // Thực hiện tìm kiếm sau 300ms
    // });

    document.getElementById('clear-button').addEventListener('click', function () {
        const queryParams = new URLSearchParams(window.location.search);
        queryParams.delete('query');
        queryParams.delete('notification-list_length');
        window.location.search = queryParams.toString();
    });
});
