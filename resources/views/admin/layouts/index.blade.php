@include('admin/layouts/header')

        <!-- Page Content -->
         @yield('content')
          
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->

    <!-- jQuery -->
    <script src="admin_asset/bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="admin_asset/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="admin_asset/bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="admin_asset/dist/js/sb-admin-2.js"></script>
    <script type="text/javascript" language="javascript" src="admin_asset/ckeditor/ckeditor.js" ></script>

    <!-- DataTables JavaScript -->
   
<script>
    $(document).ready(function(){
        setTimeout(function(){
        $('.message').hide('slow');
        $('.alert-danger').remove();
    },3000)

    //$('.message').html('Thanh cong').fadeIn().delay(3000).fadeOut('slow');
 
  })
</script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    @yield('js')
</body>

</html>
