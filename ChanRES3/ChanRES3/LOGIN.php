<html lang="vi">
<head>
    <meta charset="utf-8"/>
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <title>Đăng Nhập Nhà Hàng Buffet</title>
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
            <h2 class="text-2xl font-bold mb-4 text-center">Đăng Nhập</h2>
            <form action="login.php" method="post">
                <div class="mb-4">
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="uname">Tên Đăng Nhập</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" type="text" name="uname" placeholder="Tên Đăng Nhập" required/>
                </div>
                <div class="mb-6"> 
                    <label class="block text-gray-700 text-sm font-bold mb-2" for="psw">Mật Khẩu</label>
                    <input class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="password" name="psw" placeholder="********" required/>
                </div>
                <div class="flex items-center justify-between">
                    <button class="bg-green-600 hover:bg-green-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit" name="login">
                        Đăng Nhập
                    </button>
                   <a  href="forgotmk.php">Quên mật khẩu?</a>
     
                </div>
               
    
  
            </form>
        </div>
    </main>
    <footer class="bg-green-600 text-white p-4 mt-6">
        <div class="container mx-auto text-center">
            <p>© 2023 Nhà Hàng Buffet. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>
<?php
  session_start();
  if (isset($_POST["login"]))
  {
    $uname=$_POST["uname"];
    $psw=$_POST["psw"];
    $conn = mysqli_connect('localhost', 'root', '', 'danhmucsp');
    $sqlselect = "select * from `tbl_dangnhap`  WHERE username='".$uname."' and password = '".$psw."';";
    $resultSelect = mysqli_query($conn, $sqlselect);
    $user = mysqli_fetch_array($resultSelect, MYSQLI_ASSOC); 
    if(!empty($user)) {
      if ($user['role']=='1')
        {
          //$tb="Tài khoản này có quyền admin";
          $_SESSION['s_user']=$user;
          header('location:admin.php');
          }
      
      else
         {
          //$tb="Tài khoản này có quyền khachs hang";
         $_SESSION['s_user']=$user;
         header('location:index.php');
         }
         if ($user['role']=='2')
         {
           //$tb="Tài khoản này có quyền admin";
           $_SESSION['s_user']=$user;
           header('location:nhanvien.php');
           }
        }
    else
      {
        $tb="Tài khoản này không tồn tại";
      }
    }
    
?>
<?php 
  if (isset($tb)&&($tb!="")){
    echo "<h3 style='color:red'>".$tb."</h3>";
  }
?>