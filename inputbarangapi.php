<?php
	include "connectdb.php";
	$kode_barang=;
	$sql1 = 'insert into kamus_barang (id_kamus_barang,kode_barang,nama_barang,length,width,height,harga_grocery,harga_grocery2,harga_retail,kategori,date_insert,active)';
	$sql2 = 'values ($_POST["id_kamus_barang"],$_POST["kode_barang"],$_POST["nama_barang"],$_POST["length"],$_POST["width"],$_POST["height"],$_POST["harga_grocery"],$_POST["harga_grocery2"],$_POST["harga_retail"],$_POST["kategori"],$_POST["date_insert"],$_POST["active"])';
	if($conn->query($sql))
	{
		echo "0";
	}	
	else
	{
		echo "1";
	}	
?>