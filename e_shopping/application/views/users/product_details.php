<!-- single-page -->
<div class="single">
<div class="container">
	<div class="single-page">					 
		<div class="details-lft-inf">
			<img class="preview" src="<?php echo base_url('assets/images/products').'/'.$product['product_img'] ?>" />
		</div>
		<div class="details-left-info">
			<h3><?php echo $product['product_name'] ?></h3>
				<h4><?php echo $product['description'] ?> </h4>
			<div class="simpleCart_shelfItem">
				<p><span class="item_price qwe"><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $product['product_price'] ?></span> 
				<div class="clearfix"> </div>
				<p class="qty">Qty ::</p><input min="1" max="10" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">
				<div class="single-but item_add">
					<input type="submit" value="add to cart">
				</div>
			</div>
			<div class="flower-type">
			<p>Category  ::<a href="#"><?php echo $product['category_id'] ?></a></p>
			</div>
		</div>
		<div class="clearfix"></div>				 	
	</div>