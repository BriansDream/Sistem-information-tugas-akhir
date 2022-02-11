<?php 
    require_once('./../model/functions.php');
    $oldId = $_GET['name'];
    $query = "SELECT * FROM tugas_akhir WHERE id = $oldId";
    $oldDatas = showData($query);

    if(isset($_POST["update"])) {
      if(updateData($_POST) > 0) {
        echo "
      <script>
            alert('data update succesfully');
            location.href = 'index.php';

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
    <title>Update data mahasiswa</title>
    <link rel="stylesheet" href="./../../public/css/update.css">
</head>
<body>
    
    <main>
        <div id="content">
                <section>
                    <div style="margin-bottom: 10px;">
                        <a href="./index.php">
                            <h1>🏠</h1>
                            </a>
                    </div>
                <div class="container-update">
                    <div style="text-align: center; margin-bottom:15px;">
                        <h1>update data mahasiswa</h1>
                    </div>
      
                    <form action="" method="POST" enctype="multipart/form-data">
    <?php foreach($oldDatas as $oldData): ?>
     
                    <div style="margin-bottom: 15px;">
                            <input type="hidden" name="oldId"
                            value="<?php echo $oldData["id"] ?>"
                            >
                            <input type="hidden" name="oldImage" value="<?php echo $oldData['gambar'] ?>">

                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="nim"
                            value="<?php echo $oldData["nim"] ?>"
                            >
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="nama"
                            value="<?php echo $oldData["nama"] ?>"
                            >
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="text" name="judul"
                            value="<?php echo $oldData["judul"] ?>"
                            >
                        </div>
                        <div style="margin-bottom: 15px;">
                            <input type="date" name="tanggal"
                            value="<?php echo $oldData["tanggal"] ?>"
                            >
                        </div>
                        <div style="margin-bottom: 15px;">
                        <img src="./../../public/img/<?php echo $oldData['gambar'] ?>" alt="<?php echo $oldData['nama'] ?>"
                        
                        >
                            <input type="file" name="gambar">
                        </div>
        
                        <div>
                            <button type="submit" name="update">update data</button>
                        </div>
                        <?php endforeach ?>

                    </form>

                
                    </div>

                </section>
        </div>
    </main>

</body>
</html>