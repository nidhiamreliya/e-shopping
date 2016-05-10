<body style="background:#F7F7F7;">
<!-- login-page -->
<div class="login">
  <div class="container">
    <div class="login-grids">
      <div class="col-md-6 log">
           <h3>Login</h3>
           <div class="strip"></div>
           <p>Welcome, please enter the following to continue.</p>
           <p>If you have previously Register with us,
          <?php
            $data = array(
                  'name'  => 'login',
                  'id' => 'login',
                );
          ?> 
          <?php echo form_open('user_control/check_user', $data);?>
             <h5>User Name:</h5>  
             <input type="text" id="email_id" name="email_id" style="margin: 0px;" class="form-control"  placeholder="E-mail@example.com" value="<?php echo set_value('email_id')?>"/>
              <label class="text-danger">
                <?php echo form_error('email_id'); ?>
              </label> 
             <h5>Password:</h5>
             <input type="password" id="password" name="password" style="margin: 0px;" class="form-control" placeholder="Password"  />
              <label class="text-danger">
                <?php echo form_error('password'); ?>
              </label> 
              <label class="text-danger">
              <?php
                  if(isset($err_message))
                  {
                    echo $err_message;
                  }
                ?>
              </label>     
              <br/>
                
             <input type="submit" value="Login">
              
           <?php echo form_close();?>
      </div>
      <div class="col-md-6 login-right">
          <h3>New Registration</h3>
          <div class="strip"></div>
          <p>By creating an account with our store, you will be able to move through the checkout process faster, store multiple shipping addresses, view and track your orders in your account and more.</p>
          <a href="<?php echo site_url('user_control/registration')?>" class="button">Create An Account</a>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>
<!-- //login-page -->
