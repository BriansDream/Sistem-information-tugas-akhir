<?php 

// Database connection
$conn = mysqli_connect('localhost','root','','sista');

function showData($query){
    // to access variable global
    global $conn;
    // Query data to mysql return object 
    $result = mysqli_query($conn,$query);
    // return array associative dari dalam database
    $students = [];
    while($student = mysqli_fetch_assoc($result)) {
        $students[] = $student;
    }
    return $students;

}

function addData($datas){
    global $conn;

    // put value of form into new variable
    // htmlspecialchars convert special character into html entities
    $nim = htmlspecialchars($datas["nim"]);
    $nama = htmlspecialchars($datas["nama"]);
    $judul = htmlspecialchars($datas["judul"]);
    $tanggal = $datas["tanggal"];


    // upload gambar
    $gambar = uploadFile();
    if(!$gambar) {
        return false;
    }

    $query = "INSERT INTO tugas_akhir VALUES (
        '', '$nim', '$nama', '$judul', '$tanggal', '$gambar')
        ";
    // query to database
    mysqli_query($conn,$query);
    // return nilai perubahan yang terjadi pada mysqli operation database 
    //(int) 1 success and -1 fail
    return mysqli_affected_rows($conn);
}

function deleteData($id) {
    global $conn;

    mysqli_query($conn, "DELETE FROM tugas_akhir WHERE id = $id ");
    return mysqli_affected_rows($conn);

}

function updateData($dataUpdate) {
        global $conn;

        $id = $dataUpdate["oldId"];
        $nim = htmlspecialchars($dataUpdate["nim"]);
        $nama = htmlspecialchars($dataUpdate["nama"]);
        $judul = htmlspecialchars($dataUpdate["judul"]);
        $tanggal = $dataUpdate["tanggal"];

      
        $oldImage = $_POST["oldImage"];
        if($_FILES["gambar"]["error"] === 4) {
            $gambar = $oldImage;
        } else {
            $gambar = uploadFile();
        }

        $query = "UPDATE tugas_akhir SET 
        nim = '$nim',
        nama = '$nama',
        judul = '$judul',
        tanggal = '$tanggal',
        gambar = '$gambar'
        WHERE id = $id;
        ";
        mysqli_query($conn,$query);

        return mysqli_affected_rows($conn);
}

function uploadFile() {
    // $_FILES contains array assoc multidimention
    $namaFile = $_FILES["gambar"]["name"];
    $ukuranImage = $_FILES["gambar"]["size"];
    $tmpName = $_FILES["gambar"]["tmp_name"];
    $error = $_FILES["gambar"]["error"];
  
    // Cek apakah ada gambar yang diupload
    if($error == 4) {
        echo "<script>
        alert('Upload file dulu jamett....');
        </script>";
        return false;
    }

    // cek file extention
    $allowedExtention = ['png','jpg','jpeg'];
    // explode built in function that use to 
    // memecah sebuah string menjadi array based on your delimiter
    $imageExtention = explode('.',$namaFile);
    // get last index
    $imageExtention = strtolower(end($imageExtention));

    if(!in_array($imageExtention,$allowedExtention)) {
        echo "<script>
        alert('Only image extention will be upload..');
        </script>";
        return false;
    }

    // cek image size
    if($ukuranImage > 2000000) {
            echo"
            <script>
            alert('Size image must be less than 2MB..');
            </script>
            ";
            return false;
    }

    // generate image name before put into directory
    $newFileName = uniqid();
    $newFileName .= '.';
    $newFileName .= $imageExtention;
    // uploaded file
    // move file from temporary folder into destination of file
    move_uploaded_file( $tmpName, './../../public/img/' . $newFileName );

    return $newFileName;
}
?>