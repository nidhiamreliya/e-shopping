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
                        'name'      => 'edit_category',
                        'id'        => 'edit_category',
                        'class'     => "form-horizontal form-label-left",
                        'onsubmit'  => 'return edit_categorys()'
                      );
                ?> 
                <?php echo form_open('admin_categorys/insert_category', $data);?>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <input type="text" id="category_name" name="category_name"  class="form-control col-md-7 col-xs-12" value="<?php echo isset($category['category_name']) ? $category['category_name'] : set_value('first_name') ?>">
                    
                    <input type="hidden" id="category_id" name="category_id" required="required" class="form-control col-md-7 col-xs-12" value="<?php echo $category['category_id'] ?>">
                    <label class="col-md-8 text-danger">
                      <?php echo form_error('category_name'); ?>
                    </label>
                  </div>
                </div>

                <div class="form-group">
                  <label class="control-label col-md-3 col-sm-3 col-xs-12">Visible <span class="required">*</span>
                  </label>
                  <div class="col-md-6 col-sm-6 col-xs-12">
                    <div id="status" class="btn-group" data-toggle="buttons">
                      <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="visible" <?php echo isset($category['status']) && $category['status'] == 1 ? 'checked': ''?> value="1"> &nbsp; Visible &nbsp;
                      </label>
                      <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                        <input type="radio" name="visible" <?php echo isset($category['status']) && $category['status'] == 0 ? 'checked' : ''?> value="0"> Not visible
                      </label>
                      <label class="col-md-8 text-danger">
                        <?php echo form_error('visible'); ?>
                      </label>
                    </div>
                  </div>
                </div>

                <div class="ln_solid"></div>
                <div class="form-group">
                  <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                    <button type="submit" class="btn btn-success">Submit</button>
                  </div>
                </div>
              <?php echo form_close();?>
            </div>
            <button type="submit" class="btn btn-primary " onclick="window.location='<?php echo site_url('admin_categorys/index'); ?>'"><i class="fa fa-backward">  Back</i></button>
          </div>
        </div>
      </div>
    