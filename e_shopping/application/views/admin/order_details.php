<body class="nav-md">
<div class="right_col" role="main">
        <div class="">

          <div class="page-title">
            <div class="title_left">
              <h3>
                Order Details
              </h3>
            </div>
          </div>
          <div class="clearfix"></div>


          <div class="row">

            <div class="col-md-12 col-sm-12 col-xs-12">
              <div class="x_panel">
                <div class="x_title">
                  <h2>Order No.- <?php echo $order_no ?></h2>
                  <div class="clearfix"></div>
                </div>
                <div class="x_content">
                  <table class="table">
                    <thead>
                      <tr>
                        <th>Product id</th>
                        <th>Product Name</th>
                        <th>Quantity</th>
                        <th>product price</th>
                        <th>Sub total</th>
                      </tr>
                    </thead>
                    <tbody>
                    <?php  
                      $total=0;  
                      if(!$order_details)
                      {
                        echo "Sorry no data available for given order no.";
                      }else{
                    ?>
                      <?php foreach ($order_details as $row): ?>
                        <tr>
                          <td><?php echo $row->product_id ?></td>
                          <td><?php echo $row->product_name ?></td>
                          <td><?php echo $row->quantity ?></td>
                          <td><?php echo $row->product_price ?></td>
                          <td><?php echo $sub_total = $row->quantity * $row->product_price; ?></td>
                          <?php $total += $sub_total ?>
                        </tr>
                      <?php endforeach ?>
                    <?php
                      }
                    ?>
                    </tbody>
                    <tr>
                      <th colspan="4" class="text-right">Total:</th>
                      <th><?php echo $total ?></th>
                    </tr>
                  </table>
                <a class="btn btn-success" href="<?php echo site_url('admin_orders/mark_as') .'/delivered/'. $order_no ?>">Mark as delivered</a>
                <a class="btn btn-danger" href="<?php echo site_url('admin_orders/mark_as') .'/canceled/'. $order_no ?>">Mark as canceled</a>
                </div>
                <button type="submit" class="btn btn-primary " onclick="window.location='<?php echo site_url('orders'); ?>'"><i class="fa fa-backward">  Back</i></button>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>