<!-- jQuery 3 -->
<script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.min.js') }}"></script>
<!-- jQuery Mask -->
<script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.mask.min.js') }}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{ asset('AdminLTE/bower_components/bootstrap/dist/js/bootstrap.min.js') }}"></script>
<!-- DataTables -->
<script src="{{ asset('AdminLTE/bower_components/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('AdminLTE/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
<!-- FastClick -->
<script src="{{ asset('AdminLTE/bower_components/fastclick/lib/fastclick.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('AdminLTE/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js') }}"></script>
<!-- jvectormap -->
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
<script src="{{ asset('AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
<!-- Slimscroll -->
<script src="{{ asset('AdminLTE/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('AdminLTE/bower_components/chart.js/Chart.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('AdminLTE/dist/js/demo.js') }}"></script>

<script src="{{asset('AdminLTE/bower_components/sweetalert2/sweetalert2.js')}}"></script>


<script src="{{asset('AdminLTE/bower_components/validacoes/validacoes.js')}}"></script>

<script src="{{asset('AdminLTE/bower_components/moment.min.js')}}"></script>

<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.pt-BR.min.js')}}"></script>


<script type="text/javascript">
    $('#nasc_cliente').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
    });
</script>

<script type="text/javascript">
    $("#datames" ).datepicker({
        startView: 1,
        minViewMode: 1,
        maxViewMode: 3,
        format: "mm-yyyy",
        changeMonth: true,
        changeYear: true,
        language: "pt-BR",
    });
</script>




<!-- page script -->
<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': true,
            'searching'   : true,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : true
        })
    })

</script>


