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
                                <input type="password" placeholder="Nomor induk mahasiswa" class="password" name="password">
                            </div> 
                            <div style="display: flex; align-items: center;">
                                <input type="checkbox" name="remember" id="remember">
                                &nbsp; 
                                <p>remember me</p>
                            </div>
                            <div>
                                <button class="btn-login" name="btn-login">Log in</button>
                            </div> 
                        </form>
                        </div>
                        <div style="text-align: center; margin-bottom: 10px;">
                            <a href="" style="text-decoration: none;">
                                lupa password?
                            </a>
                        </div>
                        <div>
                            <hr>
                        </div>

                        <div style="margin-top: 15px;">
                            <a href="./src/view/register.php">
                            <button type="submit" style="padding: 10px; font-size: 1.1rem; width: 100%; border: none; 
                            border-radius: 10px; cursor:pointer;
                            background-color: rgb(255, 219, 13); font-weight: bold;">Sign Up</button>
                            </a>
                        </div> 

                </div>

            </section>

        </div>
    </main>

</body>
</html>