<!-- check-out -->
<div class="container">
	<div class="check">
		<?php if($cart == null): ?>
			<div class="col-md-4" id="no_data">
				<a class="continue" href="<?php echo site_url('catalog')?>">Continue to basket</a>
				<span> Currently you don't have any item in your cart. </span>
				<br/>
				<span> First add some items in your cart. </span>
			</div>
		<?php else: ?>
			<div class="col-md-4 cart-total">
				<a class="continue" href="<?php echo site_url('catalog')?>">Continue to basket</a>
				<div id="price" class="col-md-12 cart-total">
					<?php echo form_open('checkout');?>				
					<div class="price-details" >
						<h3>Price Details</h3>
						<span>Total</span>
						<span class="total1" id="total_cost"><?php echo $total ?></span>
						<span>Delivery Charges</span>
						<span class="total1">00.00</span>
						<div class="clearfix"></div>				 
					</div>	
					<ul class="total_price">
					   <li class="last_price"> <h4>TOTAL</h4></li>	
					   <li class="last_price"><span id="pay"><?php echo $ltotal= $total + 00.00 ?></span></li>
					   <div class="clearfix"> </div>
					</ul> 
					<div class="clearfix"></div>
					<div class="fgh">
						<input type="submit" class="btn-block" value="Place Order">
					</div>
				</div>
				<?php echo form_close();?>
			</div>
		
			<div class="col-md-8 col-sm-12 col-xs-12 cart-items">
				<div class="cart-header">
					<label><h2 style="margin-top: 0;">Cart Items</h2></label>
				</div>
					
				<?php foreach($cart as $row):?>
				<div id="cart<?php echo $row->cart_id?>">
					<div class="cart-sec simpleCart_shelfItem ">
						<div class="col-md-4 col-sm-4 col-xs-12 cart_img">
							<img src="<?php echo base_url('assets/images/products') .'/'. $row->product_img ?>" class="img-responsive" alt="" style=" height: 100%; width:100%"/>
						</div>
						<div class="col-md-8 col-sm-8 col-xs-12 items-block">
						   <div class="cart-item-info">
						   		<w class="details-left-info">
						   			<h3><?php echo $row->product_name ?></h3>
						   		</w>
						   		<br/><br/>
						   		<p>Price :<span id="cost<?php echo $row->cart_id?>" value="<?php echo $row->product_price?>"><?php echo $row->product_price?></span></p>
						   		
								<ul class="qty">
									<li><p>Qty :<input max="10" min="1" type="number" id="quantity<?php echo $row->cart_id?>" name="quantity" class="form-control input-small" value="<?php echo $row->quantity?>"></p></li>
									<input type="hidden" id="oqty<?php echo $row->cart_id?>" value="<?php echo $row->quantity?>" />
								</ul>
								<div class="delivery">
									<span>Delivered in 2-3 bussiness days</span>
								</div>	
								<div class="fgh">
									<a data-id="<?php echo $row->cart_id?>" class="updateitem">Update</a>
									<a data-id="<?php echo $row->cart_id?>" class="removeitem">Remove</a>
								</div>
							</div>
						</div>
				   		<div class="clearfix"></div>
			 		</div>
			 	</div>
				<?php endforeach ?>
			</div>
		<?php endif ?>
		<div class="clearfix"> </div>
	</div>
</div>
<!-- //check-out -->
<script type="text/javascript">
    
    $(document).ready(function(){

    	$('.removeitem').click(function(){
    		if(confirm('Are you sure you want to remove item ?'))
    		{
    			var id = $(this).attr('data-id');
    			$.ajax({
		            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/cart/remove",   
		            type: "POST",
		            dataType : "json",
		            data:{
		                cart_id:id,
		            },
		           
		            success: function(response) {
		                if (response.status) {
		                	
		                	var total = $('#total_cost').text();
			                var price = $('#cost'+id).text();
			                var qty = $('#quantity'+id).val();
			                total = total-(price * qty);
			                $('#total_cost').text(total);
		                	var ltotal = $('#pay').text(total);

		                	var count = $('#total_items').text();
			                count--;
			                if(count == 0)
			                {
			                	$('#price').remove();
			                	$('.cart-items').remove();
			                }
			                $('#total_items').text(count);
			                $('#cart'+id).remove();
			                
		                } else {
		                	alert(response);
		                }
		            }
		        });
    		}
    	});
	
	    $('.updateitem').click(function(){
	        var id = $(this).attr('data-id');
	        $.ajax({
	            url:  "<?php echo base_url(); ?>" + "e_shopping/index.php/cart/update_cart",   
	            type: "POST",
	            dataType : "json",
	            data:{
	                cart_id : id,
	                quantity :  $('#'+'quantity'+id).val(),
	            },

	            success: function(response) {
	                if (response.status) {

	                  	alert(response.msg, "success");

	                  	var total = $('#total_cost').text();
	                  	var price = $('#cost'+id).text();
	                  	var oqty = $('#oqty'+id).val();
		                var qty = $('#quantity'+id).val();
		                total = parseFloat(total)-parseFloat(price * oqty)+parseFloat(price * qty);
		                var oqty = $('#oqty'+id).val(qty);
		                $('#total_cost').text(total);
	                	var ltotal = $('#pay').text(total);

	                } else {
	                	alert(response.msg);
	                }
	            }
	        });
	    });
   	});
</script>