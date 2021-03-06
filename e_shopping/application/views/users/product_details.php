<!-- single-page -->
<div class="single">
<div class="container">
	<div class="single-page">
		<?php if(!$product): ?>
        		<span> No data available for this product</span>
   		<?php else: ?>				
		<div clas="col-md-6">  
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
		</div>
		<?php endif ?>
		<div class="clearfix"></div>				 	
	</div>
</div>
</div>
<!-- FlexSlider -->
<script defer src="<?php echo base_url('assets/js/jquery.flexslider.js')?>"></script>
<link rel="stylesheet" href="<?php echo base_url('assets/css/flexslider.css')?>" type="text/css" media="screen" />
<script type="text/javascript">
$(document).ready(function(){
	$('.flexslider').flexslider({
				animation: "slide",
			  });
    $('.additem').click(function(){        
        $.ajax({
            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/cart/add_to_cart",   
            type: "POST",
            dataType: "json",
            
            data:{
                product_id: $(this).attr('data-id'),
                user_id: "<?php echo $this->session->userdata('user_id') ?>",
                quantity: $('#quantity').val()
            },

            success: function(response) {
                if(response.status)
                {
                    alert(response.msg);
                    var count = $('#total_items').text();
                    count++;
                    $('#total_items').text(count);
                }
                else
                {
                    alert(response.msg);
                }
            }
        });
    });
});
</script>