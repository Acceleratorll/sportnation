<?php 
    include('connect.php');

    //functions
    function tambahData($connect, $kota_id, $nama_kota) {
        $sql = 
            "SELECT * 
             from kota 
             WHERE kota_id = '$kota_id'";
        $result = mysqli_query($connect, $sql);
        $rowCount = mysqli_num_rows($result);

        echo $rowCount;

        if($rowCount == 0) {
            $sql = 
                "INSERT INTO kota
                VALUES ('$kota_id', '$nama_kota');";
            $result = mysqli_query($connect, $sql);

            alertTambahData();
        } else {
            alertGagalTambahData();
        }
    }

    function alertTambahData() {
        echo 
            '<script type="text/javascript">
                alert("Data berhasil ditambahkan!"); 
            </script>';
    }

    function alertGagalTambahData() {
        echo 
            '<script type="text/javascript">
                alert("Data sudah ada!"); 
            </script>';
    }

    function hitungJumlahData($connect) {
        $sql = "SELECT count(1) from kota";
        $result = mysqli_query($connect, $sql);
        $row = mysqli_fetch_array($result);
        return $total = $row[0];
    }

    //==============================================================

    //menghitung jumlah baris awal
    echo "Jumlah data saat ini: " . hitungJumlahData($connect);
    echo "<br>";

    //tambah data 
    tambahData($connect ,"03K", "Batu");

    //menghitung jumlah baris setelah ditambahkan
    echo "Jumlah data setelah ditambahkan: " . hitungJumlahData($connect);
    echo "<br>";
?>