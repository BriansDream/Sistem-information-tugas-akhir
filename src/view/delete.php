<?php 
    session_start();

    if(!isset($_SESSION["login"])) {
        header("Location: ./../../login.php");
    }
    
    require_once('./../model/functions.php');
    $id = $_GET["name"];

    if(deleteData($id) > 0) {
        echo"
        <script>
                alert('Data deleted succesfully...');
                document.location.href = 'index.php';
        </script>
        ";
    } else {
        return mysqli_error($conn);
    }

?>