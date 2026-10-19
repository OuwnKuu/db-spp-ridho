<?php

$koneksi = mysqli_connect("localhost", "root", "RidhoDB", "db_spp_ridho");

if (mysqli_connect_errno()) {
    echo "Koneksi database gagal: " . mysqli_connect_error();
}