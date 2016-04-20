<body style="background:#F7F7F7;">

  <div class="">
    <a class="hiddenanchor" id="toregister"></a>
    <a class="hiddenanchor" id="tologin"></a>

    <div id="wrapper">
      <div id="login" class="animate form">
        <section class="login_content">
          <?php
            $data = array(
                  'name'  => 'login',
                  'id' => 'login',
                );
          ?> 
          <?php echo form_open('user_control/check_user', $data);?>
            <h1>Login Form</h1>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <input type="text" id="email_id" name="email_id" style="margin: 0px;" class="form-control" required="" placeholder="Username" value="<?php echo set_value('email_id')?>"/>
              <label class="text-danger">
                <?php echo form_error('email_id'); ?>
              </label>
            </div>
            <div class="form-group col-md-12 col-sm-12 col-xs-12">
              <input type="password" id="password" name="password" style="margin: 0px;" class="form-control" placeholder="Password" required="" />
              <label class="text-danger">
                <?php echo form_error('password'); 
                  if(isset($err_message))
                  {
                    echo $err_message;
                  }
                ?>
              </label>
            </div>
            <div class="div-col-4">
              <button type="submit" class="btn btn-default submit">Log in</button>
            </div>
            <div class="clearfix"></div>
            <div class="separator">

              <p class="change_link">New to site?
                <a href="<?php echo site_url('user_control/registration')?>" class="to_register"> Create Account </a>
              </p>
              <div class="clearfix"></div>
              <br />
              <div>
                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> Shopping hub!</h1>              </div>
            </div>
          <?php echo form_close();?>
          <!-- form -->
        </section>
        <!-- content -->
      </div>
    </div>
  </div>

</body>
