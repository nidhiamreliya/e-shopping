<!-- single-page -->
<div class="single">
<div class="container">
	<div class="single-page">
		<div clas="col-md-6"> 
		
        <?php 
        	if(!$product)
        	{
        		redirect('user_products');
        	}
        ?>				 
		<div class="flexslider details-lft-inf">
			<ul class="slides">
				<li>
					<img class="preview" src="<?php echo $product['product_img'] != null ? base_url('assets/images/products').'/'.$product['product_img'] : base_url('assets/images/products/default.jpg') ?>" />
				</li>
				<li>
					<img class="preview" src="<?php echo $product['product_img'] != null ? base_url('assets/images/products').'/'.$product['product_img'] : base_url('assets/images/products/default.jpg') ?>" />
				</li>
				<li>
					<img class="preview" src="<?php echo $product['product_img'] != null ? base_url('assets/images/products').'/'.$product['product_img'] : base_url('assets/images/products/default.jpg') ?>" />
				</li>
			</ul>
		</div>
			<!-- FlexSlider -->
			  <script defer src="<?php echo base_url('assets/js/jquery.flexslider.js')?>"></script>
			<link rel="stylesheet" href="<?php echo base_url('assets/css/flexslider.css')?>" type="text/css" media="screen" />

				<script>
			// Can also be used with $(document).ready()
			$(window).load(function() {
			  $('.flexslider').flexslider({
				animation: "slide",
			  });
			});
			</script>
		</div>

		<div class="col-md-5 col-md-offset-1">
		<div class="details-left-info">
			<h3><?php echo $product['product_name'] ?></h3>
			<h4><?php echo $product['description'] ?> </h4>
			<div class="simpleCart_shelfItem">
				<p><span class="item_price qwe"><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $product['product_price'] ?></span></p> 
				<div class="clearfix"> </div>
				<p class="qty">Qty ::</p><input type="number" max="10" min="1" id="quantity" name="quantity" value="1" class="form-control input-small">
				<p class="text-danger" style="color: red; font-size: 15px;">
                	<?php echo form_error('quantity'); ?>
                </p>
				<div class="single-but item_add">
					<input type="submit"  value="add to cart" data-id="<?php echo $product['product_id']?>" class="additem">
				</div>
			</div>
		</div>
		 <?php echo form_close();?>
		</div>
		<div class="clearfix"></div>				 	
	</div>
</div>
</div>
