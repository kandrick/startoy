<script type="text/javascript">
  $(document).ready(function(){
  $('#products').slides({
    preload: true,
    preloadImage: '/assets/loading.gif',
    effect: 'slide, fade',
    crossfade: true,
    slideSpeed: 350,
    fadeSpeed: 500,
    generateNextPrev: false,
    generatePagination: false
  });

$("#send_email").click(function() {
       $.ajax({
          type: "POST",
          url: "<%=h send_product_email_path %>",
          data: {'from': $('#from_email').val(), 'email':$('#to_email').val(),'id_product':$('#id_product').val()},
          beforeSend: function(data){
            $("#progress").show();
            $("#progress").text("Please Wait, Don't close this window or email will not sent");
            $("#loadingSend").show();
            $("#send_panel").hide();
          },
          error: function(data){
            $("#progress").text("Error");
            alert(data);
          },
          success: function(data){
            $("#loadingSend").hide();
            $("#progress").text("Done, You can close this window");
          }
        });
    });
  });
</script>
  <?php
	include "header.php";
  ?>

<div id="content">
  <?php
	include "sidebar.php";
  ?>
                <div id="middle_content" class="list-product">
                    <div id="breadCrumbs">
                        <span class="breadcrumbsColor">
                        <?php
							$sql ='select id_kamus_barang,kode_barang,nama_barang,height,width,length,harga_grocery,harga_grocery2,harga_retail from kamus_barang b , image i where b.id_kamus_barang=i.kamus_barang_id and b.active=0 and id_kamus_barang like "'.$_GET['id_kamus_barang'].'"';
							$result = $conn->query($sql);
							//$rows = array();
							if ($result->num_rows > 0) {
								// output data of each row
								$i=1;
								$row = $result->fetch_assoc();
								echo $row['nama_barang'];
							}
						?>
						
                        </span>
                        <div align="center">
                            <a><img src="asset/product-prev.png"/></a>
							<a>prev</a>
                          -
							<a>next</a>
                            <a><img src="asset/product-next.png"/></a>
							                           
                        </div>

                    </div>
					<?php
						echo "<input type='hidden' id='id_product' value=".$_GET['id_kamus_barang']."></input>";
						echo "<h1 class='category_title'>".$row['nama_barang']."</h1>";
                    ?>
					<div class="clear"></div>
                    <div id="products_example">
                        <div id="products">
								<?php
									echo "<img src='imageView.php?image_id=".$row['id_kamus_barang']."' width=366 class='large_img'/>";
								?>

						<div class="slides_container">
								<?php
									echo "<img src='imageView.php?image_id=".$row['id_kamus_barang']."' width=366 class='large_img'/>";
								?>

								<% for image in @product.images %>
                                  <%=h link_to  image_tag(image.file_path.url, :width=>'366'), @image_path, :class => "large_img" %>
                                  <!--<a href="#" target="_blank"><img src="<%= image.file_path.url if image %>" width="366" alt="1144953 3 2x"/></a>-->
                                <% end %>
                            </div>
                            <div class="clear"></div>
                            <ul class="pagination">
							<?php
									echo "<li class='thumb_img'><a href='javascript:void(0)' onclick='show_slide_image(0)'><img src='imageView.php?image_id=".$row['id_kamus_barang']."' width='55' alt='1144953 3 2x'/></a></li>";
							?>    
                            </ul>
                        </div>
                        <div class="fb_like">
                          <div id='fb-root'></div>
                          <script src='http://connect.facebook.net/en_US/all.js'></script>
                          <p><a onclick='postToFeed(); return false;'>Post to Facebook</a></p>
                          <p id='msg'></p>

