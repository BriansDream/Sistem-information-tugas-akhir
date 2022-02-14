<?php 

    session_start();
    require_once('./../model/functions.php');
    
    if(!isset($_SESSION["login"])) {
        header("Location: ./../../login.php");
    }
    
    // When button add clicked or set / true
    if(isset($_POST["add"])) {
  
        if(addData($_POST) > 0) {
            echo"
            <script>
            alert('added data successfully...');
            document.location.href = 'index.php';
            </script>
            ";
        } else {
            return mysqli_error($conn);
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>adding data mahasiswa</title>
    <link rel="stylesheet" href="./../../public/css/add.css">
</head>
<body>
    


    <main>
        <div id="content">
            <section >
            <div style="margin-bottom:10px;">
                <a href="./index.php">
                    <h1>🏠</h1>
                </a>
                </div>

                <div class="container-add">
                <div style="margin-bottom: 15px; text-align:center;">
                    <h1>adding data mahasiswa</h1>
                </div>
                <form action="" method="POST" style="display: flex; flex-direction:column;"
                enctype="multipart/form-data"
                >
                    <div style="margin-bottom: 15px;">
                        <input type="text" placeholder="Nomor induk mahasiswa" name="nim" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <input type="text" placeholder="Nama mahasiswa" name="nama" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <input type="text" placeholder="Judul tugas akhir mahasiswa" name="judul" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <input type="date" name="tanggal" required>
                    </div>
                    <div style="margin-bottom: 15px;">
                        <input type="file" name="gambar" required>
                    </div>

                    <div>
                        <button class="btn-add" name="add">adding tambah</button>
                    </div>
                </form>
                </div>
            </section>
        </div>
    </main>

</body>
</html>