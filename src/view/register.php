<?php 
require_once('./../model/functions.php');

if(isset($_POST["btnRegist"])) {
    if(regist($_POST) > 0) {
        echo "
        <script>
            alert('data berhasil didaftarkan..');
            document.location.href = './../../login.php';
        </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign-up</title>
    <link rel="stylesheet" href="./../../public/css/register.css">
</head>
<body>
    

<main>
    <div id="content">

        <section class="container-signup">

        <div class="left-content">
                <div class="title">
                        <h1>
                            briansdream
                        </h1>
                </div>
                
                <div class="description">
                        <p>
                            As a web administrator, you have to regist student data before student use this web application.
                        </p>
                </div>
        </div>

        <div class="right-content">
            <div class="container-title">
                <h1>Sign-up</h1>
            </div>
            <div class="form-container">
            <form action="" method="POST">
                <div>
                    <input type="text" name="username" placeholder="Masukkan nomor induk mahasiswa" required>
                </div>
                <div>
                    <input type="password" name="password1" placeholder="Masukkan password" required>
                </div>
                <div>
                    <input type="password" name="password2" placeholder="Masukkan konfirmasi password" required>
                </div>
                <div>
                    <button type="submit" name="btnRegist" class="btn-signup">daftar</button>
                </div>


                </form>
                </div>
                <a href="./../../login.php" style="text-decoration: none;">
                <div class="container-login-link">
                   <p>sudah punya akun..?</p>
                </div>
                </a>
        </div>
       
        </section>

    </div>
</main>

</body>
</html>