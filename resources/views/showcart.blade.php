<!DOCTYPE html>
<html lang="en">

<head>
    <base href="/public" />
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@400;500;600;700&display=swap"
        rel="stylesheet">

    <title>Klassy Cafe - Restaurant HTML Template</title>
    <!--

TemplateMo 558 Klassy Cafe

https://templatemo.com/tm-558-klassy-cafe

-->
    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/templatemo-klassy-cafe.css">

    <link rel="stylesheet" href="assets/css/owl-carousel.css">

    <link rel="stylesheet" href="assets/css/lightbox.css">

</head>

<body>

    <!-- ***** Preloader Start ***** -->
    <div id="preloader">
        <div class="jumper">
            <div></div>
            <div></div>
            <div></div>
        </div>
    </div>
    <!-- ***** Preloader End ***** -->


    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img src="assets/images/klassy-logo.png" align="klassy cafe html template">
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li class="scroll-to-section"><a href="#top" class="active">Home</a></li>
                            <li class="scroll-to-section"><a href="#about">About</a></li>

                            <!--
                            <li class="submenu">
                                <a href="javascript:;">Drop Down</a>
                                <ul>
                                    <li><a href="#">Drop Down Page 1</a></li>
                                    <li><a href="#">Drop Down Page 2</a></li>
                                    <li><a href="#">Drop Down Page 3</a></li>
                                </ul>
                            </li>
                        -->
                            <li class="scroll-to-section"><a href="#menu">Menu</a></li>
                            <li class="scroll-to-section"><a href="#chefs">Chefs</a></li>
                            {{-- <li class="submenu">
                                <a href="javascript:;">Features</a>
                                <ul>
                                    <li><a href="#">Features Page 1</a></li>
                                    <li><a href="#">Features Page 2</a></li>
                                    <li><a href="#">Features Page 3</a></li>
                                    <li><a href="#">Features Page 4</a></li>
                                </ul>
                            </li> --}}
                            <!-- <li class=""><a rel="sponsored" href="https://templatemo.com" target="_blank">External URL</a></li> -->
                            <li class="scroll-to-section"><a href="#reservation">Contact Us</a></li>

                            <li class="scroll-to-section">
                                @auth
                                <a href="">Cart[{{ $count }}]</a>
                                @endauth
                                @guest
                                <a>Cart[0]</a>
                                @endguest
                            </li>



                            <li>

                                @if (Route::has('login'))
                                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                                    @auth
                            <li>
                                <x-app-layout>

                                </x-app-layout>
                            </li>
                            @else
                            <li><a href="{{ route('login') }}"
                                    class="text-sm text-gray-700 dark:text-gray-500 underline">Log in</a></li>

                            @if (Route::has('register'))
                            <li><a href="{{ route('register') }}"
                                    class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a></li>
                            @endif
                            @endauth
                </div>
                @endif

                </li>

                <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <div class="container" id="top">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <table class="mt-5 table">
                    <tr>
                        <th>Food Name</th>
                        <th>Price</th>
                        <th>Quantity</th>
                        <th>Action</th>
                    </tr>

            <form action="{{ url('/orderconfirm') }}" method="post">
                        @csrf

                        @foreach ($data as $item)
                        <tr>
                            <td>
                                <input type="text" name="foodname[]" value="{{ $item->food->title }}" hidden>
                                {{ $item->food->title }}
                            </td>
                            <td>
                                <input type="text" name="price[]" value="{{ $item->food->price }}" hidden>
                                {{ $item->food->price }}
                            </td>
                            <td>
                                <input type="text" name="quantity[]" value="{{ $item->quantity }}" hidden>
                                {{ $item->quantity }}
                            </td>
                            <td>
                                <a href="{{ url('remove', $item->id) }}" class="btn btn-danger btn-sm">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                </table>




                        <div class="row mt-3">
                            <div class="col-lg-8 offset-lg-2">
                                <div class="text-center">
                                    <fieldset>
                                        <button type="button" id="order" style="background-color: #fb5849;border-color:#fb5849"
                                            class="btn btn-primary">Order Now</button>
                                    </fieldset>
                                </div>



                                <div id="appear" class="mt-5" style="display: none">
                                    <div class="row">
                                        <div class="col-lg-12 text-center lead">
                                            <h4>Personal Information</h4>
                                        </div>

                                        <div class="col-lg-6 offset-lg-3">
                                            <div class="form-group">
                                                <label for="name">Name</label>
                                                <input type="text" name="name" style="border-radius:3px" class="form-control"
                                                    placeholder="Enter Name">
                                            </div>
                                            <div class="form-group">
                                                <label for="phone">Phone</label>
                                                <input type="number" style="border-radius:3px" name="phone" class="form-control"
                                                    placeholder="Number">
                                            </div>
                                            <div class="form-group">
                                                <label for="address">Address</label>
                                                <textarea style="border-radius:3px" class="form-control" name="address"
                                                    cols="26" rows="3" placeholder="Address"></textarea>
                                            </div>
                                            <div class="text-right">
                                                <button type="submit" class="btn btn-success">Confirm Order</button>
                                                <button type="button" id="close" class="btn btn-danger">Close</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>

                    </form>
            </div>
        </div>


    </div>


    {{-- <div id="top">

    </div> --}}


    <!-- ***** Footer Start ***** -->
    {{-- <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-xs-12">
                    <div class="right-text-content">
                            <ul class="social-icons">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                            </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="logo">
                        <a href="index.html"><img src="assets/images/white-logo.png" alt=""></a>
                    </div>
                </div>
                <div class="col-lg-4 col-xs-12">
                    <div class="left-text-content">
                        <p>© Copyright Klassy Cafe Co.

                        <br>Design: TemplateMo</p>
                    </div>
                </div>
            </div>
        </div>
    </footer> --}}

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/accordions.js"></script>
    <script src="assets/js/datepicker.js"></script>
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>
    <script src="assets/js/slick.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/isotope.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <script>
        $(function () {
            var selectedClass = "";
            $("p").click(function () {
                selectedClass = $(this).attr("data-rel");
                $("#portfolio").fadeTo(50, 0.1);
                $("#portfolio div").not("." + selectedClass).fadeOut();
                setTimeout(function () {
                    $("." + selectedClass).fadeIn();
                    $("#portfolio").fadeTo(50, 1);
                }, 500);

            });
        });

        $("#order").click(function () {
            $("#appear").show();
        });

        $("#close").click(function () {
            $("#appear").hide();
        });

    </script>
</body>

</html>
