<?php 
session_start();
require_once('./src/model/functions.php');
    // // Cek apakah Cookie dengan key tersebut masih berlaku / true 
    // if(isset($_COOKIE["remember"])) {
    //     // Cek apakah value dari cookie tersebut === 'true'
    //     if($_COOKIE["remember"] === 'true') {
    //         $_SESSION["login"] = true;
    //     }   
    // }
    


    if(isset($_COOKIE["id"]) && isset($_COOKIE["key"])) {
            $id = $_COOKIE["id"];
            $key = $_COOKIE["key"];

            $result = mysqli_query($conn,"SELECT username FROM user WHERE id = '$id' ");
            // Check apakah hash key yang dibuat dengan set cookie sama dengan hash username tersebut
            if($key === hash('sha256', mysqli_fetch_assoc($result)["username"])) {
                $_SESSION["login"] = true;
            }
    }

    if(isset($_SESSION["login"])) {
        header("Location: ./src/view/index.php");
        exit;
    }

    

    if(isset($_POST["btnLogin"])) {
          $nim = $_POST["nim"];
          $password = $_POST["password"];
            
          $result = mysqli_query($conn, "SELECT * FROM user WHERE username = '$nim' ");
        //   Cek nim
          if(mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);
        //   Cek password        
            if(password_verify($password,$row["password"])) {
                  // set session
                  $_SESSION["login"] = true;

                if(isset($_POST["remember"])) {
                    
                    // setcookie('remember','true', time() + 60);
                    // Encrypt cookie agar sedikit lebih aman
                    setcookie('id',$row["id"], time()+60);
                    setcookie('key', hash('sha256',$row["username"]), time()+60);

                }

              
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
                                <label id="remember">remember me</label>
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