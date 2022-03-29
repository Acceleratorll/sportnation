<?php 
    include('connect.php');

    //functions
    function tambahData($connect, $kota_id, $nama_kota) {
        $sql = 
            "INSERT INTO kota
             VALUES ($kota_id, $nama_kota);";
        $result = mysqli_query($connect, $sql);
    }

    function checkTambahData() {
        if($total == $total + 1) {
            alertTambahData();
        }
    }

    function alertTambahData() {
        echo 
            '<script type="text/javascript">
                alert("Data berhasil ditambahkan!"); 
            </script>';
    }

    //menghitung jumlah baris awal
    $sql = "SELECT count(1) from kota";
    $result = mysqli_query($connect, $sql);
    $row = mysqli_fetch_array($result);
    $total = $row[0];

    echo "$total";
    echo "<br>";

    //tambah data
    tambahData($connect, "03K", "Batu");

    //check apabila data bertambah dan alert
    checkTambahData();
?>