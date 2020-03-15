<?php
	session_start();
	require_once('fonctionpannier.php');

							$bdd = new PDO('mysql:host=localhost;dbname=site_eau;charset=utf8', 'root', '');
							$numpro=1;
							$qteProduit=1;
							$prix=5;
							$numerocommande=1;
							$etat='actif';
							$insertprd = $bdd->prepare("INSERT INTO possede(numerocommande, numpro, quantite, etat, prix) VALUES(?, ?; ?, ?, ?)");
							$insertprd->execute(array($numerocommande, $numpro, $qteProduit, $etat, $prix));
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Sign in - Progressus Bootstrap template</title>

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
					<li><a href="about.php">About</a></li>
					<li class="dropdown">
						<a href="#" class="dropdown-toggle" data-toggle="dropdown">More Pages <b class="caret"></b></a>
						<ul class="dropdown-menu">
							<li><a href="sidebar-left.php">Left Sidebar</a></li>
							<li><a href="sidebar-right.php">Right Sidebar</a></li>
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
			<li class="active">User access</li>
		</ol>

		<div class="row">

			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Mon panier</h1>
                </header>
               

<?php
 $panier=$bdd->prepare("SELECT * FROM possede,commande,client,produit Where client.numc = ? AND client.numc=commande.numc AND commande.numerocommande=possede.numerocommande AND possede.numpro=produit.numpro AND possede.statutp='nonvalide' ");
 $panier->execute(array($_SESSION['numc']));
 $pan=$panier->rowCount();
 $somme=0;
 if($pan !=0)
 {
 $n=0;
?>
<div class="container mb-4">
    <div class="row">
        <div class="col-12">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th scope="col"> </th>
                            <th scope="col">Produit</th>
                            <th scope="col">Disponibilité</th>
                            <th scope="col" class="text-center">Quantité</th>
                            <th scope="col" class="text-right">Prix</th>
                            <th> </th>
                        </tr>
                    </thead>
					<?php
					foreach($panier as $contenu)
					{
					   $n++;
					   ?>
                    <tbody>
                        <tr>
                            <td><img src=<?=$contenu['image']?> /> </td>
                            <td><?=$contenu['nompro']?></td>
                            <td>En stock</td>
                            <td><?=$contenu['quantite']?></td>
							<?php $total=$contenu['prix']*$contenu['quantite']?>
                            <td class="text-right"><?=$total?></td>
							<form method='post' action='cart.php'>
							<?php
								if(isset($_POST['supprimer'.$n]))
								{
									$supppro=$bdd->prepare("DELETE FROM possede WHERE numerocommande= ? AND numpro= ? AND statutp= 'nonvalide' ");
									$supppro->execute(array($contenu['numerocommande'], $contenu['numpro']));
								}
							?>
                            <td class="text-right"><button class="btn btn-sm btn-danger" type="submit" name="<?='supprimer'.$n?>"><i class="fa fa-trash"></i>Supprimer</button> </td>
							</form>
                        </tr>
						<?php
						$somme=$somme+$total;
							?>
<?php
	}
}		
	else
	{?>
		<div class="container">
        	<h1 class="jumbotron-heading">Panier vide</h1>
     	</div>
	<?php
	}						 
			 ?>
			
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Sous-Total</td>
                            <td class="text-right"><?=$somme?></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>Frais de port</td>
                            <td class="text-right">6,90 €</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td><strong>Total</strong></td>
                            <td class="text-right"><strong><?=$somme+6.9?></strong></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="col mb-2">
            <div class="row">
                <div class="col-sm-12  col-md-6">
                    <button class="btn btn-block btn-light">Continue Shopping</button>
                </div>
                <div class="col-sm-12 col-md-6 text-right">
                    <button class="btn btn-lg btn-block btn-success text-uppercase">Checkout</button>
                </div>
            </div>
        </div>
    </div>
</div>




			</article>
			<!-- /Article -->

		</div>
	</div>	<!-- /container -->


	<footer id="footer" class="top-space">

		<div class="footer1">
			<div class="container">
				<div class="row">

					<div class="col-md-3 widget">
						<h3 class="widget-title">Contact</h3>
						<div class="widget-body">
							<p>+234 23 9873237<br>
								<a href="mailto:#">some.email@somewhere.com</a><br>
								<br>
								234 Hidden Pond Road, Ashland City, TN 37015
							</p>
						</div>
					</div>

					<div class="col-md-3 widget">
						<h3 class="widget-title">Follow me</h3>
						<div class="widget-body">
							<p class="follow-me-icons clearfix">
								<a href=""><i class="fa fa-twitter fa-2"></i></a>
								<a href=""><i class="fa fa-dribbble fa-2"></i></a>
								<a href=""><i class="fa fa-github fa-2"></i></a>
								<a href=""><i class="fa fa-facebook fa-2"></i></a>
							</p>
						</div>
					</div>

					<div class="col-md-6 widget">
						<h3 class="widget-title">Text widget</h3>
						<div class="widget-body">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Excepturi, dolores, quibusdam architecto voluptatem amet fugiat nesciunt placeat provident cumque accusamus itaque voluptate modi quidem dolore optio velit hic iusto vero praesentium repellat commodi ad id expedita cupiditate repellendus possimus unde?</p>
							<p>Eius consequatur nihil quibusdam! Laborum, rerum, quis, inventore ipsa autem repellat provident assumenda labore soluta minima alias temporibus facere distinctio quas adipisci nam sunt explicabo officia tenetur at ea quos doloribus dolorum voluptate reprehenderit architecto sint libero illo et hic.</p>
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
								Copyright &copy; 2014, Your name. Designed by <a href="http://gettemplate.com/" rel="designer">gettemplate</a>
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
