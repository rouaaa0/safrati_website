<?php
include 'C:\xampp\htdocs\mcv\Controller\BlogC.php';
include 'C:\xampp\htdocs\mcv\Model\Blog.php';
include 'C:\xampp\htdocs\mcv\Controller\CommentaireC.php';
include 'C:\xampp\htdocs\mcv\Model\Commentaire.php';

$blogC = new CommentaireC();
$id=$_GET['idBlog'];
$comments = $blogC->listCommentairesbyid($id);
$error = "";

// Create an instance of the controller
$blogC = new BlogC();


// Create an instance of the controller
$commentaireC = new CommentaireC();
$idblog=$_GET["idBlog"];
if (
    isset($_POST["comm"])
) {
    if (
        !empty($_POST['comm'])

    ) {
        $starRating = $_POST['star_rating'];
        $commentaire = new Commentaire(
            $_POST['comm'],
            null,
            $idblog,
            1//,$starRating
        );


        $commentaireC->addCommentaire($commentaire);
        header('Location:showblog.php?idBlog='.$idblog);

    } else {
        $error = "Missing information";
    }
}
?>





<!doctype html>
<html class="no-js"  lang="en">

<head>
    <!-- META DATA -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!--font-family-->
    <link href="https://fonts.googleapis.com/css?family=Rufina:400,700" rel="stylesheet" />

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet" />

    <!-- TITLE OF SITE -->
    <title>Travel</title>

    <!-- favicon img -->
    <link rel="shortcut icon" type="image/icon" href="assets/logo/favicon.png"/>

    <!--font-awesome.min.css-->
    <link rel="stylesheet" href="styles/font-awesome.min.css" />

    <!--animate.css-->
    <link rel="stylesheet" href="styles/animate.css" />

    <!--hover.css-->
    <link rel="stylesheet" href="styles/hover-min.css">

    <!--datepicker.css-->
    <link rel="stylesheet"  href="styles/datepicker.css" >

    <!--owl.carousel.css-->
    <link rel="stylesheet" href="styles/owl.carousel.min.css">
    <link rel="stylesheet" href="styles/owl.theme.default.min.css"/>

    <!-- range css-->
    <link rel="stylesheet" href="styles/jquery-ui.min.css" />

    <!--bootstrap.min.css-->
    <link rel="stylesheet" href="styles/bootstrap.min.css" />

    <!-- bootsnav -->
    <link rel="stylesheet" href="styles/bootsnav.css"/>

    <!--style.css-->
    <link rel="stylesheet" href="styles/style.css" />

    <!--responsive.css-->
    <link rel="stylesheet" href="styles/responsive.css" />

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->

    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<style>
    :root {
        --enlarge: scale(1.25);
        --page-color: steelblue;
        --star-primary-color: gold;
        --star-secondary-color: darkgoldenrod;
    }

    body {
        background: var(--page-color);
        margin: 0;
        font-family: system-ui;
    }



    .star-group {
        display: grid;
        font-size: clamp(.05em, 4vw, 8em);
        grid-auto-flow: column;
    }

    /* reset native input styles */
    .star {
        -webkit-appearance: none;
        align-items: center;
        appearance: none;
        cursor: pointer;
        display: grid;
        font: inherit;
        height: 1px;
        justify-items: center;
        margin: 0;
        place-content: center;
        position: relative;
        width: 1.15em;

    }

    @media (prefers-reduced-motion: no-preference) {
        .star {
            transition: all 0.25s;
        }


    }

    .star:before,
    .star:after {
        color: var(--star-primary-color);
        position: absolute;
    }

    .star:before {
        content: "☆";
    }

    .star:after {
        content: "✦";
        font-size: 25%;
        opacity: 0;
        right: 20%;
        top: 20%;
    }

    /* The checked radio button and each radio button preceding */
    .star:checked:before,
    .star:has(~ .star:checked):before {
        content: "★";
    }

    #two:checked:after,
    .star:has(~ #two:checked):after {
        opacity: 1;
        right: 14%;
        top: 10%;
    }

    #three:checked:before,
    .star:has(~ #three:checked):before {
        transform: var(--enlarge);
    }

    #three:checked:after,
    .star:has(~ #three:checked):after {
        opacity: 1;
        right: 8%;
        top: 2%;
        transform: var(--enlarge);
    }

    #four:checked:before,
    .star:has(~ #four:checked):before {
        text-shadow: 0.05em 0.033em 0px var(--star-secondary-color);
        transform: var(--enlarge);
    }

    #four:checked:after,
    .star:has(~ #four:checked):after {
        opacity: 1;
        right: 8%;
        top: 2%;
        transform: var(--enlarge);
    }

    #five:checked:before,
    .star:has(~ #five:checked):before {
        text-shadow: 0.05em 0.033em 0px var(--star-secondary-color);
        transform: var(--enlarge);
    }

    #five:checked:after,
    .star:has(~ #five:checked):after {
        opacity: 1;
        right: 8%;
        text-shadow: 0.14em 0.075em 0px var(--star-secondary-color);
        top: 2%;
        transform: var(--enlarge);
    }

    .star-group:has(> #five:checked) {
        #one {
            transform: rotate(-15deg);
        }

        #two {
            transform: translateY(-20%) rotate(-7.5deg);
        }

        #three {
            transform: translateY(-30%);
        }

        #four {
            transform: translateY(-20%) rotate(7.5deg);
        }

        #five {
            transform: rotate(15deg);
        }
    }

    .star:focus {
        outline: none;
    }

    .star:focus-visible {
        border-radius: 8px;
        outline: 2px dashed var(--star-primary-color);
        outline-offset: 8px;
        transition: all 0s;
    }

