<?php
    require_once('./../model/functions.php');
    $query = "SELECT * FROM tugas_akhir";
    $datas = showData($query);
  
    if(isset($_POST["btnSearch"])) {
      
        
        $searchData = $_POST["dataCari"];
        $searchQuery = "SELECT * FROM tugas_akhir 
        WHERE
        nim LIKE '%$searchData%' OR
        nama LIKE '%$searchData%' OR
        judul LIKE '%$searchData%'          
        ";
        $datas = showData($searchQuery);
    
    }
   
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Tugas Akhir</title>
    <link rel="stylesheet" href="./../../public/css/index.css">
</head>
<body>

<header>
    <div class="left-content">
        <h1>Monitoring Tugas Akhir</h1>
    </div>
    <div class="right-content">
        <a href="./logout.php">
        <p>Logout</p>
        </a>
    </div>

</header>

<main>
    <div id="content">

        <div class="search-container">
      
        <form action="" method="POST">
            <div class="left-content">
            <input type="text" placeholder="cari data mahasiswa...." name="dataCari" autofocus>
            </div>
            <div class="right-content">
            <button type="submit" name="btnSearch" class="btn-search">🔍</button>
            </div>
        </form>  
      

    </div>

        <div class="container-data">
    <?php $id=1; ?>
    <?php foreach($datas as $data): ?>
        <section>
            <div class="left-content">
                <img src="./../../public/img/<?php echo $data['gambar'] ?>" alt="<?php echo $data['nama'] ?>">
            </div>
            <div class="right-content">
              
                    <div>
                        <p>No : <?php echo $id ?></p>
                    </div>
                    <div>
                        <p>Nim : <?php echo $data["nim"] ?></p>
                    </div>
                    <div>
                        <p>Nama : <?php echo $data["nama"] ?></p>
                    </div>
                    <div>
                        <p>Judul : <?php echo $data["judul"] ?></p>
                    </div>
                    <div>
                        <p>Tanggal : <?php echo $data["tanggal"] ?></p>
                    </div>
                    <div class="container-functions">
                     
                        <a href="./update.php?name=<?php echo $data["id"] ?>">
                            <button class="btn-update" type="submit" name="update">update</button>
                        </a>

                        <a href="./delete.php?name=<?php echo $data["id"] ?>">
                            <button class="btn-delete"
                            onclick="confirm('are u sure to delete this data..?')"
                            type="submit" name="delete">delete</button>
                      
                        </a>

                    </div>
            </div>
        </section>
        <?php $id++ ?>
<?php endforeach ?>
</div>

        <div class="container-add-data">

        <a href="./add.php">
            <button type="submit">
                    add data mahasiswa
            </button>
        </a>

        </div>

    </div>
</main>
    


</body>
</html>