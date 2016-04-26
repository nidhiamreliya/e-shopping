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
                  <h2>Order No.- <?php echo $order_no ?> <small>basic table subtitle</small></h2>
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
                      </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($order_details as $row): ?>
                      <tr>
                        <th><?php echo $row['product_id'] ?></th>
                        <td><?php echo $row['product_name'] ?></td>
                        <td><?php echo $row['qty'] ?></td>
                        <td><?php echo $row['product_price'] ?></td>
                      </tr>
                    <?php endforeach ?>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
  </body>