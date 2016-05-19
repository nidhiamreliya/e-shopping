<body class="nav-md">
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Products</h3>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>Edit product</h2>
                            <div class="clearfix"></div>
                        </div>
                        <span class="text-success col-md-offset-2">
                            <?php
                                if($this->session->flashdata('successful'))
                                {
                                    echo $this->session->flashdata('successful');
                                }
                            ?>
                        </span>
                        <span class="text-info col-md-offset-2">
                            <?php
                                if($this->session->flashdata('info'))
                                {
                                    echo $this->session->flashdata('info');
                                }
                            ?>
                        </span>
                        <div class="x_content">
                            <br/>
                            <div class="col-md-8 col-sm-8 col-xs-12">
                                <?php
                                    $data = array(
                                        'name'     => 'insert_product',
                                        'id'       => 'insert_product',
                                        'class'    => "form-horizontal form-label-left",
                                        //'onsubmit' => 'return edit_products()'
                                    );
                                ?> 
                                <?php echo form_open('admin_products/insert_product', $data);?>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Category Name <span class="required">*</span>
                                        </label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <select id="category_id"  name="category_id" class="form-control" required>
                                            <?php foreach($category as $row):?>
                                                <option <?php echo isset($product['category_id']) && $row->category_id == $product['category_id'] ? 'selected': ''?> value="<?php echo $row->category_id ?>"><?php echo $row->category_name ?></option>
                                            <?php endforeach?>
                                            </select>
                                            <label class="col-md-8 text-danger">
                                                <?php echo form_error('category_id'); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Product Name <span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="hidden" id="product_id" name="product_id"  class="form-control col-md-8 col-xs-12" value="<?php echo $product['product_id'] ?>">
                                            <input type="hidden" id="slug" name="slug"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['slug']) ? $product['slug'] : ''?>">
                                            <input type="text" id="product_name" name="product_name"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['product_name']) ? $product['product_name'] : set_value('product_name') ?>">
                                            <label class="col-md-8 text-danger">
                                            <?php echo form_error('product_name'); ?>
                                            <?php
                                                if($this->session->flashdata('duplicate'))
                                                {
                                                    echo $this->session->flashdata('duplicate');
                                                }
                                            ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Description <span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="description" name="description"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['description']) ? $product['description'] : set_value('description') ?>">
                                            <label class="col-md-8 text-danger">
                                                <?php echo form_error('description'); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Price <span class="required">*</span></label>
                                        <div class="col-md-8 col-sm-8 col-xs-12">
                                            <input type="text" id="price" name="price"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['product_price']) ? $product['product_price'] : set_value('price') ?>">
                                            <label class="col-md-8 text-danger">
                                                <?php echo form_error('price'); ?>
                                            </label>
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="control-label col-md-3 col-sm-3 col-xs-12">Visible <span class="required">*</span></label>
                                        <div class="col-md-6 col-sm-6 col-xs-12">
                                            <label class="btn btn-default" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="visible" id="visible" <?php echo isset($product['visible']) && $product['visible'] == 1 ? 'checked': ''?> value="1"> Visible 
                                            </label>
                                            <label class="btn btn-primary active" data-toggle-class="btn-primary" data-toggle-passive-class="btn-default">
                                                <input type="radio" name="visible" id="visible" <?php echo isset($product['visible']) && $product['visible'] == 0 ? 'checked' :''?> value="0"> Not visible
                                            </label>
                                            <label class="col-md-8 text-danger">
                                                <?php echo form_error('visible'); ?>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="ln_solid"></div>
                                    <div class="form-group">
                                        <div class="col-md-8 col-sm-8 col-xs-12 col-md-offset-3">
                                            <button type="submit" class="btn btn-success">Submit</button>
                                        </div>
                                    </div>
                                <?php echo form_close();?>
                            </div>
                            <?php
                                $data = array(
                                    'name'      => 'product_img',
                                    'id'        => 'product_img',
                                    'class'     => 'form-horizontal form-label-left',
                                    'onsubmit'  => 'return check_pic()'
                                );
                            ?> 
                            <?php echo form_open_multipart('admin_products/product_pic', $data);?>
                                <div class="col-md-3 col-sm-3">
                                    <img height="185" width="220" src="<?php echo isset($product['product_img']) && $product['product_img'] != null ? base_url('assets/images/products').'/'.$product['product_img'] : base_url('assets/images/12.jpg')?>">
                                    <input type="hidden" id="product_id" name="product_id"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['product_id']) ? $product['product_id'] : ''?>">
                                    <input type="hidden" id="slug" name="slug"  class="form-control col-md-8 col-xs-12" value="<?php echo isset($product['slug']) ? $product['slug'] : ''?>">

                                    <input type="file" id="image" name="image"  class="form-control">
                                    <button type="submit" class="btn btn-success btn-block">Upload image</button>
                                    <label class="col-md-12 text-danger">
                                    <?php 
                                        if($this->session->flashdata('error'))
                                        {
                                            $error = $this->session->flashdata('error');
                                            echo $error['error'];
                                        }
                                    ?>
                                    </label>
                                </div>
                            <?php echo form_close();?>
                            <button class="btn btn-primary " onclick="window.location='<?php echo site_url('products'); ?>'"><i class="fa fa-backward">  Back</i></button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</body>