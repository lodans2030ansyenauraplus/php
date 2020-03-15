<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>About - Progressus Bootstrap template</title>

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

<body>
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
					<li><a href="index.php">Home</a></li>
					<li class="active"><a href="about.php">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">Nos produits <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.php">Best seller</a></li>
							<li><a href="sidebar-right.php">Nos packs</a></li>
						</ul>
					</li>
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

	<header id="head" class="secondary"></header>

	<!-- container -->
	<div class="container">

		<ol class="breadcrumb">
			<li><a href="index.php">Home</a></li>
			<li class="active">About</li>
		</ol>

		<div class="row">

			<!-- Article main content -->
			<article class="col-sm-8 maincontent">
				<header class="page-header">
					<h1 class="page-title">A propos de nous.</h1>
				</header>
				<h3>l'O : Le plus grand choix d’eaux du monde</h3>
				<p><img src="assets/images/eau_about.jpg" alt="" class="img-rounded pull-right" width="300" >
				<p> <br> Spécialiste des eaux les plus prestigieuses en provenance des 4 coins du monde, l'O dispose d’une vaste gamme de boissons afin de satisfaire les exigences les plus pointues. Qu’il s’agisse d’eaux plates, d’eaux de sources ou de boissons tendances, vous trouverez le plus grand choix de marques, de bouteilles et des nouveautés renouvelées quotidiennement. <br> Découvrez ces eaux aux vertus inattendues : tonicité, minceur, pureté, prévention des caries… Comme l’eau de Chateldon reconnue pour ses qualités thérapeutiques et eau favorite du Roi Soleil. Si le contenu des eaux distribuées par l'O mérite le détour, le contenant n’est pas en reste. C’est le cas des flacons uniques réalisés par des designers de renom comme l’eau de Voss ou l’eau Bling H2O. Venez les découvrir et demandez conseil! </p>
				<h3>Un vaste choix de produits complémentaires prestigieux</h3>
				<p>L’équipe de l'O ne cesse de rechercher de nouveaux produits et de nouvelles marques au hasard des voyages, des rencontres et quelquefois grâce à des coups de cœur. Notre but est de vous procurer des sensations inédites et de surprendre vos palais ainsi que celui de vos invités avec de nouvelles saveurs. C’est pourquoi le catalogue L'O a fait l’objet d’une sélection rigoureuse. Vous retrouverez notamment produits bénéficiant de label reconnu: commerce équitable, bio ou végan.</p>
				<h3>Un service haut de gamme pour accompagner ces produits de luxe </h3>
				<p>Vous trouverez sur notre boutique en ligne des boissons prestigieuses qui apporteront une touche luxueuse à votre table et qui feront honneur à vos invités. Sachez que nous proposons une grille tarifaire spécifique pour les professionnels.. N’hésitez pas à prendre contact avec nous pour un devis personnalisé. Vous bénéficiez d’un service personnalisé du premier Water Sommelier de France. Nous proposons aussi à nos clients de venir retirer gratuitement leurs colis dans notre espace logistique parisien.</p>


			</article>
			<!-- /Article -->

			<!-- Sidebar -->
			<aside class="col-sm-4 sidebar sidebar-right">

				<div class="widget">
					<h4>Entrepreneur:</h4>
					<ul class="list-unstyled list-spaces">
						<li> <u>Alexandre Lefranc</u> <br> 0602638656 <br> a.lefranc75@gmail.com </span></li>
						<li> <u>Amine Hedjar:</u> <br> 0695625381 <br> jeanclaudebab@gmail.com </span></li>
						<li> <u>Baptiste Lavergne</u> <br> 0603179587 <br> lavergnebaptiste@gmail.com </span></li>
					</ul>
				</div>

			</aside>
			<!-- /Sidebar -->

		</div>
	</div>	<!-- /container -->


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
							<p class="follow-me-icons clearfix">
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
