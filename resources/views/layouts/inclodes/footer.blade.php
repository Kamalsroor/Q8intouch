</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->

<!-- jQuery -->
<script src="{{ asset('AdminLTE/plugins/jquery/jquery.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('AdminLTE/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('AdminLTE/dist/js/adminlte.min.js')}}"></script>
<!-- DataTables -->
<script src="https://cdn.datatables.net/1.10.23/js/jquery.dataTables.min.js"></script>
<!-- Bootstrap JavaScript -->
<script src="https://cdn.datatables.net/1.10.23/js/dataTables.uikit.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="{{ asset('js/jquery.growl.js')}}" type="text/javascript"></script>
<script src="{{ asset('js/coustom.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function() {
        $('.select2').select2();
    });
</script>
@yield('script')
@stack('scripts')


</body>
</html>
