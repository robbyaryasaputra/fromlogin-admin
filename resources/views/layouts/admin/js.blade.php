<script src="{{ asset('/assets-admin/js/core/popper.min.js') }}"></script>
<script src="{{ asset('/assets-admin/js/core/bootstrap.min.js') }}"></script>
<script src="{{ asset('/assets-admin/js/plugins/perfect-scrollbar.min.js') }}"></script>
<script src="{{ asset('/assets-admin/js/plugins/smooth-scrollbar.min.js') }}"></script>
<script src="{{ asset('/assets-admin/js/plugins/chartjs.min.js') }}"></script>
<script>
  // Example chart init moved to partial; keep existing chart code here as needed
</script>
<script>
  var win = navigator.platform.indexOf('Win') > -1;
  if (win && document.querySelector('#sidenav-scrollbar')) {
    var options = { damping: '0.5' }
    Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
  }
</script>
<script async defer src="https://buttons.github.io/buttons.js"></script>
<script src="{{ asset('/assets-admin/js/material-dashboard.min.js?v=3.0.0') }}"></script>
