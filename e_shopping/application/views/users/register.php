<!-- reg-form -->
	<div class="reg-form">
		<div class="container">
			<div class="reg">
				<h3>Register Now</h3>
				<p>Welcome, please enter the following details to continue.</p>
				<p>If you have previously registered with us, <a href="<?php echo site_url('user_control')?>">click here</a></p>
				<?php
                    $data = array(
				            'name'  	=> 'registration',
				            'id'		=> 'registration',
                          	'class' 	=> 'form-horizontal',
                        );
                ?> 
                <?php echo form_open('user_control/insert_user', $data);?>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">First Name: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="first_name" name="first_name" value="<?php echo set_value('first_name')?>">
						<label class="text-danger">
                          <?php echo form_error('first_name'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Last Name: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="last_name" name="last_name"  value="<?php echo set_value('last_name')?>">
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
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Contact no.: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="text" id="contact_no" name="contact_no"  value="<?php echo set_value('contact_no')?>">
						<label class="text-danger">
                          <?php echo form_error('contact_no'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Password: </li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="password" id="password" name="password" >
						<label class="text-danger">
                          <?php echo form_error('password'); ?>
                        </label>
                        </li>
					</ul>
					<ul>
						<li class="text-info control-label col-md-3 col-sm-3 col-xs-12">Re-enter Password:</li>
						<li class="col-md-7 col-sm-7 col-xs-12"><input type="password" id="confirm_password" name="confirm_password" >
						<label class=" text-danger">
                          <?php echo form_error('confirm_password'); ?>
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
<script type="text/javascript">
    $("#registration").on("submit", function(e){
    var isValid = $("#registration").valid();

    if(isValid){
        teturn true;
    }

    return false;
});
</script>