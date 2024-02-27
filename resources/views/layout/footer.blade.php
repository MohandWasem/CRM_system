<footer class="footer">
<div class="container-fluid d-flex justify-content-between">
<span class="text-muted d-block text-center text-sm-start d-sm-inline-block">Copyright © bootstrapdash.com 2024</span>
</div>
</footer>
<!-- partial -->
</div>
<!-- main-panel ends -->
</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->
<!-- plugins:js -->
<script src="{{asset('admin/vendors/js/vendor.bundle.base.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('admin/js/off-canvas.js')}}"></script>
<script src="{{asset('admin/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('admin/js/misc.js')}}"></script>
<script src="{{asset('admin/js/file-upload.js')}}"></script>

 <!-- DataTable -->
 <script src="https://code.jquery.com/jquery-3.7.1.js"></script>
   <!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script> -->
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js"></script>
    <script src="https://cdn.datatables.net/2.0.0/js/dataTables.bootstrap5.js"></script>
    <script>
      new DataTable('#example');

    </script>
<!-- endinject -->
<!-- Custom js for this page -->
<!-- End custom js for this page -->
@stack('scripts')
</body>
</html>