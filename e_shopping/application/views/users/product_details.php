<!-- single-page -->
<div class="single">
<div class="container">
	<div class="single-page">
		<div clas="col-md-6">
		<?php
            $data = array(
                  'name'  => 'add_to_cart',
                  'id' => 'add_to_cart',
                );
        ?> 
        <?php echo form_open('cart/add_item', $data);?>	
        <?php 
        	if(!$product)
        	{
        		redirect('user_products');
        	}
        ?>				 
		<div class="details-lft-inf">
			<img class="preview" src="<?php echo base_url('assets/images/products').'/'.$product['product_img'] ?>" />
		</div>
		</div>
		<div class="col-md-5 col-md-offset-1">
		<div class="details-left-info">
			<h3><?php echo $product['product_name'] ?></h3>
			<h4><?php echo $product['description'] ?> </h4>
			<div class="simpleCart_shelfItem">
				<p><span class="item_price qwe"><i class="fa fa-inr" aria-hidden="true"></i>  <?php echo $product['product_price'] ?></span></p> 
				<div class="clearfix"> </div>
				<p class="qty">Qty ::</p><input min="1" max="10" type="number" id="quantity" name="quantity" value="1" class="form-control input-small">
				<div class="single-but item_add">
					<input type="hidden" name="product_id" id="product_id" value="<?php echo $product['product_id']?>">
					<input type="submit" value="add to cart">
				</div>
				<?php
					if($this->session->flashdata('alredy_exist'))
					{
						echo '<p><span class="item_price" style="color: #1B6D85;">' . $this->session->flashdata('alredy_exist') . '</span></p>';
					}
				?>
			</div>
		</div>
		 <?php echo form_close();?>
		</div>
		<div class="clearfix"></div>				 	
	</div>
</div>
</div>
