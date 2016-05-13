<!-- cate -->
<div class="cate">
	<div class="container">
	<?php 
		if($nacklaces)
		{
	?>
			<div class="cate-left">
				<h3>Necklaces <i class="glyphicon glyphicon-chevron-right" aria-hidden="true"></i>
				<span>Our Catelog</span></h3>
			</div>
			<div class="cate-right">
				<!-- slider -->
				<ul id="flexiselDemo1">
				<?php foreach ($nacklaces as $row):?>		
					<li>
						<div class="sliderfig-grid">
							<img src="<?php echo $row->product_img != null ? base_url('assets/images/products').'/'. $row->product_img : base_url('assets/images/products/default.jpg') ?>" alt=" " class="img-responsive" height="100%" width="150"/>
						</div>
					</li>
				<?php endforeach ?>
				</ul>
	<?php
		}
	?>
		<script type="text/javascript">
				$(window).load(function() {
					$("#flexiselDemo1").flexisel({
						visibleItems: 4,
						animationSpeed: 1000,
						autoPlay: true,
						autoPlaySpeed: 3000,    		
						pauseOnHover: true,
						enableResponsiveBreakpoints: true,
						responsiveBreakpoints: { 
							portrait: { 
								changePoint:480,
								visibleItems: 3
							}, 
							landscape: { 
								changePoint:640,
								visibleItems:4
							},
							tablet: { 
								changePoint:768,
								visibleItems: 3
							}
						}
					});
					
				});
		</script>
			<script type="text/javascript" src="<?php echo base_url('assets/js/jquery.flexisel.js')?>"></script>
		</div>
		<!-- //slider -->
			<div class="clearfix"> </div>
			</div>
	<!-- //cate -->
	<!-- banner-bottom -->
	<div class="banner-bottom">
		<div class="container catelog">
			<div class="row">
				<div class="cate-hed">
					<h3>Our New products <i class="glyphicon glyphicon-menu-down" aria-hidden="true"></i></h3>
				</div>
				<div class="catalog">
				<?php 
					foreach ($products as $row) 
					{
				?>
						<div class="col-md-2 product-left"> 
							<div class="p-two simpleCart_shelfItem jwe">							
								<a href="<?php echo site_url('products/view').'/'.$row->slug?>">
									<img src="<?php echo $row->product_img != null ? base_url('assets/images/products').'/'.$row->product_img : base_url('assets/images/products/default.jpg')?>" alt="" class="img-responsive" />
									<div class="mask">
										<span>Quick View</span>
									</div>
								</a>
								<div class="product-left-cart">
									<div class="product-left-cart-l text-center">
										<p><a class="item_add" href="#"><span class=" item_price"><i class="fa fa-inr" aria-hidden="true"></i><?php echo $row->product_price?></span></a></p>
									</div>
									<div class="clearfix"> </div>
								</div>
							</div>
						</div>
				<?php
					}
				?>
				</div>
			</div>
			<div class="row">
				<div class="text-center">
					<font color="#F65A5B">
					<ul class="pagination pagination-md">
					<!-- Show pagination links -->
					<?php 
						foreach ($links as $link) 
						{
							echo '<li>'. $link.'</font></li>';
						}
					?>
	  				</ul>
	  			</div>
	  		</div>
		</div>
	</div>
</div>
<!-- //banner-bottom -->