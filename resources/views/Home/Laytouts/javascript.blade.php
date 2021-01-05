<script src="{{ asset('Site/js/jquery-3.3.1.slim.min.js') }}"></script>
<!-- jQuery Mask -->
<script src="{{ asset('AdminLTE/bower_components/jquery/dist/jquery.mask.min.js') }}"></script>
<script>window.jQuery || document.write('<script src="{{ asset('Site/js/jquery-slim.min.js') }}"><\/script>')</script>
<script src="{{ asset('Site/js/popper.min.js') }}"></script>
<script src="{{ asset('Site/js/bootstrap.min.js') }}"></script>

<script src="{{asset('AdminLTE/bower_components/validacoes/validacoes.js')}}"></script>

<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.min.js')}}"></script>
<script src="{{asset('AdminLTE/bower_components/bootstrap-datepicker-1.9.0-dist/js/bootstrap-datepicker.pt-BR.min.js')}}"></script>


<script type="text/javascript">
    $('#nasc_cliente').datepicker({
        format: 'dd/mm/yyyy',
        language: 'pt-BR',
    });
</script>
