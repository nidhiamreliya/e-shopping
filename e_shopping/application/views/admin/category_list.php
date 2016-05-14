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
                            <h2>Category List</h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <a type="submit" class="btn btn-primary" href="<?php echo site_url('category')?>">Add new Category</a>
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
                                        <th>Id </th>
                                        <th>Name</th>
                                        <th>Products</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php foreach($category as $row):?>
                                    <tr>
                                        <td><?php echo $row->category_id ?>   </td>
                                        <td><?php echo $row->category_name ?> </td>
                                        <td><a href="<?php echo site_url('products').'/'.$row->slug ?>">View products</a></td>
                                        <td><?php echo $row->status == 1 ? 'Visible' : 'Not Visible' ?> </td>
                                        <td><a class="fa fa-pencil-square-o fa-2x" href="<?php echo site_url('category/edit').'/'. $row->slug ?>"></a>&nbsp&nbsp
                                            <a class="fa fa-trash fa-2x" onclick="return confirm('Are you sure you want to delete \'<?php echo $row->category_name ?> \'?');" href="<?php echo site_url('admin_categorys/delete_category'). '/' . $row->slug?>"></a></td>
                                    </tr>
                                <?php endforeach ?>                     
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        <!-- /page content -->
        </div> 
    </div>
</body>