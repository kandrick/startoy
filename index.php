			<?php
				include ("header.php");
			?>
<div id="content">
<?php 
	include ("sidebar.php");
?>
                <div id="middle_content">
                    <div class="slide">
                        <ul id="portfolio">
                            <li>
                                <a href="#">
                                    <img src="asset/bantoy_03.png" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="top_product">
                        <h1 class="sprite">&nbsp;</h1>
                        <ul>
						<?php 
							include "connectdb.php";
							if(isset($_GET["search"])){
								$search=$_GET['search'];
							}
							else{
								$search='';
							}
							$string_sort='order by date_insert DESC';
							$sql ='select id_kamus_barang,kode_barang,nama_barang,height,width,length,harga_grocery,harga_grocery2,harga_retail from kamus_barang b , image i where b.id_kamus_barang=i.kamus_barang_id and b.active=0 and (nama_barang like "%'.$search.'%" or kode_barang like "%'.$search.'%") '.$string_sort.' limit 0,12';
							$result = $conn->query($sql);
							//$rows = array();
							if ($result->num_rows > 0) {
								// output data of each row
								$i=1;
								while($row = $result->fetch_assoc()) {
									echo "<li>";
									echo "<div class='box_product'>";
									echo "<span class='new_ico sprite'>&nbsp;</span>";
									echo "<span class='img_box'><img src='imageView.php?image_id=".$row['id_kamus_barang']."'/>"."</span>";
                                    echo "<h2>".$row['nama_barang']."</h2>";
									echo "<span class='price'>".$row['harga_grocery']."</span>";
									echo "<div class='rating sprite'>&nbsp;</div>";
									echo "<a href='' class='buy_button sprite'>&nbsp;</a>";
									echo "<div class='clear'></div>";
									echo "</div>";
									echo "<div class='clear'></div>";
									echo "</li>";
								$i++;
								}
								echo "</table>";
							}
						?>
                        </ul>
                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                </div>
                <div id="sidebar_right">
                    <div class="testimonial_box">
                        <a href="#"><h1 class="sprite">Testimonia</h1></a>
					
                        <div class="clear"></div>
                        <div class="testimonial-container">
                            <ul class="box_testi">
                                <li>
                                    <h2>Warno <span>Bandung</span></h2>
                                    <p>
                                       Mantap, hr ini pesan besok sampe!!
                                    </p>
                                </li>        
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="box_payment">
                        <h1 class="sprite">categories</h1>
                        <ul class="payment_list">
                            <li>
                                <p>
                                    <img src="	asset/1_07.jpg" /><br />
                                    Rek 008 5681 899<br />
                                    An. Yullian Nancy Salim 
                                </p>
                            </li>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="box_adv">
                        <a href="">  <img src="asset/pie_adv.jpg" alt="pie delightfully" /></a>
                    </div>                   
                </div>
                <div class="clear"></div>
            </div>
			
			<?php	
				include ("footer.php");
			?>
