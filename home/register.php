<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng ký</title>
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">
</head>
<body>
<div class="container">
    <form class="text-center border border-light p-5" action="" method="POST">
        <p class="h4 mb-4">Đăng ký</p>

        <!-- Name -->
        <input type="text" id="name" name="name" class="form-control mb-4" placeholder="Tên" required>

        <!-- Phone -->
        <input type="tel" id="phoneNumber"  name="phoneNumber" class="form-control mb-4" placeholder="Số điện thoại" required>
        <!-- Student ID -->
        <input type="text" id="studentID" name="studentID" class="form-control mb-4" placeholder="Mã số sinh viên" required>

        <!-- Gmail -->
        <input type="tel" id="gmail"  name="gmail" class="form-control mb-4" placeholder="Gmail" required>
        <!-- Age -->
        <input type="number" id="age" name="age" class="form-control mb-4" placeholder="Tuổi" required>

        <select class="browser-default custom-select mb-4" name="clb" required>
            <option value="" selected disabled>Chọn câu lạc bộ</option>
            <option value="1" >CLB Bóng Chuyền</option>
            <option value="2">CLB An Ninh Mạng</option>
            <option value="3">CLB Văn Nghệ</option>
            <option value="4">CLB Thể Dục Thể Thao</option>
            <option value="1" >CLB Võ Thuật</option>
            <option value="2">CLB Thanh Lịch</option>
            <option value="3">CLB Khiêu Vũ</option>
            <option value="4">CLB MC</option>
        </select>

        <!-- Reason -->
        <div class="form-group">
            <textarea class="form-control rounded-0" id="reason" name="reason" rows="3" placeholder="Lý do" required></textarea>
        </div>
        <!-- Image -->
        <input type="file" id="img" name="img" accept="image/*" class="form-control mb-4" required>

        <!-- Send button -->
        <button class="btn btn-info btn-block" type="submit">Gửi</button>
    </form>
<!-- Default form contact -->
</div>

</body>
</html>

