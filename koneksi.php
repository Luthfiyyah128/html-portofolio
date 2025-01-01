<?php

    //Koneksi Database
    $server = "localhost";
    $user = "root";
    $password = "";
    $database = "dbcrud_modal";

    //buat koneksi
    $koneksi = new mysqli($server,$user,$password,$database) or die(mysqli_error($koneksi));
