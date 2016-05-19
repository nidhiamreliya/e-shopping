<!-- reg-form -->
<div class="reg-form">
	<div class="container">
		<div class="row">
			<table id="datatable" class="table table-striped table-bordered">
	            <thead>
	              <tr>
	                <th>No.</th>
	                <th>Product name</th>
	                <th>quantity</th>
	                <th>Price</th>
	              </tr>
	            </thead>
	            <tbody>
	            <?php 
	            	$count = 1;
	            	$total = 0;
	            ?>
	            <?php foreach($checkout as $row):?>
	              <tr>
	                <td><?php echo $count++ ?></td>
	                <td><?php echo $row->product_name ?></td>
	                <td><?php echo $row->quantity ?></td>
	                <td><?php echo $row->product_price ?></td>
	                <?php $total=$total+($row->product_price * $row->quantity)?>
	              </tr>
	            <?php endforeach ?>
	            <tr>
	            	<td colspan="3" class="text-right">Total:</td>
	            	<td><?php echo $total ?></td>
	            </tr>                     
	            </tbody>
	        </table>
	    </div>
	    <div class="clearfix"></div>
	    <div class="row">
		    <div class="col-md-6 ">
				<h2> User Details:</h2>
				<div class="price-details" style="border: none;">
		    		<span>Name:</span>
					<span><?php echo $user['first_name'].' '.$user['last_name'] ?></span>
					<span>Email id:</span>
					<span><?php echo $user['email_id'] ?></span>
					<span>Contact no:</span>
					<span><?php echo $user['contact_no'] ?></span>
					<span>Address:</span>
					<span><?php echo $user['address'] ?>,<br/>
					<?php echo $user['city'] ?>,
					<?php echo $user['zip_code'] ?>,<br/>
					<?php echo $user['state'] ?>,
					<?php echo $user['country'] ?>.</span>
				</div>
		    </div>
		    <div class="col-md-6 ">
				<h2> Shipping Details:</h2>
				<ul>
					<li class="col-md-9 col-sm-9 col-xs-9">
					<section  class="sky-form">
						<label class="checkbox"><input type="checkbox" id="checkbox" name="checkbox"><i></i>As per user address</a></label>
					</section>
					</li>
				</ul>
				<div class="reg2">
					<?php
	                    $data = array(
	                          'name'  => 'shipping_data',
	                          'id' => 'register'
	                        );
	                ?> 
	                <?php echo form_open('order', $data);?>
					<ul>
						<input type="hidden" id="amount" name="amount" value="<?php echo $total ?>">
						<li class="control-label2 col-md-6 col-sm-6 col-xs-12">Shipping address: </li>
						<li class="col-md-12 col-sm-12 col-xs-12" style="margine:0"><input type="text" id="sh_address" name="sh_address" value="<?php echo set_value('sh_address')?>">
							<label class="text-danger">
	                          <?php echo form_error('sh_address'); ?>
	                        </label>
                        </li>
					</ul>
					<ul>
						<li class="control-label2 col-md-6 col-sm-6 col-xs-12">city: </li>
						<li class="col-md-12 col-sm-12 col-xs-12" style="margine:0"><input type="text" id="sh_city" name="sh_city" value="<?php echo set_value('sh_city')?>">
							<label class="text-danger">
	                          <?php echo form_error('sh_city'); ?>
	                        </label>
                        </li>
					</ul>
					<ul>
						<li class="control-label2 col-md-6 col-sm-6 col-xs-12">Zip code: </li>
						<li class="col-md-12 col-sm-12 col-xs-12" style="margine:0"><input type="text" id="sh_zipcode" name="sh_zipcode" value="<?php echo set_value('sh_zipcode')?>">
							<label class="text-danger">
	                          <?php echo form_error('sh_zipcode'); ?>
	                        </label>
                        </li>
					</ul>
					<ul>
						<li class="control-label2 col-md-6 col-sm-6 col-xs-12">State: </li>
						<li class="col-md-12 col-sm-12 col-xs-12" style="margine:0"><input type="text" id="sh_state" name="sh_state" value="<?php echo set_value('sh_state')?>">
							<label class="text-danger">
	                          <?php echo form_error('sh_state'); ?>
	                        </label>
                        </li>
					</ul>
					<ul>
						<li class="control-label2 col-md-6 col-sm-6 col-xs-12">Country: </li>
						<li class="col-md-12 col-sm-12 col-xs-12" style="margine:0"><input type="text" id="sh_country" name="sh_country" value="<?php echo set_value('sh_country')?>">
							<label class="text-danger">
	                          <?php echo form_error('sh_country'); ?>
	                        </label>
                        </li>
					</ul>
					<ul>
						<li class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
							<input type="submit" value="Place order">
						</li>
					</ul>
					<?php echo form_close()?>
				</div>
		    </div>
	    </div>
	    <div class="clearfix"></div>
	</div>
</div>
<script type="text/javascript">
	$('#checkbox').change(function() {
		if ($(this).is(':checked')) {
	    	$('#sh_address').val("<?php echo $user['address'] ?>");
	    	$('#sh_city').val("<?php echo $user['city'] ?>");
	    	$('#sh_zipcode').val("<?php echo $user['zip_code'] ?>");
	    	$('#sh_state').val("<?php echo $user['state'] ?>");
	    	$('#sh_country').val("<?php echo $user['country'] ?>");
	  	} else {
	    	$('#sh_address').val(" ");
	    	$('#sh_city').val(" ");
	    	$('#sh_zipcode').val(" ");
	    	$('#sh_state').val(" ");
	    	$('#sh_country').val(" ");
	  	}
	});
</script>