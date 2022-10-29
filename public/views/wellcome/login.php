<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="shortcut icon" href="#">
        <!-- <link rel="shortcut icon" href="" sizes="96x96"> -->

        <link rel="stylesheet" href="<?= BaseAssets ?>font/font-local.css">
        <link rel="stylesheet" href="<?= BaseAssets ?>css/costume-style.css">
        <link rel="stylesheet" href="<?= BaseAssets ?>css/colors.css">
        <link rel="stylesheet" href="<?= BaseAssets ?>css/animated.css">
        <link rel="stylesheet" href="<?= BaseAssets ?>css/costume-bootstrap.css">

        <link
            href='https://unpkg.com/boxicons@2.1.2/css/boxicons.min.css'
            rel='stylesheet'>

        <link
            rel="stylesheet"
            href="<?= BaseAssets ?>plugin/bootstrap/icon/bootstrap-icons.css">
        <link
            rel="stylesheet"
            href="<?= BaseAssets ?>plugin/bootstrap/css/bootstrap.min.css">

        <link rel="stylesheet" href="<?= BaseAssets ?>plugin/aos/aos.css">
        <link
            rel="stylesheet"
            href="<?= BaseAssets ?>plugin/magnific/magnific-popup.css">
        <!-- data-select2 -->
        <link
            rel="stylesheet"
            href="<?= BaseAssets ?>/plugin/dataSelect2/css/select2.min.css">

        <link rel="stylesheet" href="<?= BaseAssets ?>css/login.css">

        <title>Login</title>
    </head>
    <body>
        <div class="filter-bg"></div>
        <section class="login d-flex justify-content-center align-items-center">
            <div
                class="container-login100"
                data-aos="zoom-in"
                data-aos-delay="500"
                data-aos-easing="ease-out-cubic">
                <div class="wrap-login100 fadeInDown">
                    <div class="row">
                        <div class="col-lg-12 col-md-12 mb-4 animated zoomInUp third">
                            <div class="login-content text-center">

                                <a
                                    class="login100-pic"
                                    data-toggle="dropdown"
                                    href="#"
                                    role="button"
                                    aria-haspopup="true"
                                    aria-expanded="false">
                                    <img
                                        src="<?= BaseFiles ?>images/logo-asdp-white.png"
                                        class="rounded mx-auto d-block logo-login"
                                        alt="ASDP-LOGO">
                                </a>

                                <div class="login-body mt-4">
                                    <form
                                        class="login100-form validate-form fadeIn second data-form"
                                        action="<?= BaseWellcome ?>LogIn"
                                        method="POST"
                                        autocomplete="on">
                                        <div class="wrap-input100 validate-input">
                                            <input
                                                id="username"
                                                name="username"
                                                class="input100"
                                                type="text"
                                                placeholder="Username"
                                                autocomplete="off"
                                                oninvalid="this.setCustomValidity('Please enter valid username')"
                                                oninput="setCustomValidity('')"
                                                required="">
                                            <span class="focus-input100"></span>
                                            <span class="symbol-input100">
                                                <i class='bx bx-user'></i>
                                            </span>
                                        </div>
                                        <div class="wrap-input100 validate-input" data-validate="Password is required">
                                            <input
                                                class="input100 is-invalid"
                                                type="password"
                                                name="password"
                                                placeholder="Password"
                                                autocomplete="current-password"
                                                oninvalid="this.setCustomValidity('Password is required')"
                                                oninput="setCustomValidity('')"
                                                required=""
                                                id="pass">
                                            <span class="focus-input100"></span>
                                            <span class="symbol-input100">
                                                <i class='bx bx-key'></i>
                                            </span>
                                            <span class="" onclick="myFunction()">
                                                <i class='bx bx-show-alt soshow'></i>
                                            </span>
                                        </div>
                                        <div class="container-login100-form-btn">
                                            <button
                                                type="submit"
                                                class="login100-form-btn btn-login btn-skdpt fadeIn third">
                                                LOGIN</button>
                                        </div>
                                        <div class="text-center p-t-12 ">
                                            <span class="txt1">D-SSAT Cab. Ternate  v1.0</span>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </section>
        <footer class="main-footer d-md-flex d-none p-2 px-3 fadeIn second">
          <ul class="nav">
            <li class="nav-item"><a class="nav-link" href="#">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Services</a></li>
            <li class="nav-item"><a class="nav-link" href="#">About</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Products</a></li>
            <li class="nav-item"><a class="nav-link" href="#">Blog</a></li>
          </ul>
          <span class="copyright ms-auto my-auto mr-2">  ASDPTernate v1.1 copyright © 2022-2023 by <a href="mailto:gunangeh7@gmail.com">ASDP Kantor Cabang Ternate</a></span>
        </footer>

        <div class="social-fixed d-md-flex d-none fadeIn third">
          <a href="#!">twitter</a>
          <a href="#!">facebook</a>
          <a href="#!">instagram</a>
        </div>

        <div class="location-fixed d-md-flex d-none fadeIn third">
          <p><i class="bx bx-map"></i> Jalan Kompleks Bastiong, Kec. Ternate Selatan, Kota Ternate, Maluku Utara, INDONESIA</p>
        </div>

        <?php require_once 'public/templates/modal/main-modal.php'; ?>
        <script
            type="text/javascript"
            src="<?= BaseAssets ?>plugin/bootstrap/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="<?= BaseAssets ?>js/sweetalert.min.js"></script>
        <script
            type="text/javascript"
            src="<?= BaseAssets ?>plugin/dataTables/js/jquery-3.5.1.js"></script>
        <!-- data-select2 -->
        <script
            type="text/javascript"
            src="<?= BaseAssets ?>plugin/dataSelect2/js/select2.min.js"></script>
        <script type="text/javascript" src="<?= BaseAssets ?>plugin/aos/aos.js"></script>

        <script type="text/javascript" src="<?= BaseAssets ?>js/app.js"></script>
        <script type="text/javascript" src="<?= BaseAssets ?>js/login.js"></script>

        <script type="text/javascript">
            $("#pass").on("keyup", function () {
                if ($(this).val()) 
                    $(".soshow").show();
                else 
                    $(".soshow").hide();
                }
            );
            function myFunction() {
                var x = document.getElementById("pass");
                if (x.type === "password") {
                    x.type = "text";
                } else {
                    x.type = "password";
                }
            }
        </script>
    </body>
</html>