<script>
      FB.init({appId: "316514878450907", status: true, cookie: true});

      function postToFeed() {

        // calling the API ...
        var obj = {
          method: 'feed',
          redirect_uri: 'http://bandatoy.com',
          link: 'https://developers.facebook.com/docs/reference/dialogs/',
          picture: '<%= @image_path %>',
          name: 'Banda Toy Store',
          caption: '<%= @product.name %>',
          description: '<%= number_to_currency(@product.price_retail, :unit => "Rp",
:separator => ",", :delimiter => ".") %>'
        };

        function callback(response) {
          document.getElementById('msg').innerHTML = "Post ID: " + response['post_id'];
        }

        FB.ui(obj, callback);
      }

    function remove_current(){
      $(".thumb_img").removeClass("current");
      $(".large_img").attr("style","display: none")
    }
    
    function show_slide_image(index){
      remove_current();
      $($(".thumb_img")[index]).addClass("current");
      $($(".large_img")[index]).attr("style","display: block");
    }

    </script>

                        </div>

                    </div>
                    <div class="product_example_spec">
                        <div class="doc_file">
                                <a>
                                <img src="asset/print_icon.gif" /> Print Page
                                </a>
                                <img src="asset/envelope.jpg" /><a id="email" class="register" href="javascript:void(0)"> Email Friend</a>
                                <div id="email_text" style='display:none'>
                                  <div class="input_box"><input type="text" id="to_email"></input></div>
                                  <%= submit_tag("Done", :class => "sprite send", :id => "send_email") %>
                                </div>
                        </div>
                        <ul>
                            <li class="price">
                                Price :<br />
                                <span><?php echo $row['harga_grocery2'] ?></span><br/>
                            </li>
                          
                            <li class="price">
                                Grocery :<br />
                                <span></span>

                            </li>
                            <li class="">
                                Rating :<br />
                                <div class="rating sprite">&nbsp;</div>
                            </li>
							<form>
                            <li class="short_desc_prod">
                                Box Size:<br/>
                                <span>
                                    <?php
										echo $row['length']."x".$row['width']."x".$row['height']." cm";
									?>
                                </span>
                            </li>
                            <li class="short_desc_prod">
                                    Weight : <br/>
                                    <span>
                                    <?php echo ($row['length']*$row['width']*$row['height']/6000) ?> kg
                                    </span>
                            </li>
                            <li class="short_desc_prod">
                                Our Recommended Age:<br />
                                <span> 3 years </span>
                            </li>
                            <!--<li class="short_desc_prod">
                                Product Status :<br />
                                <span> In Stock</span>
                            </li>-->
                            <li class="">
                                <input type="hidden" name="id_kamus_barang" value="<?php echo $row['id_kamus_barang'] ?>">
                                Quantity : <input type="text" name="qty"/>
                            </li>
                            <li>
								<intput type="submit" class="sprite add_cart"/>
                             </form>

                            </li>
                        </ul>

                    </div>

                    <div class="clear"></div>
                    <div id="tabs_container">
                        <ul id="tabs">
                            <li class="active" id="tab_desc"><a href="javascript:void(0)"><img src="asset/star.png" />DESCRIPTION</a></li>
                            <li id="tab_info"><a href="javascript:void(0)"><img src="asset/star.png" /> ADDITIONAL INFO</a></li>
                            <!--<li id="tab_how"><a href="javascript:void(0)"><img src="asset/star.png" /> HOW TO GET IT</a></li>-->
                        </ul>
                    </div>
                    <div id="tabs_content_container">
                        <div id="tab4" class="tab_content" style="display: block;">
                            <div class="desc_prod">
                                <h4> Product Description</h4>
                                <p></p>
                            </div>
                        </div>
                        <div id="tab5" class="tab_content" style="display:none;">
                            <div class="desc_prod">
                                <ul>
                                    <li>Item : </li>
                                    <li>Name : </li>
                                    <li>Product Dimensions(in cm) : </li>
                                    <li>Product Weight:  kg </li>
                                </ul>
                            </div>
                        </div>
                        <!--<div id="tab6" class="tab_content" style="display:none;">
                            <div class="desc_prod">
                                <h4>Product Description :</h4>
                                <p>
                                </p>

                                <h4>Product Description :</h4>
                                <p>
                                </p>

                                <h4>Store Pickup(learn more):</h4>
                                <ul>
                                    <li>                                        

                                    </li>
                                </ul>


                            </div>
                        </div>-->
                        <div class="clear"></div>
                    </div>
                    <div class="slide3">
                        <ul id="portfolio">
                            <li>
                                <a href="#">
                                    <img src="asset/bantoy3_03.png" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                    <div class="related_product">
                        <h1>
                            Related Product
                        </h1>
                        <div id="top_product">                            
                            <ul>
                                
                            </ul>
                            <div class="clear"></div>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>
  <?php
	include "footer.php";
  ?>
