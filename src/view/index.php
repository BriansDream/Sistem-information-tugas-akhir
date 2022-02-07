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
    <div>
        <h1>Sistem Monitoring Tugas Akhir</h1>
    </div>
</header>

<main style="margin-top: 30px;">
    <div id="content" style="
    margin:0 auto;
    display:flex; flex-direction:column;
    max-width:1440px; width:100%;
    ">
        <div class="search-container">
        <form action="" method="POST"  style="display:flex;">
            <input autofocus type="text" placeholder="cari data mahasiswa...."
            style="max-width:1400px; width: 100%; padding:10px; font-size:1.1rem;
            " name="dataCari"
            >
            
            <button style="padding:10px; border:none;
            background-color:crimson; color:white;
            " name="btnSearch">cari</button>
    </form>    
    </div>

        <div class="container-content">
        <?php $id=1; ?>
<?php foreach($datas as $data): ?>
        <section>
            <div class="left-content">
                <img src="./../../public/img/<?php echo $data['gambar'] ?>" alt="">
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
                    <div style="margin-top:5px; display:flex; justify-content:flex-start; align-items:center">
                        <a href="./add.php" style="text-decoration:none; margin-right:10px;">
                     
                            <button style="background-color: rgb(250, 109, 109);
                            color: white;  cursor:pointer;" type="submit" name="add">add</button>
                       
                        </a>
                        <a href="./update.php?name=<?php echo $data["id"] ?>" style="text-decoration:none; cursor:pointer; margin-right:10px;">
                    
                            <button style="cursor:pointer; background-color: gold; color:black; font-weight:bolder;" type="submit" name="update">update</button>
                   
                        </a>
                        <a href="./delete.php?name=<?php echo $data["id"] ?>" style="text-decoration:none; cursor:pointer">
                    
                            <button 
                            onclick="confirm('are u sure to delete this data..?')"
                            style="cursor:pointer; background-color: green; color:white; font-weight:bolder;" type="submit" name="delete">delete</button>
                      
                        </a>
                    </div>
            </div>
        </section>
        <?php $id++ ?>
<?php endforeach ?>
</div>


    </div>
</main>
    
</body>
</html>