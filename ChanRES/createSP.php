<!DOCTYPE html>
<html lang="en">
<style>
body {
  background-image: url('./nenthemnhanvien.jpg');
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;
  font-family: 'Roboto', sans-serif;
        
     
}

        
        .main {
            padding: 1rem;
        }
        .section {
            background-color: white;
            padding: 1.5rem;
            border-radius: 0.5rem;
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
            margin-bottom: 1.5rem;
        }
        .section h2 {
            font-size: 1.5rem;
            font-weight: bold;
            margin-bottom: 1rem;
        }
        .form-group {
            margin-bottom: 1rem;
        }
        .form-group label {
            display: block;
            margin-bottom: 0.5rem;
            font-weight: 600;
        }
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }
        .form-group textarea {
            resize: vertical;
        }
        .form-actions {
            display: flex;
            justify-content: flex-end;
            gap: 1rem;
        }
        .footer {
            background-color: #38a169;
            color: white;
            padding: 1rem;
            margin-top: 1.5rem;
            text-align: center;
        }
        .headerr {
            background-color: #38a169;
            color: white;
            padding: 1rem;
        }
</style>
<style>
         div#bigBox {width:auto; 
                     height:500px; 
                    
                     padding: 106px 192px 23px 123px;
                     }
                     
        </style>     
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>

    <!-- Liên kết CSS Bootstrap bằng CDN -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
</head>

<body>
<body class="bg-gray-100">
    <header class="headerr">
        <div class="container mx-auto flex justify-between items-center">
            <h1>Chạn.Restaurant</h1>
        </div>
    </header>
    <!-- Main content -->
  
        <div id="bigBox">
              <form name="frmCreate" method="post" action="" class="form">
              <main class="main container mx-auto p-4">
        <section class="section bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Thêm Mới Sản Phẩm</h2>
            <form>
            <div class="form-group">
                    <label for="product-name">ID</label>
                    <input id="ID" name="ID" placeholder="ID" type="text"/>
                </div>
                <div class="form-group">
                    <label for="product-name">Tên Sản Phẩm</label>
                    <input id="tensanpham" name="tensanpham" placeholder="Nhập tên sản phẩm" type="text"/>
                </div>
                <div class="form-group">
                    <label for="product-price">Giá</label>
                    <input id="gia" name="gia" placeholder="Nhập giá sản phẩm" type="VARCHAR"/>
                </div>
                <div class="form-group">
                    <label for="product-description">Ảnh Mô Tả</label>
                    <input type="file" name="anhmota"  />               
                <div class="form-actions">
                    <button class="btn btn-primary" name="btnSave" >
                        Thêm Sản Phẩm
                    </button>
                   
                </div>
            </form>
        </section>
    </main>
        </form>
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
        $ID = $_POST['ID'];
        $tensanpham = $_POST['tensanpham'];
        $gia = $_POST['gia'];
        $anhmota = $_POST['anhmota'];
       
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
        INSERT INTO tbl_Khoa (ID,tensanpham, gia, anhmota) 
        VALUES ('$ID', '$tensanpham', ' $gia ','$anhmota')
        EOT;

        // Code dùng cho DEBUG
        // var_dump($sqlInsert); die;

        // Thực thi INSERT
        mysqli_query($conn, $sqlInsert);

        // Đóng kết nối
        mysqli_close($conn);

        // Sau khi cập nhật dữ liệu, tự động điều hướng về trang Danh sách
        header('location:admin.php');   
    }
    ?>

    <!-- Liên kết JS Jquery bằng CDN -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>

    <!-- Liên kết JS Popper bằng CDN -->
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

    <!-- Liên kết JS Bootstrap bằng CDN -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

    <!-- Liên kết JS FontAwesome bằng CDN -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.0/js/all.min.js"></script>
</body>

</html>