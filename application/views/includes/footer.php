
<!-- /.content-wrapper -->
<footer class="main-footer">
  <strong>Copyright &copy; 2018-<?php echo date('Y'); ?> <a href="https://omar-faruqe.com/" target="_blank">Omar Faruqe</a>.</strong>
  All rights reserved.
  <div class="float-right d-none d-sm-inline-block">
	<b>Version</b> 2.1.0
  </div>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
  <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->


<!-- jQuery -->

<!-- jQuery UI 1.11.4 -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script  src="<?php echo base_url() ?>assets/plugins/fontawesome-free/js/font-awesome.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- ChartJS -->
<script src="<?php echo base_url() ?>assets/plugins/chart.js/Chart.min.js"></script>
<!-- Summernote -->
<script src="<?php echo base_url() ?>assets/plugins/summernote/summernote-bs4.min.js"></script>
<!-- overlayScrollbars -->
<script src="<?php echo base_url() ?>assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() ?>assets/dist/js/adminlte.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() ?>assets/dist/js/demo.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>
<!-- Toastr -->
<script src="<?php echo base_url() ?>assets/plugins/toastr/toastr.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?php echo base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Ekko Lightbox -->
<script src="<?php echo base_url() ?>assets/plugins/ekko-lightbox/ekko-lightbox.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js"></script>

<script src="<?php echo base_url() ?>assets/plugins/daterangepicker/daterangepicker.js"></script>



<!-- jQuery Mapael -->
<script src="<?php echo base_url() ?>assets/plugins/jquery-mousewheel/jquery.mousewheel.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/raphael/raphael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/jquery.mapael.min.js"></script>
<script src="<?php echo base_url() ?>assets/plugins/jquery-mapael/maps/usa_states.min.js"></script>
<script src="<?php echo base_url() ?>assets/dist/js/pages/dashboard.js"></script>


<script type="text/javascript">
$(function () {
    //Initialize Select2 Elements
    $('.select2').select2();
    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    });
    /*
    $("#datatable").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#datatable_wrapper .col-md-6:eq(0)');
    */
   $("#datatable").DataTable({
      dom:"<'row'<'col-sm-4'l><'col-sm-4 text-center'B><'col-sm-4'f>>tp",
      //dom: 'C<"clear">lfrtip',

      responsive: {
          details: {
              display: $.fn.dataTable.Responsive.display.modal( {
                  header: function ( row ) {
                      var data = row.data();
                      return 'Details for '+data[1];
                  }
              } ),
              renderer: $.fn.dataTable.Responsive.renderer.tableAll( {
                  tableClass: 'table'
              } )
          }
      },

      buttons:[
      {
          extend: "csv", className: "btn btn-sm btn-info",footer: true,
           exportOptions: {columns: ':not(:last-child)',}
      }
      , {
          extend: "excel",  className: "btn btn-sm btn-info", footer: true,
           exportOptions: {columns: ':not(:last-child)',}
      }
      , {
          extend: "pdf",  className: "btn btn-sm btn-info",title: "",
          //orientation: 'landscape',
          pageSize: 'A4',
          header: true,
          footer: true,
          customize: function ( doc ) {
              doc.defaultStyle.fontSize = 12;
              doc.styles.tableHeader.fontSize = 13;
              doc.pageMargins = [10,30,10,30];
              doc.defaultStyle.alignment = 'center';

              //border styling
              var objLayout = {};
              objLayout['hLineWidth'] = function(i) { return .5; };
              objLayout['vLineWidth'] = function(i) { return .5; };
              objLayout['hLineColor'] = function(i) { return '#2d4154'; };
              objLayout['vLineColor'] = function(i) { return '#2d4154'; };
              objLayout['paddingLeft'] = function(i) { return 4; };
              objLayout['paddingRight'] = function(i) { return 4; };
              doc.content[0].layout = objLayout;
          },
          exportOptions: {columns: ':not(:last-child)',}

      }
      , {
          extend: "print", className: "btn btn-sm btn-info", title: "", footer: true,
          exportOptions: {columns: ':not(:last-child)',}
        },
      ]

    });

    $("input[data-bootstrap-switch]").each(function(){
      $(this).bootstrapSwitch('state', $(this).prop('checked'));
    });


    $(function(){
      <?php echo $this->session->flashdata('notification'); ?>
    });

})
</script>

<script>
  $(document).ready(function(){
    var target = $('body').data('menu'),
    subMenu = $('body').data('submenu');

    $('#'+target).addClass('menu-open');
    $('#'+target+' a').eq(0).addClass('active');

    $('#'+subMenu).addClass('active');

  });



</script>

</body>
</html>
