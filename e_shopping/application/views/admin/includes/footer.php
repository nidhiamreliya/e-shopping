        <!-- footer content -->
        <footer>
          <div class="pull-right">
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
      <!-- /page content -->
    </div>

  </div>

  <div id="custom_notifications" class="custom-notifications dsp_none">
    <ul class="list-unstyled notifications clearfix" data-tabbed_notifications="notif-group">
    </ul>
    <div class="clearfix"></div>
    <div id="notif-group" class="tabbed_notifications"></div>
  </div>
 
  <script src="<?php echo base_url("assets/js/bootstrap.min.js") ?>"></script>

  <!-- gauge js -->
  <script type="text/javascript" src="<?php echo base_url("assets/js/gauge/gauge.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/gauge/gauge_demo.js") ?>"></script>
  <!-- bootstrap progress js -->
  <script src="<?php echo base_url("assets/js/progressbar/bootstrap-progressbar.min.js") ?>"></script>
  <!-- icheck -->
  <script src="<?php echo base_url("assets/js/icheck/icheck.min.js") ?>"></script>
  <!-- daterangepicker -->
  <script type="text/javascript" src="<?php echo base_url("assets/js/moment/moment.min.js") ?>"></script>
  <script type="text/javascript" src="<?php echo base_url("assets/js/datepicker/daterangepicker.js") ?>"></script>
  <!-- chart js -->
  <script src="<?php echo base_url("assets/js/chartjs/chart.min.js") ?>"></script>

  <script src="<?php echo base_url("assets/js/custom.js") ?>"></script>
 <!-- /footer content -->

 <!-- Datatables-->
  <script src="<?php echo base_url("assets/js/datatables/jquery.dataTables.min.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/datatables/dataTables.bootstrap.js") ?>"></script>
  <script src="<?php echo base_url("assets/js/datatables/dataTables.fixedHeader.min.js") ?>"> </script>
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
</html>