</style>
<style>
    /* Define a CSS class to apply pointer-events: none; */
    .disable-pointer-events {
        pointer-events: none;
    }
</style>
<body>
<!--[if lte IE 9]>
<p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade
    your browser</a> to improve your experience and security.</p>
<![endif]-->

<!-- main-menu Start -->
<header class="top-area">
    <div class="header-area">
        <div class="container">
            <div class="row">
                <div class="col-sm-2">
                    <div class="logo">
                        <a href="index.html">
                            tour<span>Nest</span>
                        </a>
                    </div><!-- /.logo-->
                </div><!-- /.col-->
                <div class="col-sm-10">
                    <div class="main-menu">

                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                                <i class="fa fa-bars"></i>
                            </button><!-- / button-->
                        </div><!-- /.navbar-header-->
                        <div class="collapse navbar-collapse">
                            <ul class="nav navbar-nav navbar-right">
                                <li class="smooth-menu"><a href="#home">home</a></li>
                                <li class="smooth-menu"><a href="#gallery">Destination</a></li>
                                <li class="smooth-menu"><a href="#pack">Packages </a></li>
                                <li class="smooth-menu"><a href="#spo">Special Offers</a></li>
                                <li class="smooth-menu"><a href="#blog">blog</a></li>
                                <li class="smooth-menu"><a href="#subs">subscription</a></li>
                                <li>
                                    <button class="book-btn">book now
                                    </button>
                                </li><!--/.project-btn-->
                            </ul>
                        </div><!-- /.navbar-collapse -->
                    </div><!-- /.main-menu-->
                </div><!-- /.col-->
            </div><!-- /.row -->
            <div class="home-border"></div><!-- /.home-border-->
        </div><!-- /.container-->
    </div><!-- /.header-area -->

</header><!-- /.top-area-->
<!-- main-menu End -->


<!--about-us start -->
<section id="home" class="about-us">
    <div class="container">
        <div class="about-us-content">
            <div class="row">
                <div class="col-sm-12">
                    <div class="single-about-us">
                        <div class="about-us-txt">
                            <h2>
                                Explore the Beauty of the Beautiful World

                            </h2>
                            <div class="about-btn">
                                <button  class="about-view">
                                    explore now
                                </button>
                            </div><!--/.about-btn-->
                        </div><!--/.about-us-txt-->
                    </div><!--/.single-about-us-->
                </div><!--/.col-->

            </div><!--/.row-->
        </div><!--/.about-us-content-->
    </div><!--/.container-->

</section><!--/.about-us-->
<!--about-us end -->

<!--travel-box start-->

<!--travel-box end-->

<!--service start-->

<!--service end-->

<!--galley start-->

<!--gallery end-->


<!--discount-offer start-->

<!--discount-offer end-->

<!--packages start-->

<!--packages end-->

<!-- testemonial Start -->

<!-- testemonial End -->


<!--special-offer start-->

<!--special-offer end-->

