<!doctype html>
<html lang="en">
@include('admin.layout.head')
<body>

<div class="wrapper">
@include('admin.layout.sidebar')
 <div class="main-panel">
@include('admin.layout.navbar')



@yield('content')


@include('admin.layout.footer')

    </div>
</div>


</body>

<!--   Core JS Files   -->
<script src="/assets/js/jquery-1.10.2.js" type="text/javascript"></script>
<script src="/assets/js/bootstrap.min.js" type="text/javascript"></script>

<!--  Checkbox, Radio & Switch Plugins -->
<script src="/assets/js/bootstrap-checkbox-radio-switch.js"></script>

<!--  Charts Plugin -->
<script src="/assets/js/chartist.min.js"></script>

<!--  Notifications Plugin    -->
<script src="/assets/js/bootstrap-notify.js"></script>

<!--  Google Maps Plugin    -->

<!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
<script src="/assets/js/light-bootstrap-dashboard.js"></script>

<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->


<script type="text/javascript">
    // $(document).ready(function(){
    //
    //     demo.initChartist();
    //
    //     $.notify({
    //         icon: 'pe-7s-gift',
    //         message: "به صفحه نور بوت استرپ خوش آمدید - هدیه زیبا برای هر توسعه دهنده وب است."
    //
    //     },{
    //         type: 'info',
    //         timer: 4000,
    //         placement: {
    //             from: 'top',
    //             align: 'left'
    //         }
    //     });
    //
    // });
</script>
<script type="text/javascript">
    // $(document).ready(function(){
    //
    //     demo.initChartist();
    //
    //     $.notify({
    //         message: "به صفحه نور بوت استرپ خوش آمدید - هدیه زیبا برای هر توسعه دهنده وب است."
    //
    //     },{
    //         type: 'info',
    //         timer: 4000,
    //         placement: {
    //             from: 'top',
    //             align: 'left'
    //         }
    //     });
    //
    // });
</script>
</html>
