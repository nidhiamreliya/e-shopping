<div class="main_container">
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="clearfix"></div>
        <div class="page-title">
            <div class="title_left">
                <h3>Orders</h3>
            </div>
        </div>    
        <div class="clearfix"></div>
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Order List</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <table id="datatable" class="table table-striped table-bordered responsive-utilities">
                            <thead>
                                <tr>
                                    <th>Order No</th>
                                    <th>User id</th>
                                    <th>Order date</th>
                                    <th>Shipping address</th>
                                    <th>Amount</th>
                                    <th>Delivery date</th>
                                    <th>Status</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php
                                if($orders)
                                {
                            ?>
                                    <?php foreach($orders as $row):?>
                                    <td><?php echo $row->order_no ?></td>
                                    <td><?php echo $row->user_id ?></td>
                                    <td><?php echo $row->order_date ?></td>
                                    <td><?php echo $row->shipping_address ?></td>
                                    <td><?php echo $row->amount ?></td>
                                    <td><?php echo $row->delivery_date ?></td>
                                    <td><?php echo $row->status ?></td>
                                    <td><a href="<?php echo site_url('order_details').'/'.$row->order_no ?>"><i class="fa fa-eye fa-2x" aria-hidden="true"></i></a></td>
                                    </tr>
                                    <?php endforeach ?>
                            <?php
                                } else {
                                    echo '<tr><td colspan="8"><span class="text-info">Sorry no orders available.</span></td></tr>';
                                } 
                            ?>                         
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- /page content -->
        <div class="clearfix"></div>
    </div>
</div>
</body>