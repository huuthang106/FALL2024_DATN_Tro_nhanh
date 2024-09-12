document.addEventListener('DOMContentLoaded', function () {
    const checkboxes = document.querySelectorAll('.price-list-checkbox');
    const totalPriceElement = document.getElementById('total-price');
    const totalPriceInput = document.getElementById('total-price-input'); // Thêm input ẩn

    // Hàm tính tổng tiền
    function calculateTotalPrice() {
        let totalPrice = 0;

        // Lặp qua tất cả các checkbox
        checkboxes.forEach(function (checkbox) {
            if (checkbox.checked) {
                // Lấy giá và số lượng từ thuộc tính data của checkbox
                const price = parseFloat(checkbox.getAttribute('data-price')) || 0;
                const quantity = parseInt(checkbox.getAttribute('data-quantity')) || 1;

                // Tính tổng cho sản phẩm này và cộng vào tổng toàn bộ
                totalPrice += price * quantity;
            }
        });

        // Làm tròn tổng tiền xuống số nguyên
        totalPrice = Math.round(totalPrice);

        // Cập nhật tổng tiền trên giao diện và thêm đơn vị "VND"
        totalPriceElement.textContent = new Intl.NumberFormat('vi-VN', {
            style: 'decimal',
            minimumFractionDigits: 0,
            maximumFractionDigits: 0
        }).format(totalPrice) + ' VND';

        // Cập nhật tổng tiền vào input ẩn để gửi qua form
        totalPriceInput.value = totalPrice;
    }

    // Gán sự kiện 'change' cho mỗi checkbox
    checkboxes.forEach(function (checkbox) {
        checkbox.addEventListener('change', calculateTotalPrice);
    });

    // Tính tổng tiền ngay khi trang được tải
    calculateTotalPrice();
});