<?php
    include "myconnection.php";

    $id = $_GET["myid"];
    $name = $_GET["myname"];
    $address = $_GET["myaddress"];
    $foto = $_POST["myfoto"];

    $target_path="gambar/";

    $target_path=$target_path . basename($_FILES['myfoto']['name']);
    $foto = $_FILES['myfoto']['name'];


    if(move_uploaded_file($_FILES['myfoto']['tmp_name'],$target_path)){

    }else {
        echo "Terjadi kesalahan dalam menggunggah foto, silahkan mencoba kembali";
    }

    $query = "UPDATE murid SET name='$name', address='$address', photo='$foto' WHERE id=$id";

    if(mysqli_query($connect, $query)){
        header('Location:homeCRUD.php');
    }
    else{
        echo "Gagal mengubah data <br>". mysqli_error($connect);
    }

    mysqli_close($connect);
?>