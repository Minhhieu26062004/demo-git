<?php
$loi="";
if (isset($_POST['nutguiyeucau']) ==true) {
$email = $_POST['email'];
$conn = new PDO("mysql:host=localhost; dbname=danhmucsp; charset=utf8", "root", "");
$conn->setAttribute (PDO::ATTR_ERRMODE, PDO:: ERRMODE_EXCEPTION);
$sql= "SELECT * FROM tbl_dangnhap WHERE email = ?";
$stmt = $conn->prepare($sql); //Tạo 1 prepare stement
$stmt->execute([$email]);
$count = $stmt->rowCount();
if ($count==0) {
$loi ="Email chưa đúng , vui lòng nhập lại";
}
else {
    $matkhaumoi = substr(md5(rand(0,999999)),1,10);
    $sql="UPDATE tbl_dangnhap SET password = ? WHERE email = ?";
    $stmt = $conn->prepare($sql);
    $stmt->execute([$matkhaumoi ,$email]);
    //echo"da cap nhat";
    GuiMatKhau($email,$matkhaumoi);
   

}
}
?>
<?php
function GuiMatKhau($email,$matkhaumoi){
    require "PHPMailer-master/src/PHPMailer.php"; 
    require "PHPMailer-master/src/SMTP.php"; 
    require 'PHPMailer-master/src/Exception.php'; 
    $mail = new PHPMailer\PHPMailer\PHPMailer(true);//true:enables exceptions
    try {
        $mail->SMTPDebug = 0; //0,1,2: chế độ debug
        $mail->isSMTP();  
        $mail->CharSet  = "utf-8";
        $mail->Host = 'smtp.gmail.com';  //SMTP servers
        $mail->SMTPAuth = true; // Enable authentication
        $mail->Username = 'hungcaoviet0909@gmail.com'; // SMTP username
        $mail->Password = 'hchbvdphylkozxng';   // SMTP password
        $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
        $mail->Port = 465;  // port to connect to                
        $mail->setFrom('hungcaoviet0909@gmail.com', 'Hung' ); 
        $mail->addAddress($email); 
        $mail->isHTML(true);  // Set email format to HTML
        $mail->Subject = 'Thư gủi lại mật khẩu';
        $noidungthu = "<p>Bạn nhận được thư này là do bạn yêu cầu đổi lại mật khẩu tại website CHẠN.RESTAURANT</p>
        Mật khẩu mới của bạn là {$matkhaumoi}"; 
        $mail->Body = $noidungthu;
        $mail->smtpConnect( array(
            "ssl" => array(
                "verify_peer" => false,
                "verify_peer_name" => false,
                "allow_self_signed" => true
            )
        ));
        $mail->send();
        echo "Mật khẩu mới đã được gửi vào email. <a href='LOGIN.php'>ĐĂNG NHẬP</a>";
    } catch (Exception $e) {
        echo 'Error: lỗi ', $mail->ErrorInfo;
    }
}
?>
<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Quên mật khẩu</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet"/>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet"/>
    <style>
        body {
            font-family: 'Roboto', sans-serif;
        }
    </style>
</head>
<body class="bg-gray-100">
    <header class="bg-green-600 text-white p-4">
        <div class="container mx-auto flex justify-between items-center">
            <h1 class="text-2xl font-bold">Chạn.Restaurant</h1>
            <nav>
                <ul class="flex space-x-4">
                    <li><a class="hover:underline" href="index.php">Thoát</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <main class="container mx-auto p-4 flex justify-center items-center min-h-screen">
        <div class="bg-white p-6 rounded-lg shadow-lg w-full max-w-md">
            <h2 class="text-2xl font-bold mb-4 text-center">Quên mật khẩu</h2>
           
            <form  method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Nhập email của bạn</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" value="<?php if (isset($email)==true) echo $email?>" type="email" id="email" name="email" placeholder="Nhập email" required/>
                </div>
                <?php if ($loi!=""){?>
                     <div>
                        <?= $loi ?>
                     </div>
           <?php }?>
                <div class="flex items-center justify-between">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="nutguiyeucau" value="nutgui">
                        Gửi yêu cầu
                    </button>
                   
     
                </div>
               
    
  
            </form>
        </div>
    </main>
</body>
</html>