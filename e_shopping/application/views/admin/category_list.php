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
                <a type="submit" class="btn btn-primary" href="<?php echo base_url('index.php/admin_categorys/edit_category')?>">Add new Category</a>
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
                    <th>Id</th>
                    <th>Name</th>
                    <th>Products</th>
                    <th>Edit</th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php foreach($category as $row):?>
                  <tr>
                    <td><?php echo $row->category_id ?></td>
                    <td><?php echo $row->category_name ?></td>
                    <td><a href="<?php echo site_url('admin_products/index').'/'.$row->category_id ?>">View products</a></td>
                    
                    <td><a class="fa fa-pencil-square-o fa-2x" href="<?php echo site_url('admin_categorys/edit_category').'/'. $row->category_id ?>"></a></td>
                    
                    <td><a class="fa fa-trash fa-2x" onclick="return confirm('Are you sure you want to delete \'<?php echo $row->category_name ?> \'?');" href="<?php echo site_url('admin_categorys/delete_category'). '/' . $row->category_id?>"></a></td>
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
       
        <!-- Datatables-->
        <script src="<?php echo base_url("assets/js/datatables/jquery.dataTables.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.bootstrap.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.buttons.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/buttons.bootstrap.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/jszip.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/pdfmake.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/vfs_fonts.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/buttons.html5.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/buttons.print.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.fixedHeader.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.keyTable.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.responsive.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/responsive.bootstrap.min.js") ?>"></script>
        <script src="<?php echo base_url("assets/js/datatables/dataTables.scroller.min.js") ?>"></script>

        <!-- pace -->
        <script src="<?php echo base_url("assets/js/pace/pace.min.js") ?>"></script>
        <script>
          var handleDataTableButtons = function() {
              "use strict";
              0 !== $("#datatable-buttons").length && $("#datatable-buttons").DataTable({
                dom: "Bfrtip",
                buttons: [{
                  extend: "copy",
                  className: "btn-sm"
                }, {
                  extend: "csv",
                  className: "btn-sm"
                }, {
                  extend: "excel",
                  className: "btn-sm"
                }, {
                  extend: "pdf",
                  className: "btn-sm"
                }, {
                  extend: "print",
                  className: "btn-sm"
                }],
                responsive: !0
              })
            },
            TableManageButtons = function() {
              "use strict";
              return {
                init: function() {
                  handleDataTableButtons()
                }
              }
            }();
        </script>
        <script type="text/javascript">
          $(document).ready(function() {
            $('#datatable').dataTable();
            $('#datatable-keytable').DataTable({
              keys: true
            });
            $('#datatable-responsive').DataTable();
            $('#datatable-scroller').DataTable({
              ajax: "js/datatables/json/scroller-demo.json",
              deferRender: true,
              scrollY: 380,
              scrollCollapse: true,
              scroller: true
            });
            var table = $('#datatable-fixed-header').DataTable({
              fixedHeader: true
            });
          });
          TableManageButtons.init();
        </script>
</body>

</html>
