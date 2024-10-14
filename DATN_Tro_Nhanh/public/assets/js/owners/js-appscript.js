function checkForNewDeposits() {
    var sheet = SpreadsheetApp.getActiveSpreadsheet().getSheetByName('gdtn');
    var data = sheet.getDataRange().getValues(); // Lấy tất cả dữ liệu trong sheet

    // Lấy dữ liệu từ hàng thứ hai (A2 đến E2)
    var maGD = data[1][0]; // Mã GD ở cột A
    var moTa = data[1][1]; // Mô tả ở cột B
    var giaTri = data[1][2]; // Giá trị ở cột C
    var ngayThanhToan = data[1][3]; // Ngày thanh toán ở cột D
    var soTaiKhoan = data[1][4]; // Số tài khoản ở cột E

    // Tạo payload
    var payload = {
        ma_gd: maGD,
        mo_ta: moTa,
        gia_tri: giaTri,
        ngay_thanh_toan: ngayThanhToan,
        so_tai_khoan: soTaiKhoan
    };

    var options = {
        method: 'post',
        contentType: 'application/json',
        payload: JSON.stringify(payload)
    };

    Logger.log("Tới đây: " + JSON.stringify(payload)); // Ghi log payload

    try {
        var response = UrlFetchApp.fetch('https://tronhanh.com/api/credit', options);
        Logger.log("Response from API: " + response.getContentText());
        sheet.getRange(2, 6).setValue("sent"); // Đánh dấu là đã gửi ở cột F
    } catch (error) {
        Logger.log("Error: " + error);
    }
}