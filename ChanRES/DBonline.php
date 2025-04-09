<!DOCTYPE html>
<html lang="en">
<head>
  <style>
body {
            font-family: 'Roboto', sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4;
        }
      
      
        .nav {
            background-color: #444;
            overflow: hidden;
        }
        .nav a {
            float: left;
            display: block;
            color: #fff;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .nav a:hover {
            background-color: #ddd;
            color: black;
        }
        .container {
            padding: 145px;
        }
        .reservation-form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: 0 auto;
        }
        .reservation-form h2 {
            margin-top: 0;
        }
        .form-group {
            margin-bottom: 15px;
        }
        .form-group label {
            display: block;
            margin-bottom: 5px;
        }
        .form-group input, .form-group select, .form-group textarea {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-group button {
            background-color: #333;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .form-group button:hover {
            background-color: #555;
        }
      
  </style>
  <title>Chạn.Restaurant - Ngon hơn bao giờ hết</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

  <link rel="stylesheet" href="css/animate.css">
  
  <link rel="stylesheet" href="css/owl.carousel.min.css">
  <link rel="stylesheet" href="css/owl.theme.default.min.css">
  <link rel="stylesheet" href="css/magnific-popup.css">

  <link rel="stylesheet" href="css/bootstrap-datepicker.css">
  <link rel="stylesheet" href="css/jquery.timepicker.css">

  
  <link rel="stylesheet" href="css/flaticon.css">
  <link rel="stylesheet" href="css/style.css">
</head>
<body>

 <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
  <div class="container">
    <a class="navbar-brand" href="index.html">Chạn.<span>Restaurant</span></a>
    <!--<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="oi oi-menu"></span> Menu
    </button>-->
 
    <div class="collapse navbar-collapse" id="ftco-nav">
      <ul class="navbar-nav ml-auto">
       <li class="nav-item active"><a href="index.php" class="nav-link">Trang chủ</a></li>
           <li class="nav-item"><a href="about.html" class="nav-link">Về chúng tôi</a></li>
           <!--<li class="nav-item"><a href="chef.html" class="nav-link">Chef</a></li>-->
           <li class="nav-item"><a href="contact.html" class="nav-link">Liên hệ</a></li>
           <li class="nav-item"><a href="LOGIN.html" class="nav-link">Login</a></li>
           <!--<li class="nav-item"><a href="reservation.html" class="nav-link">Reservation</a></li>-->
           <!--<li class="nav-item"><a href="blog.html" class="nav-link">Blog</a></li>-->
     </ul>
   </div>
 </div>
</nav>
<!-- END nav -->
<div class="container">
  <div class="reservation-form">
      <h2>ĐẶT BÀN ONLINE</h2>
      <form name="frmCreate" method="post" action="" class="form">
      <div class="form-group">
              <label for="hoten">Họ tên</label>
              <input type="text" id="hoten" name="hoten" required>
          </div>
          <div class="form-group">
              <label for="combo">COMBO</label>
              <input type="text" id="combo" name="combo" required>
          </div>
          <div class="form-group">
              <label for="sdt">SDT</label>
              <input type="varchar" id="sdt" name="sdt" required>
          </div>
          <div class="form-group">
              <label for="date">Date</label>
              <input type="date" id="date" name="date" required>
          </div>
          <div class="form-group">
              <label for="time">Time</label>
              <input type="time" id="time" name="time" required>
          </div>
          <div class="form-group">
              <label for="soluong">Số lượng bàn</label>
              <input type="int" id="soluong" name="soluong" required>
          </div>
          
          <div class="form-group">
              <label for="yeucau">Yêu cầu đặc biệt</label>
              <textarea type="text" id="yeucau" name="yeucau" rows="4"></textarea>
          </div>
          <div class="form-group">
              <button name="btnSave">Reserve Now</button>
          </div>
      </form>
  </div>
</div>
<?php
    // Truy vấn database
    // 1. Include file cấu hình kết nối đến database, khởi tạo kết nối $conn
    //include_once(__DIR__ . '/../dbconnect.php');
    $conn = mysqli_connect('localhost', 'root', '', 'danhmucsp') ;

    // 2. Người dùng mới truy cập trang lần đầu tiên (người dùng chưa gởi dữ liệu `btnSave` - chưa nhấn nút Save) về Server
    // có nghĩa là biến $_POST['btnSave'] chưa được khởi tạo hoặc chưa có giá trị
    // => hiển thị Form nhập liệu

    // Nếu biến $_POST['btnSave'] đã được khởi tạo
    // => Người dùng đã bấm nút "Lưu dữ liệu"
    if ( isset($_POST['btnSave']) ) {
        
        // 3. Nếu người dùng có bấm nút `Lưu dữ liệu` thì thực thi câu lệnh INSERT
        // Lấy dữ liệu người dùng hiệu chỉnh gởi từ REQUEST POST
        $hoten = $_POST['hoten'];
        $combo = $_POST['combo'];
        $sdt = $_POST['sdt'];
        $date = $_POST['date'];
        $time = $_POST['time'];
        $soluong = $_POST['soluong'];
        $yeucau = $_POST['yeucau'];

       
        //$UuTien = $_POST['UuTien'];
        //$AnhDaiDien = $_POST['AnhDaiDien'];
        // 4. Kiểm tra ràng buộc dữ liệu (Validation)
        // Tạo biến lỗi để chứa thông báo lỗi
        $errors = [];
        // 5. Thông báo lỗi cụ thể người dùng mắc phải (nếu vi phạm bất kỳ quy luật kiểm tra ràng buộc)
        // dd($errors);
        if (!empty($errors)) {
            // In ra thông báo lỗi
            // kèm theo dữ liệu thông báo lỗi
            foreach($errors as $errorField) {
                foreach($errorField as $error) {
                    echo $error['msg'] . '<br />';
                }
            }
            return;
        }

        // 6. Nếu không có lỗi dữ liệu sẽ thực thi câu lệnh SQL
        // Câu lệnh INSERT
        $sqlInsert = <<<EOT
        INSERT INTO tbl_datban (hoten,combo, sdt, date,time,soluong,yeucau) 
        VALUES ('$hoten', '$combo', ' $sdt ','$date','$time','$soluong','$yeucau')
        EOT;

        // Code dùng cho DEBUG
        // var_dump($sqlInsert); die;

        // Thực thi INSERT
        mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:index.php'); 
    }
    ?>
<script src="js/jquery.min.js"></script>
<script src="js/jquery-migrate-3.0.1.min.js"></script>
<script src="js/popper.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.easing.1.3.js"></script>
<script src="js/jquery.waypoints.min.js"></script>
<script src="js/jquery.stellar.min.js"></script>
<script src="js/owl.carousel.min.js"></script>
<script src="js/jquery.magnific-popup.min.js"></script>
<script src="js/jquery.animateNumber.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script src="js/jquery.timepicker.min.js"></script>
<script src="js/scrollax.min.js"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="js/main.js"></script>

</body>
</html>