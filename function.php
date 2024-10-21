<?php
//connectsql
$conn = mysqli_connect("localhost", "root","", "stockbarang");

//createdata
if(isset($_POST['addnewbarang'])) {
    $namabarang = $_POST['namabarang'];
    $deskripsi = $_POST['deskripsi'];
    $stock = $_POST['stock'];

    $addtotable = mysqli_query($conn, "INSERT INTO stock (namabarang, deskripsi, stock) values ('$namabarang', '$deskripsi', '$stock')");
    if($addtotable){
        header('location:index.php');
    } else{
        echo 'Gagal';
        header('location:index.php');
    }
};

// createdatamasuk
if (isset($_POST['barangmasuk'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"SELECT * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array( $cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang+$qty;

    $addtomasuk = mysqli_query($conn, "INSERT INTO masuk (idbarang, keterangan, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn,"UPDATE stock SET stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");

    if ($addtomasuk&$updatestockmasuk) {
        header('Location: barangmasuk.php');
        exit(); 
    } else {
        echo 'Gagal'; 
        header('Location: barangmasuk.php');
        exit(); 
    }
};

// createdatakeluar
if (isset($_POST['addbarangkeluar'])) {
    $barangnya = $_POST['barangnya'];
    $penerima = $_POST['penerima'];
    $qty = $_POST['qty'];

    $cekstocksekarang = mysqli_query($conn,"SELECT * from stock where idbarang='$barangnya'");
    $ambildatanya = mysqli_fetch_array( $cekstocksekarang);

    $stocksekarang = $ambildatanya['stock'];
    $tambahkanstocksekarangdenganquantity = $stocksekarang-$qty;

    $addtokeluar = mysqli_query($conn, "INSERT INTO keluar (idbarang, penerima, qty) VALUES ('$barangnya', '$penerima', '$qty')");
    $updatestockmasuk = mysqli_query($conn,"UPDATE stock SET stock='$tambahkanstocksekarangdenganquantity' where idbarang='$barangnya'");

    if ($addtokeluar&$updatestockmasuk) {
        header('Location: barangkeluar.php');
        exit(); 
    } else {
        echo 'Gagal'; 
        header('Location: barangkeluar.php');
        exit(); 
    }
};
?>