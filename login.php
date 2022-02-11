<?php 
    require_once('./src/model/functions.php');
    if(isset($_POST["btnLogin"])) {
          $nim = $_POST["nim"];
          $password = $_POST["password"];
            
          $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$nim' ");
        //   Cek nim
          if(mysqli_num_rows($result) === 1) {
        //   Cek password
            $row = mysqli_fetch_assoc($result);
        
            if(password_verify($password,$row["password"])) {
                header("Location: ./src/view/index.php");
                exit;
            }

          } 

          $error = true;
    }

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem information tugas akhir</title>
    <link rel="stylesheet" href="./public/css/login.css">
</head>
<body>
    
    <main>
        <div id="content">

            <section class="login-container">

                <div class="left-content">
                    <div class="title">
                        <h1>briansdream</h1> 
                    </div>
                    <div class="description">
                        <p>Login monitoring PKL, Tugas akhir, Skripsi dan Thesis</p>
                    </div>
                </div>

                <div class="right-content">
                    <div>
                        <form action="" method="POST">
                            <div>
                                <input type="text" placeholder="Nomor induk mahasiswa" class="nim" name="nim">
                            </div> 
                            <div>
                                <input type="password" placeholder="Please input your password" class="password" name="password">
                            </div> 
                            
                            <div class="remember-me">
                                <input type="checkbox" name="remember" id="remember">
                                &nbsp; 
                                <p>remember me</p>
                            </div>

                            <div>
                                <button class="btn-login" name="btnLogin">Log in</button>
                            </div> 
                        </form>

                        <?php if(isset($error)) : ?>
                            <div class="container-error">
                                <p style="font-style: italic; color:red; text-align:center">Wrong!!! Check again your nim or password</p>
                                </div>
                        <?php endif ?>

                        </div>
                        <div class="container-forgot-password">
                            <a href="">
                                lupa password?
                            </a>
                        </div>

                        <div class="container-hr">
                            <hr>
                        </div>

                        <div class="container-signup">
                            <a href="./src/view/register.php">
                            <button type="submit" class="btn-signup">Sign Up</button>
                            </a>
                        </div> 

                </div>

            </section>

        </div>
    </main>

</body>
</html>