<div class="main_container">
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="clearfix"></div>
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
                        <h2>Product List</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <a type="submit" class="btn btn-primary" href="<?php echo site_url('admin/product')?>">Add new product</a>
                        </ul>
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
                        <table id="datatable" class="table table-striped table-bordered">
                            <thead>
                                <tr>
                                <th>Product id</th>
                                <th>category id</th>
                                <th>Product name</th>
                                <th>Description</th>
                                <th>Price</th>
                                <th>priview</th>
                                <th>Status</th>
                                <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($products)
                                { 
                            ?>
                                <?php foreach($products as $row):?>
                                <tr>
                                    <td><?php echo $row->product_id ?></td>
                                    <td><?php echo $row->category_id ?></td>
                                    <td><?php echo $row->product_name ?></td>
                                    <td><?php echo $row->description ?></td>
                                    <td><?php echo $row->product_price ?></td>
                                    <td><img src="<?php echo $row->product_img != null ? base_url('assets/images/products').'/'.$row->product_img : base_url('assets/images/products/default.jpg') ?>" height="80px" width="80px"/></td>
                                    <td>
                                <?php 
                                    if($row->visible == 1){
                                        echo 'visible';
                                    }else{
                                        echo 'Not visible';
                                    }
                                ?>
                                    </td>
                                    <td><a class="fa fa-pencil-square-o fa-2x" href="<?php echo site_url('admin/product').'/'. $row->slug ?>"></a>&nbsp;&nbsp;<a class="fa fa-trash fa-2x" onclick="return confirm('Are you sure you want to delete \'<?php echo $row->product_name ?> \'?');" href="<?php echo site_url('admin_products/delete_product'). '/' . $row->product_id ?>"></a></td>
                                </tr>
                              <?php endforeach ?> 
                            <?php
                                }
                                else
                                {
                                  echo '<tr><td colspan="8"><span class="text-info">Sorry no products available for this category.</span></td></tr>';
                                } 
                            ?>               
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
    </div>
</div>