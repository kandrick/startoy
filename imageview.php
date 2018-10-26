<?php
include "connectdb.php";
if(isset($_GET['image_id'])) {
$sql = "SELECT content FROM kamus_barang k,image i WHERE k.id_kamus_barang=i.kamus_barang_id and k.id_kamus_barang='" . $_GET['image_id']."'";
$result = $conn->query($sql);
if($row = $result->fetch_assoc()){
header("Content-type: image/jpg");
echo $row["content"];
}
}
$conn->close;
?>