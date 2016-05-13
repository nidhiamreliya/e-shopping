<body class="nav-md">
  <div class="main_container">
    <!-- page content -->
    <div class="right_col" role="main">
      <div class="clearfix"></div>
      <div class="page-title">
        <div class="title_left">
          <h3>Users</h3>
        </div>
      </div>    
      <div class="clearfix"></div>
        <div class="row">
          <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="x_panel">
              <div class="x_title">
                <h2>User List</h2>
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
                    <th>First name</th>
                    <th>last name</th>
                    <th>Email id</th>
                    <th>Contact no.</th>
                    <th>Address</th>
                    <th>City</th>
                    <th>Zip code</th>
                    <th>State</th>
                    <th>Country</th>
                    <th>Edit </th>
                    <th>Delete</th>
                  </tr>
                </thead>
                <tbody>
                <?php
                  if($users)
                  {
                ?>
                  <?php foreach($users as $row):?>
                    <tr>
                      <td><?php echo $row->first_name ?></td>
                      <td><?php echo $row->last_name  ?></td>
                      <td><?php echo $row->email_id   ?></td>
                      <td><?php echo $row->contact_no ?></td>
                      <td><?php echo $row->address    ?></td>
                      <td><?php echo $row->city       ?></td>
                      <td><?php echo $row->zip_code   ?></td>
                      <td><?php echo $row->state      ?></td>
                      <td><?php echo $row->country    ?></td>
                      <td><a class="fa fa-pencil-square-o fa-2x" href="<?php echo site_url('user/edit').'/'. $row->slug ?>"></a></td>
                      <td><a class="fa fa-trash fa-2x" onclick="return confirm('Are you sure you want to delete \'<?php echo $row->first_name ?> \'?');" href="<?php echo site_url('admin_users/delete_user').'/'.$row->user_id ?>"></a></td>
                    </tr>
                  <?php endforeach ?> 
                <?php
                  }
                  else
                  {
                    echo '<tr><td colspan="11"><span class="text-info">Sorry no orders available.</span></td></tr>';
                  }
                ?>                    
                </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
    </div>
  </div>
</body>
       <!-- Datatables -->
        <!-- <script src="js/datatables/js/jquery.dataTables.js"></script>
        <script src="js/datatables/tools/js/dataTables.tableTools.js"></script> -->

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