<!--blog start-->
<section id="blog" class="blog">
    <div class="container">
        <div class="blog-details">
            <div class="gallary-header text-center">
                <h2>
                    comments                </h2>
                <p>
                </p>
            </div><!--/.gallery-header-->
            <div class="blog-content">
                <div class="row">
                    <?php
                    if (isset($_GET['idBlog'])) {
                    $blog = $blogC->showBlog($_GET['idBlog']);
                    ?>


                        <div class="col-sm-4 col-md-4 col-lg-4">
                            <div class="thumbnail">
                                <h2>trending  <span><?= $blog['date_publication']; ?></span></h2>
                                <div class="thumbnail-img">
                                    <img src="assets/images/blog/b1.jpg" alt="blog-img">
                                    <div class="thumbnail-img-overlay"></div><!--/.thumbnail-img-overlay-->

                                </div><!--/.thumbnail-img-->

                                <div class="caption">
                                    <div class="blog-txt">
                                        <h3>
                                            <a href="#">
                                                <?= $blog['titre']; ?>
                                            </a>
                                        </h3>
                                        <p>
                                            <?= $blog['contenu']; ?>
                                        </p>
                                        <p>
                                            auteur : <?= $blog['auteur']; ?>
                                        </p>

                                        <p>

                                        <div class="container disable-pointer-events" style="margin-left: -50px;">
                                            <div class="star-group" style="width: 2px; height: 2px;">
                                                <input type="radio" class="star" id="one" name="star_rating<?= $blog['idBlog']; ?>" <?php if ($blog['rating'] == 1) echo 'checked'; ?>>
                                                <input type="radio" class="star" id="two" name="star_rating<?= $blog['idBlog']; ?>" <?php if ($blog['rating'] == 2) echo 'checked'; ?>>
                                                <input type="radio" class="star" id="three" name="star_rating<?= $blog['idBlog']; ?>" <?php if ($blog['rating'] == 3) echo 'checked'; ?>>
                                                <input type="radio" class="star" id="four" name="star_rating<?= $blog['idBlog']; ?>" <?php if ($blog['rating'] == 4) echo 'checked'; ?>>
                                                <input type="radio" class="star" id="five" name="star_rating<?= $blog['idBlog']; ?>" <?php if ($blog['rating'] == 5) echo 'checked'; ?>>
                                            </div>

                                        </div>
                                        </p>
                                    </div><!--/.blog-txt-->
                                </div><!--/.caption-->
                            </div><!--/.thumbnail-->

                        </div><!--/.col-->


                    <?php
                    }
                    ?>
                    <!--/.col-->


                    <?php foreach ($comments as $commentaire) { ?>


                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">

                            <div class="caption">
                                <div class="blog-txt">
                                    <h3>
                                        <a href="#">
                                            posted in :    <?= $commentaire['date']; ?>

                                        </a>
                                    </h3>
                                    <p>
                                        <?= $commentaire['message']; ?>
                                    </p>
                                    <p>

                                    <div class="container disable-pointer-events" style="margin-left: -50px;">
                                        <div class="star-group" style="width: 2px; height: 2px;">
                                            <input type="radio" class="star" id="one" name="star_rating<?= $commentaire['id']; ?><?= $commentaire['message']; ?>" <?php if ($commentaire['rating'] == 1) echo 'checked'; ?>>
                                            <input type="radio" class="star" id="two" name="star_rating<?= $commentaire['id']; ?><?= $commentaire['message']; ?>" <?php if ($commentaire['rating'] == 2) echo 'checked'; ?>>
                                            <input type="radio" class="star" id="three" name="star_rating<?= $commentaire['id']; ?><?= $commentaire['message']; ?>" <?php if ($commentaire['rating'] == 3) echo 'checked'; ?>>
                                            <input type="radio" class="star" id="four" name="star_rating<?= $commentaire['id']; ?><?= $commentaire['message']; ?>" <?php if ($commentaire['rating'] == 4) echo 'checked'; ?>>
                                            <input type="radio" class="star" id="five" name="star_rating<?= $commentaire['id']; ?><?= $commentaire['message']; ?>" <?php if ($commentaire['rating'] == 5) echo 'checked'; ?>>
                                        </div>

                                    </div>
                                    </p>
                                </div><!--/.blog-txt-->
                            </div><!--/.caption-->
                        </div><!--/.thumbnail-->

                    </div><!--/.col-->

                    <?php } ?>


                    <div class="col-sm-4 col-md-4">
                        <div class="thumbnail">
                            <h1> Add Comment </h1>
                            <div class="caption">
                                <div class="blog-txt">
                                    <form method="POST"  id="formr">
                                  <input type="text" name="comm" id="comm">
                                        <div class="container" style="margin-left: -50px; margin-top: 50px; margin-bottom: 50px;">
                                            <div class="star-group" style="width: 2px; height: 2px;">
                                                <!-- Add name attribute to star rating radio buttons -->
                                                <input type="radio" class="star" id="one" name="star_rating" value="1">
                                                <input type="radio" class="star" id="two" name="star_rating" value="2">
                                                <input type="radio" class="star" id="three" name="star_rating" value="3">
                                                <input type="radio" class="star" id="four" name="star_rating" value="4">
                                                <input type="radio" class="star" id="five" name="star_rating" value="5" checked>
                                            </div>
                                        </div>
                                            <button type="submit" class="btn btn-primary">comment</button>

                                        </div>

                                    </form>
                                </div><!--/.blog-txt-->
                            </div><!--/.caption-->
                        </div><!--/.thumbnail-->

                    </div><!--/.col-->

                </div><!--/.row-->
            </div><!--/.blog-content-->
        </div><!--/.blog-details-->
    </div><!--/.container-->

</section><!--/.blog-->
<!--blog end-->


