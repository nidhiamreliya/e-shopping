<!-- reg-form -->
<div class="reg-form">
	<div class="container">
		<div class="row">
			<table id="datatable" class="table table-striped table-bordered">
	            <thead>
	              <tr>
	                <th>Product Id</th>
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
	    <div class="col-md-8 col-md-offset-2">
			<h2> Delivery Details:</h2>
			<div class="reg">
	    		<?php
                    $data = array(
                          'name'  => 'register',
                          'id' => 'register',
                          'class' => "form-horizontal"
                        );
                ?> 
                <?php echo form_open('user_control/insert_user', $data);?>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">First Name: </li>
						<li class="col-md-1 col-sm-1 col-xs-2"><input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name')?>">
							<label class="text-danger">
	                          <?php echo form_error('first_name'); ?>
	                        </label>
                        </li>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Last Name: </li>
						<li class="col-md-1 col-sm-1 col-xs-2"><input type="text" id="last_name" name="last_name"  value="<?php echo set_value('last_name')?>">
							<label class="text-danger">
	                          <?php echo form_error('last_name'); ?>
	                        </label>
                        </li>
					</ul>				 
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Email: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="email_id" name="email_id"  value="<?php echo set_value('email_id')?>">
						<label class="text-danger">
                          <?php echo form_error('email_id'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Contect no.: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="contect_no" name="contect_no"  value="<?php echo set_value('contect_no')?>">
						<label class="text-danger">
                          <?php echo form_error('contect_no'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Address:</li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="address" name="address" value="<?php echo set_value('address')?>">
						<label class="text-danger">
                          <?php echo form_error('address'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">City: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="city" name="city" value="<?php echo set_value('city')?>">
						<label class="text-danger">
                          <?php echo form_error('city'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Zip_code: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="zip_code" name="zip_code" value="<?php echo set_value('zip_code')?>">
						<label class="text-danger">
                          <?php echo form_error('zip_code'); ?>
                        </label>
                        </li>
					</ul>						
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">State: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="state" name="state" value="<?php echo set_value('state')?>">
						<label class="text-danger">
                          <?php echo form_error('state'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Country: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="country" name="country" value="<?php echo set_value('country')?>">
						<label class="text-danger has-error">
                          <?php echo form_error('country'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="col-md-9 col-sm-9 col-xs-9 col-md-offset-3">
							<input type="submit" value="Register Now">
						</li>
					</ul>
					<p class="click col-md-12 col-sm-12 col-xs-12">By clicking this button, you are agree to my Policy Terms and Conditions.</p> 
				</form>
			</div>
			</div>
	    </div>
	</div>
</div>