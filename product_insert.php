<?php
	if($_POST['pass']='pcpt3110'){
		include "connectdb.php";
		$sqlcek='select * from kamus_barang where id_kamus_barang like "'.$_POST["id_kamus_barang"].'"';
		$result = $conn->query($sqlcek);
		if ($result->num_rows == 0) {
			if($_POST['jumlah']>2){
				$sqlcek='select * from kategori where nama_kategori like "'.$_POST["kategori"].'"';
				$result=$conn->query($sqlcek);
				if ($result->num_rows == 0) {
					$sql = 'insert into kategori (nama_kategori,active) values ("'.$_POST["kategori"].'",0)';
					$conn->query($sql);
					$sqlcek='select * from kategori where nama_kategori like "'.$_POST["kategori"].'"';
					$result=$conn->query($sqlcek);
					while($row = $result->fetch_assoc()) {
						$id_kategori=$row['id_kategori'];
					}			
				}
				else{
					while($row = $result->fetch_assoc()) {
						$id_kategori=$row['id_kategori'];
					}
				}
				$sql = 'insert into kamus_barang (id_kamus_barang,kode_barang,nama_barang,length,width,height,harga_grocery,harga_grocery2,harga_retail,kategori_id,date_insert,active) values ("'.$_POST["id_kamus_barang"].'","'.$_POST["kode_barang"].'","'.$_POST["nama_barang"].'",'.$_POST["length"].','.$_POST["width"].','.$_POST["height"].','.$_POST["harga_grocery"].','.$_POST["harga_grocery_2"].','.$_POST["harga_retail"].',"'.$id_kategori.'",Now(),'.$_POST["active"].')';
				if($conn->query($sql)){
					$image=$_FILES["picture"]["tmp_name"];
					$img_content = addslashes(file_get_contents($image));
					$sql1 = 'insert into image (content,kamus_barang_id) values ("'.$img_content.'","'.$_POST["id_kamus_barang"].'")';
					$conn->query($sql1);
					echo "0";
				}
			}
		}
		else{
			if($_POST['jumlah']<2){
				$sql="update kamus_barang set active =1 where id_kamus_barang like '"+$_POST["id_kamus_barang"]+"'";
				$conn->query($sql);			
			}
		}
	}	
?>