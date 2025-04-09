<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm mới</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <style>
        body {
            background-image: url('./nendatban.jpg');
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
        .headerr {
            background-color: #38a169;
            color: white;
            padding: 1rem;
        }
       
        .form-group input, .form-group textarea {
            width: 100%;
            padding: 0.75rem;
            border: 1px solid #ddd;
            border-radius: 0.25rem;
        }
    </style>
</head>

<body>
    <header class="headerr">
        <div class="container mx-auto">
            <h1>Chạn.Restaurant</h1>
        </div>
    </header>

    <div id="bigBox" class="container mt-4">
        <form name="frmCreate" method="post" action="">
            <main class="main">
                <section class="section bg-white p-6 rounded-lg shadow-lg">
                    <h2 class="text-2xl font-bold mb-4">ĐẶT BÀN ONLINE</h2>
                    <div class="form-group">
                        <label for="hoten">HỌ TÊN</label>
                        <input id="hoten" name="hoten" placeholder="Nhập họ tên" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label for="combo">COMBO</label>
                        <input id="combo" name="combo" placeholder="Nhập combo" type="text" required/>
                    </div>
                    <div class="form-group">
                        <label for="sdt">SDT</label>
                        <input id="sdt" name="sdt" placeholder="Nhập sdt" type="text" required/>
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
                        <input id="soluong" name="soluong" placeholder="Nhập số lượng" type="number" required/>
                    </div>
                    <div class="form-group">
                        <label for="yeucau">Yêu cầu</label>
                        <input id="yeucau" name="yeucau" placeholder="Nhập yêu cầu" type="text"/>
                    </div>
                    <div class="form-actions">
                        <button class="btn btn-primary" name="btnSave">ĐẶT BÀN NGAY</button>
                    </div>
                </section>
            </main>
        </form>
    </div>

    <?php
    // Database connection
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
        header('location:DBTC.html'); 
          

    }
    ?>
   

    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</body>
</html>