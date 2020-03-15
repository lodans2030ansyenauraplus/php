<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Dans vingt trente ans y en aura plus</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen" >
	<link rel="stylesheet" href="assets/css/main.css">

	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<div class="navbar navbar-inverse navbar-fixed-top headroom" >
		<div class="container">
			<div class="navbar-header">
				<!-- Button for smallest screens -->
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> </button>
				<a class="navbar-brand" href="index.php"><img class="logo" src="assets/images/logo.png" alt="Progressus HTML5 template"></a>
			</div>
			<div class="navbar-collapse collapse">
				<ul class="nav navbar-nav pull-right">
					<li class="active"><a href="#">Home</a></li>
					<li><a href="about.php">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Nos produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.php">Best seller</a></li>
							<li class="active"><a href="sidebar-right.php">Nos packs</a></li>
                        </ul>
                    <li><a href="contact.php">Contact</a></li>
                    <?php
                        session_start();
                        try
                        {
                            $bdd = new PDO('mysql:host=localhost;dbname=site_eau;charset=utf8', 'root', '');
                        }
                        catch(Exception $e)
                        {
                                die('Erreur : '.$e->getMessage());
                        }
                        if (isset($_SESSION['numc']) AND isset($_SESSION['email']))
                        {
                        ?>
                        <a class="btn btn-success btn-sm ml-3" href="cart.php">
                        <i class="fa fa-shopping-cart"></i> Cart<span class="badge badge-light">3</span></a>
                        <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Mon compte <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                          <li><a href="deconnexion.php">Deconnexion</a></li>
                          <li><a href="">Mon compte</a></li>
                        </ul>
                        <?php }
                        else
                        {
                        ?>
                    <li><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>
                        <?php } ?>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</div>
	<!-- /.navbar -->

	<!-- Header -->
	<header id="head">
		<div class="container">
			<div class="row">
				<h1 class="lead">Dans vingt trente ans y en aura plus</h1>


			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">
		<br> <br>
		<h2 class="thin">Le meilleur endroit pour vous procurer de la légèrté</h2>
		<p class="text-muted">
			Une journée commence toujours avec une bonne dose de pureté<br>
		</p>
	</div>
	<!-- /Intro-->

	<!-- Highlights - jumbotron -->
	<div class="jumbotron top-space">
		<div class="container">

			<h3 class="text-center thin">Les raisons de consommer l'O</h3>

			<div class="row">
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-cogs fa-5"></i>Un systeme rapide</h4></div>
					<div class="h-body text-center">
						<p>Un système pour le professionnel/particulier efficace et rapide pour pouvoir profiter de notre sélection rapide de nos produits.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-flash fa-5"></i>Un commerce responsable</h4></div>
					<div class="h-body text-center">
						<p> Les produits sont élaborés et produits dans des normes environnementales et responsables pour préserver la planète. Et pour vous permettre de faire un petit geste pour l'Environnement.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-heart fa-5"></i>Votre bien être</h4></div>
					<div class="h-body text-center">
						<p>Les eaux que l'on vous propose proviennent de source riche en minéraux indispensables au bon fonctionnement de l'organisme, l'histoire de ces eaux repose sur des millénaires.</p>
					</div>
				</div>
				<div class="col-md-3 col-sm-6 highlight">
					<div class="h-caption"><h4><i class="fa fa-smile-o fa-5"></i>Avis Client</h4></div>
					<div class="h-body text-center">
						<p>Clementine P:<br>Le service est très rapide, une qualité irréprochable.Je recommande. <br> Stan S:<br>Les produits d'exception son conforme aux descriptions faites, parfait pour mon restaurant. </p>
					</div>
				</div>
			</div> <!-- /row  -->

		</div>
	</div>
	<!-- /Highlights -->

	<!-- container -->
	<div class="container">

		<h2 class="text-center top-space">Question Récurrentes</h2>
		<br>

		<div class="row">
			<div class="col-sm-6">
				<h3>Comment peut-on suivre votre acctualitée ?</h3>
				<p>Vous pouvez venir nous suivre sur nos différents réseaux socieux comme <a href="https://twitter.com/LoParisVie">Twitter</a> ou encore <a href="">Instagram</a>.</p>
			</div>
			<div class="col-sm-6">
				<h3>Peut on crer nos propres packs?
				</h3>
				<p> Cette fonctionnalité est réservée au professionnel et sure demande uniquement par email.</p>
			</div>
		</div> <!-- /row -->

		<div class="row">
			<div class="col-sm-6">
				<h3>Can I use it to build a site for my client?</h3>
				<p>
					Yes, you can. You may use this template for any purpose, just don't forget about the <a href="http://creativecommons.org/licenses/by/3.0/">license</a>,
					which says: "You must give appropriate credit", i.e. you must provide the name of the creator and a link to the original template in your work.
				</p>
			</div>
			<div class="col-sm-6">
				<h3>Can you customize this template for me?</h3>
				<p>Yes, I can. Please drop me a line to sergey-at-pozhilov.com and describe your needs in details. Please note, my services are not cheap.</p>
			</div>
		</div> <!-- /row -->

		<div class="jumbotron top-space">
			<h4> <img src="assets/images/banner.png" alt="Progressus HTML5 template"> </h4>
  		</div>

</div>	<!-- /container -->

	<!-- Social links. @TODO: replace by link/instructions in template -->
	<section id="social">
		<div class="container">
			<div class="wrapper clearfix">
				<!-- AddThis Button BEGIN -->
				<div class="addthis_toolbox addthis_default_style">
				<a class="addthis_button_facebook_like" fb:like:layout="button_count"></a>
				<a class="addthis_button_tweet"></a>
				<a class="addthis_button_linkedin_counter"></a>
				<a class="addthis_button_google_plusone" g:plusone:size="medium"></a>
				</div>
				<!-- AddThis Button END -->
			</div>
		</div>
	</section>
	<!-- /social links -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>0603179587<br>
								<a href="mailto:#">contact.service.lh2o@gmail.com</a><br>
								<br>
								5 impasse des 2 cousin, Paris, 75017
							</p>
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons">
								<a href="https://twitter.com/LoParisVie"><i class="fa fa-twitter fa-2"></i></a>
								<a href="https://www.instagram.com/loparis75/"><i class="fa fa-instagram fa-2"></i></a>
							</p>
						</div>
					</div>


				</div> <!-- /row of widgets -->
			</div>
		</div>

		<div class="footer2">
			<div class="container">
				<div class="row">

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="simplenav">
								<a href="#">Home</a> |
								<a href="about.php">About</a> |
								<a href="sidebar-right.php">Sidebar</a> |
								<a href="contact.php">Contact</a> |
								<b><a href="signup.php">Sign up</a></b>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<div class="widget-body">
							<p class="text-right">
								L'équipe vous souhaite une bonne journée.
							</p>
						</div>
					</div>

				</div> <!-- /row of widgets -->
			</div>
		</div>

	</footer>





	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>
</html>
