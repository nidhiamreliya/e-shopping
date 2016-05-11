<body class="nav-md">
  <div class="main_container">
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="clearfix"></div>
      
      <div class="page-title">
        <div class="title_left">
          <h3>Password</h3>
        </div>
      </div>    

      <div class="clearfix"></div>
      <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Change Password</h2>
              <div class="clearfix"></div>
            </div>
            <div class="x_content">
              <span class="text-success col-md-offset-2">
                <?php
                  if($this->session->flashdata('successful'))
                  {
                    echo $this->session->flashdata('successful');
                  }
                ?>
              </span>
              <br/>
              <?php
                  $data = array(
                        'name'  => 'edit_password',
                        'id' => 'edit_password',
                        'class' => "form-horizontal form-label-left"
                      );
                ?> 
                <?php echo form_open('admin_control/edit_password', $data);?>
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Old password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="old_password" value="<?php echo set_value('old_password') ?>" name="old_password" required="required" class="form-control col-md-7 col-xs-12">
                      <label class="text-danger">
                      <?php echo form_error('old_password'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">New password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="password" name="password" value="<?php echo set_value('password') ?>" required="required" class="form-control col-md-7 col-xs-12">
                      <label class="text-danger">
                      <?php echo form_error('password'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Confirm password <span class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                      <input type="password" id="confirm_password" name="confirm_password" required="required" class="form-control col-md-7 col-xs-12">
                      <label class="text-danger">
                      <?php echo form_error('confirm_password'); ?>
                      </label>
                    </div>
                  </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              <?php echo form_close() ?>
            </div>                  
          </div>
        </div>
      </div>
    </div>
  </div>
</body>