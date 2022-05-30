<?php
    include "myconnection.php";

    $name = $_POST["myname"];
    $address = $_POST["myaddress"];
    
    $target_path="gambar/";

    $target_path=$target_path . basename($_FILES['myfoto']['name']);
    $foto = $_FILES['myfoto']['name'];

    if(move_uploaded_file($_FILES['myfoto']['tmp_name'],$target_path)){

    }else{
        echo "Terdapat kesalahan dalam menggunggah foto, coba lagi";
    }

    $query = "INSERT INTO murid(name,address,photo)
            VALUE('$name','$address','$foto')";
    
    if(mysqli_query($connect, $query)){
        echo "Data baru berhasil ditambahkan";
    }
    else {
        echo "Data baru gagal ditambahkan <br>". mysqli_error($connect);
    }

    mysqli_close($connect);
?>