<!--subscribe start-->
<section id="subs" class="subscribe">
    <div class="container">
        <div class="subscribe-title text-center">
            <h2>
                Join our Subscribers List to Get Regular Update
            </h2>
            <p>
                Subscribe Now. We will send you Best offer for your Trip
            </p>
        </div>
        <form>
            <div class="row">
                <div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
                    <div class="custom-input-group">
                        <input type="email" class="form-control" placeholder="Enter your Email Here">
                        <button class="appsLand-btn subscribe-btn">Subscribe</button>
                        <div class="clearfix"></div>
                        <i class="fa fa-envelope"></i>
                    </div>

                </div>
            </div>
        </form>
    </div>

</section>
<!--subscribe end-->

<!-- footer-copyright start -->
<footer  class="footer-copyright">
    <div class="container">
        <div class="footer-content">
            <div class="row">

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <div class="footer-logo">
                            <a href="index.html">
                                tour<span>Nest</span>
                            </a>
                            <p>
                                best travel agency
                            </p>
                        </div>
                    </div><!--/.single-footer-item-->
                </div><!--/.col-->

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>link</h2>
                        <div class="single-footer-txt">
                            <p><a href="#">home</a></p>
                            <p><a href="#">destination</a></p>
                            <p><a href="#">spacial packages</a></p>
                            <p><a href="#">special offers</a></p>
                            <p><a href="#">blog</a></p>
                            <p><a href="#">contacts</a></p>
                        </div><!--/.single-footer-txt-->
                    </div><!--/.single-footer-item-->

                </div><!--/.col-->

                <div class="col-sm-3">
                    <div class="single-footer-item">
                        <h2>popular destination</h2>
                        <div class="single-footer-txt">
                            <p><a href="#">china</a></p>
                            <p><a href="#">venezuela</a></p>
                            <p><a href="#">brazil</a></p>
                            <p><a href="#">australia</a></p>
                            <p><a href="#">london</a></p>
                        </div><!--/.single-footer-txt-->
                    </div><!--/.single-footer-item-->
                </div><!--/.col-->

                <div class="col-sm-3">
                    <div class="single-footer-item text-center">
                        <h2 class="text-left">contacts</h2>
                        <div class="single-footer-txt text-left">
                            <p>+1 (300) 1234 6543</p>
                            <p class="foot-email"><a href="#">info@tnest.com</a></p>
                            <p>North Warnner Park 336/A</p>
                            <p>Newyork, USA</p>
                        </div><!--/.single-footer-txt-->
                    </div><!--/.single-footer-item-->
                </div><!--/.col-->

            </div><!--/.row-->

        </div><!--/.footer-content-->
        <hr>
        <div class="foot-icons ">
            <ul class="footer-social-links list-inline list-unstyled">
                <li><a href="#" target="_blank" class="foot-icon-bg-1"><i class="fa fa-facebook"></i></a></li>
                <li><a href="#" target="_blank" class="foot-icon-bg-2"><i class="fa fa-twitter"></i></a></li>
                <li><a href="#" target="_blank" class="foot-icon-bg-3"><i class="fa fa-instagram"></i></a></li>
            </ul>
            <p>&copy; 2017 <a href="https://www.themesine.com">ThemeSINE</a>. All Right Reserved</p>

        </div><!--/.foot-icons-->
        <div id="scroll-Top">
            <i class="fa fa-angle-double-up return-to-top" id="scroll-top" data-toggle="tooltip" data-placement="top" title="" data-original-title="Back to Top" aria-hidden="true"></i>
        </div><!--/.scroll-Top-->
    </div><!-- /.container-->

</footer><!-- /.footer-copyright-->
<!-- footer-copyright end -->




<script src="assets/js/jquery.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->

<!--modernizr.min.js-->
<script  src="https://cdnjs.cloudflare.com/ajax/libs/modernizr/2.8.3/modernizr.min.js"></script>


<!--bootstrap.min.js-->
<script  src="assets/js/bootstrap.min.js"></script>

<!-- bootsnav js -->
<script src="assets/js/bootsnav.js"></script>

<!-- jquery.filterizr.min.js -->
<script src="assets/js/jquery.filterizr.min.js"></script>

<script  src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>

<!--jquery-ui.min.js-->
<script src="assets/js/jquery-ui.min.js"></script>

<!-- counter js -->
<script src="assets/js/jquery.counterup.min.js"></script>
<script src="assets/js/waypoints.min.js"></script>

<!--owl.carousel.js-->
<script  src="assets/js/owl.carousel.min.js"></script>

<!-- jquery.sticky.js -->
<script src="assets/js/jquery.sticky.js"></script>

<!--datepicker.js-->
<script  src="assets/js/datepicker.js"></script>

<!--Custom JS-->
<script src="assets/js/custom.js"></script>


</body>

</html>