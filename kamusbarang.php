            <?php
			include ("header.php");
			?>
			<div id="content">
              <?php
				include ("sidebar.php");
			  ?>
                <div id="middle_content" class="list-product">
                    <div class="slide2">
                        <ul id="portfolio">
                            <li>
                                <a href="#">
                                    <img src="asset/bantoy3_03.png" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="top_product">
                        <h1 class="category_title">Product</h1>
                        <ul>
						<?php 
							include "connectdb.php";
							if(isset($_GET["search"])){
								$search=$_GET['search'];
							}
							else{
								$search='';
							}
							$page=$_GET['page'];
							$string_sort='order by date_insert DESC';
							$sql ='select b.id_kamus_barang,kode_barang,nama_barang,height,width,length,harga_grocery,harga_grocery2,harga_retail from kamus_barang b , image i where b.id_kamus_barang=i.kamus_barang_id and b.active=0 and (nama_barang like "%'.$search.'%" or kode_barang like "%'.$search.'%") '.$string_sort.' limit '.($page*12).',12';
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
									echo "<span class='price'>".$row['harga_grocery2']."</span>";
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
						<?php
							if($page>0){
								echo "<a href='kamusbarang.php?&page=".($page-1)."'>Prev</a>&nbsp";
							}
							else{
								echo "Prev&nbsp";
							}
							echo "<a href='kamusbarang.php?page=".($page+1)."'>Next</a>";
							
								
						?>
						<div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                    <div id="tabs_container">
                        <ul id="tabs">
                            <li id="top_seller"><a><img src="asset/star.png"></img>Top Seller</a></li>
                            <li id="top_rate"><a><img src="asset/star.png"></img>Top Rated</a></li>
                            <li id="new_product"><a><img src="asset/star.png"></img>Whats New</a></li>
                        </ul>
                    </div>
                    <div id="tabs_content_container">
                        <div id="tab1" class="tab_content" style="display: block;">
                            <div id="top_product">
                              <ul>
                               <div id="index">                                  
                                                                      
                                </div>
                                </ul>
                                <div class="clear"></div>
                            </div>
                            <div class="clear"></div>
                            <ul id="pagination-clean">
                                <li><a href="?page=2">View All Top Seller »</a></li>
                            </ul>
                        </div>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
	        <?php
				include ("footer.php");
			?>

