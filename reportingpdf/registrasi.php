<?php 
    require 'function.php';

    if( isset($_POST['register'])) {
        
        if( registrasi($_POST) > 0 ) {
            echo "<script>
                    alert('Registrasi Berhasil!');
                </script>";
        } else {
            echo mysqli_error($conn);
        }
    }

?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi</title>
    <link rel="stylesheet" href="css/style.css">

    
</head>
<body class="body-regist">

<div class="card-regist">
    
    <h1>Halaman Registrasi</h1> 

    <form action="" method="post" >
        <ul class="form-regist">
            <li>
                <label for="username">username :</label>
                <input type="text" name="username" id="username">
            </li>
            <li>
                <label for="password">password :</label>
                <input type="password" name="password" id="password" >
            </li>
            <li>
                <label for="password2">konfirmasi password :</label>
                <input type="password" name="password2" id="password2" >
            </li>
            <li>
                <button type="submit" name="register">Register</button>
            </li>
        </ul>
        <label for="">Sudah Punya Akun?</label>
        <a href="login.php">Login</a>
    </form>
</div>
</body>
</html>