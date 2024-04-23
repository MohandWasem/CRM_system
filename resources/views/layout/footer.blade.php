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

<script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
<script src="https://js.pusher.com/8.2.0/pusher.min.js"></script>
<script>
        Pusher.logToConsole = true;

  var pusher = new Pusher('ffd926d1e0bb9fdcc5ae', {
      cluster: 'eu'
    });

  
  var channel = pusher.subscribe('channel-replay');
// Bind a function to a Event (the full Laravel class)
  channel.bind('App\\Events\\ReplayEvent', function (data) {
    if (data && data.request_id && data.price && data.free_time) {
        toastr.success('New Post Created', 'user: ' + data.request_id + '<br>Title: ' + data.request_id, {
          timeOut: 0,  
          extendedTimeOut: 0,
         
          
        });
      } else {
        console.error('Invalid data structure received:', data);
      }
   
  });
</script>
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