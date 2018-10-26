        <div style='display:none'>
            <div id='advance_searchs' class="popup">
                <div class="login_panel">
                    <h2 class="sprite advance_title">Advance Search</h2>
                    <form>
                        <div>
                            <label>Sex</label>
                            <div class="clear"></div>
                            <select name="carlist" form="carform">
								<option value="Boy">Boy</option>
								<option value="Girl">Girl</option>
							</select>
                        </div>
                        <div>
                            <label>Category</label>
                            <div class="clear"></div>
                            <select name="carlist" form="carform">
								<option value="Boy">Boy</option>
								<option value="Girl">Girl</option>
							</select>
                        </div>
                        <div class="clear"></div>
                        <div>
                            <label>Price < </label>
                            <div class="clear"></div>                            
                            <select name="carlist" form="carform">
								<option value="Boy">50000</option>
								<option value="Girl">100000</option>
							</select>
                        </div>
                        <div>
                            <label>Age <</label>
                            <div class="clear"></div>
                            <select name="carlist" form="carform">
								<option value="Boy">5</option>
								<option value="Girl">10</option>
							</select>
                        </div>

                        <div class="clear"></div>
                        <input type="submit" value="Submit">
                    </form>
                </div>
            </div>
        </div>

<div id="sidebar_left">

                    <div class="search_box">
                        <h1 class="sprite">Search</h1>
                       <form action="kamusbarang.php">
                        <div class="input_box">
                           <input type="text" name="search">
                        </div>
						<input type="hidden" name="page" value="0">
                        <input type="submit" class="sprite">	
                        <div class="clear"></div>
                        </form>
                    </div>

                    <div class="clear"></div>
                    <a href="" class="sprite advance_search">&nbsp;</a>
                    <div class="clear"></div>

                    <div class="box_categories">
                        <h1 class="sprite">categories</h1>
                        <ul class="categories_list">
						<?php 
							include "connectdb.php";
							$sql ='select id_kategori,nama_kategori from kategori';
							$result = $conn->query($sql);
							if ($result->num_rows > 0) {
								$i=1;
								while($row = $result->fetch_assoc()) {
									echo "<li>";
									echo "<a href='product_category.php?kategori=".$row['id_kategori']."&page=0'>".$row['nama_kategori']."</a>";
									echo "<div class='clear'></div>";
									echo "</li>";
								}
							}
						?>
                        </ul>
                        <div class="clear"></div>
                    </div>
                    <div class="clear"></div>
                    <div class="box_adv">
                        <a href="">
                            <img src="asset/delivery_adv.png" alt="delivery" />
                        </a>
                    </div>
                </div>
