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
              <h2>Add new Category</h2>
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
              <br />
                <?php
                  $data = array(
                        'name'  => 'edit_category',
                        'id' => 'edit_category',
                        'class' => "form-horizontal form-label-left"
                      );
                ?> 
                <?php echo form_open('admin_categorys/insert_category', $data);?>
                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="category_name" name="category_name" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $category['category_name'] ?>">
                    <input type="hidden" id="category_id" name="category_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $category['category_id'] ?>">
                    <label class="col-md-8 has-error error_class">
                      <?php echo form_error('category_name'); ?>
                    </label>
                  </div>
                </div>
                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary" onclick="window.location='<?php echo base_url('index.php/admin_categorys') ?>'">Cancel</button>
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              <?php echo form_close();?>
            </div>
          </div>
        </div>
      </div>
    