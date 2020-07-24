
</div>

<a href="#" class="scroll-to-top"><i class="fa fa-angle-double-up"></i></a>
</div>
</div>
<script src="../assets/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../assets/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../assets/javascripts/template-script.min.js"></script>
<script src="../assets/javascripts/template-init.min.js"></script>
<script src="../assets/vendor/toastr/toastr.min.js"></script>
<!--morris chart-->
<script src="../assets/vendor/chart-js/chart.min.js"></script>
<!--Gallery with Magnific popup-->
<script src="../assets/vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
<!--Examples-->
<script src="../assets/vendor/data-table/media/js/jquery.dataTables.min.js"></script>
<script src="../assets/vendor/data-table/media/js/dataTables.bootstrap.min.js"></script>
<!--Examples-->
<script src="../assets/javascripts/examples/tables/data-tables.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="../assets/javascripts/examples/dashboard.js"></script>
  <script>  
     $(document).on("click", "#delete", function(e){
         e.preventDefault();
         var link = $(this).attr("href");
         swal({
          title: "Are you Want to delete?",
          text: "Once Delete, This will be Permanently Delete!",
          icon: "warning",
          buttons: true,
          dangerMode: true,
      })
         .then((willDelete) => {
          if (willDelete) {
           window.location.href = link;
       } else {
        swal("Safe Data!");
    }
});
     });
 </script>

     <script>
        @if(Session::has('messege'))
        var type="{{Session::get('alert-type','info')}}"
        switch(type){
          case 'info':
          toastr.info("{{ Session::get('messege') }}");
          break;
          case 'success':
          toastr.success("{{ Session::get('messege') }}");
          break;
          case 'warning':
          toastr.warning("{{ Session::get('messege') }}");
          break;
          case 'error':
          toastr.error("{{ Session::get('messege') }}");
          break;
      }
      @endif
  </script> 
</body>
</html>