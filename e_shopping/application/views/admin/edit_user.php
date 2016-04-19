<body class="nav-md">
<div class="main_container">
<!-- page content -->
    <div class="right_col" role="main">
      <div class="clearfix"></div>
      <div class="page-title">
        <div class="title_left">
          <h3>Categorys</h3>
        </div>
      </div>
      <div class="clearfix"></div>
<div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>Edit User</h2>
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
              <br />
               <?php
                $data = array(
                      'name'  => 'edit_user',
                      'id' => 'edit_user',
                      'class' => "form-horizontal form-label-left"
                    );
              ?> 
              <?php echo form_open('admin_users/insert_user', $data);?>
                <div class="col-md-9 col-sm-9 col-xs-12">
                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">First name <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="hidden" id="user_id" name="user_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['user_id'] ?>">
                      <input type="text" id="first_name" name="first_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['first_name'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('first_name'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Last name <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="last_name" name="last_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['last_name'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('last_name'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">E-mail <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="email_id" name="email_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['email_id'] ?>" >
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('email_id'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Contect no. <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="number" id="contect_no" name="contect_no" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['contect_no'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('contect_no'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Address <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="address"  name="address" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['address'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('address'); ?>
                      </label>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">City <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="city" name ="city" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['city'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('city'); ?>
                      </label>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Zip code <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="zip_code" name="zip_code" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['zip_code'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('zip_code'); ?>
                      </label>
                    </div>
                  </div>

                  <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">State <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="state" name="state" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['state'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('state'); ?>
                      </label>
                    </div>
                  </div>

                   <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Country <span class="required">*</span>
                    </label>
                    <div class="col-md-7 col-sm-7 col-xs-12">
                      <input type="text" id="country" name="country" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $user['country'] ?>">
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('country'); ?>
                      </label>
                    </div>
                  </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-7 col-sm-7 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              </div>
              <?php echo form_close();?>
              <button type="submit" class="btn btn-primary " onclick="window.location='<?php echo base_url('index.php/admin_users') ?>'"><i class="fa fa-backward">  Back</i></button>
            </div>                  
          </div>
        </div>
      </div>