<?php
session_start();
    require_once('./../model/functions.php');
    // $query = "SELECT * FROM tugas_akhir";
    // $datas = showData($query);
    
    if(!isset($_SESSION["login"])) {
        header("Location: ./../../login.php");
        exit;
    }


// Pagination configuration
    $dataPerPage = 2;
    $amountOfData = count(showData("SELECT * FROM tugas_akhir"));
    $amountOfPage = floor($amountOfData / $dataPerPage);
    
  
    
    if(isset($_GET["page"])) {
        $clickedPage = $_GET["page"];
    } else {
        $clickedPage = 1;
    }
    
    $dataCurrentPage = ($dataPerPage * $clickedPage) - $dataPerPage;
    
  
    $datas = showData("SELECT * FROM tugas_akhir LIMIT $dataCurrentPage,$dataPerPage");

    
    

// When search button clicked
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

<div class="container-pagination" style="padding: 10px;
    display:flex; color:black;
    justify-content:center;
    ">

     <?php if($clickedPage > 1): ?>
        <div style="padding:5px">
        <a href="./index.php?page=<?php echo $clickedPage - 1 ?>">
                        &lt;
                        </a>
                    </div>      
    <?php endif ?>

    <?php for($i=1; $i <= $amountOfPage; $i++): ?>
        
   
        
        <div style="padding: 5px;">
        <a href="./index.php?page=<?php echo $i ?>" style="text-decoration:none;">

                   
                    <?php if($clickedPage == $i): ?>
                        <p style="font-weight:bolder">
                            <?php echo $i ?>
                    </p>
                    <?php else: ?>
                        <p>
                            <?php echo $i ?>
                    </p>
                    <?php endif ?>
                   
                   
        </a>
        </div>
        <?php endfor ?>

        <?php if($clickedPage < $amountOfPage): ?>
        <div style="padding:5px">
        <a href="./index.php?page=<?php echo $clickedPage + 1 ?>">
                        &gt;
                        </a>
                    </div>      
    <?php endif ?>
     
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