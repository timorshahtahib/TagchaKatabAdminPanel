<!DOCTYPE html>
<html>

@include('layout.head')

<body>

{{--<div class="hero_area">--}}
    <!-- header section strats -->
   @include('layout.heder')


{{--</div>--}}


<!-- catagory section -->
@yield('main_content')
<!-- info section -->

@include('layout.footer')
<!-- footer section -->

<!-- jQery -->
<script src="js/jquery-3.4.1.min.js"></script>
<!-- bootstrap js -->
<script src="js/bootstrap.js"></script>
<!-- custom js -->
<script src="js/custom.js"></script>
<!-- Google Map -->
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCh39n5U-4IoWpsVGUHWdqB6puEkhRLdmI&callback=myMap">
</script>
<!-- End Google Map -->

</body>

</html>
