            <?
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
                                    <img src="/assets/bantoy3_03.png" />
                                </a>
                            </li>
                        </ul>
                    </div>
                    <div id="top_product">
                        <h1 class="category_title">Product</h1>
                        <ul>
                           <% i=1 %>
                           <% for product in @products %>
                            <li>
                                <div class="box_product">
                                    <% if product.amount>0 %>
                                      <% if (DateTime.now.to_date-product.created_at.to_date).to_i < 30  %>
                                        <span class="new_ico sprite">&nbsp;</span>
                                      <% end %>
                                    <% else %>
                                      <span class="sold_ico sprite">&nbsp;</span>
                                    <% end %>                                  
                                    <span class="img_box"><%= link_to image_tag(product.images[0].file_path.thumb.url), detail_product_path(product.id,i) if product.images[0] %></span>
                                    <h2><%= link_to product.name, detail_product_path(product.id,i) %></h2>
                                    <% if user_signed_in? %>
                                      <% if current_user.type_user=='grocery' %>
                                        <span class="price">G : <%=h format_money(product.price_grocery) %></span>
                                      <% else %>
                                        <div class="rating sprite">&nbsp;</div>
                                      <% end %>
                                    <% else %>
                                        <div class="rating sprite">&nbsp;</div>
                                    <% end %>
                                    <span class="price"><%=h format_money(product.price_retail) %></span>

                                    <%= link_to "", add_to_cart_path(product), :class => "buy_button sprite" %>
                                    <div class="clear"></div>
                                </div>
                                <div class="clear"></div>
                            </li>
                            <% i= i+1 %>
                            <% end %>
                        </ul>
                        <%= will_paginate @products, :prev_label => '«Previous', :next_label => 'Next »' %>
                        <div class="clear"></div>
                    </div>

                    <div class="clear"></div>
                    <div id="tabs_container">
                        <ul id="tabs">
                            <!--<li class="active"><a href="#tab1"><img src="/assets/star.png" />TOP SELLER</a></li>-->
                            <li id="top_seller"><%= link_to image_tag('/assets/star.png')+"TOP SELLER" , top_seller_path, :remote => true %></li>
                            <li id="top_rate"><%= link_to image_tag('/assets/star.png')+"TOP RATED" , top_rate_path, :remote => true %></li>
                            <li id="new_product"><%= link_to image_tag('/assets/star.png')+"WHAT'S NEW" , new_product_path, :remote => true %></li>
                        </ul>
                    </div>
                    <div id="tabs_content_container">
                        <div id="tab1" class="tab_content" style="display: block;">
                            <div id="top_product">
                              <ul>
                               <div id="index">                                  
                                    <%= render(:partial => "special_product", :collection => @special_products ) %>                                  
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

