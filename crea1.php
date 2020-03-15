
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta name="viewport"    content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author"      content="Sergey Pozhilov (GetTemplate.com)">

	<title>Sign up </title>

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
					<li class="active"><a class="btn" href="signin.php">SIGN IN / SIGN UP</a></li>
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
			<li class="active">Registration</li>
		</ol>

		<div class="row">

			<!-- Article main content -->
			<article class="col-xs-12 maincontent">
				<header class="page-header">
					<h1 class="page-title">Registration</h1>
                                </header>

				<div class="col-md-6 col-md-offset-3 col-sm-8 col-sm-offset-2">
					<div class="panel panel-default">
						<div class="panel-body">
                                                        <h3 class="thin text-center">Register a new account</h3>
							<p class="text-center text-muted">Lorem ipsum dolor sit amet, <a href="signin.php">Login</a> adipisicing elit. Quo nulla quibusdam cum doloremque incidunt nemo sunt a tenetur omnis odio. </p>
							<hr>
<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=site_eau;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
if(isset($_POST['forminscription']))
{
        $adresse = htmlspecialchars($_POST['adresse']);
        $numtel = htmlspecialchars($_POST['numtel']);
        $email = htmlspecialchars($_POST['email']);
        $email2 = htmlspecialchars($_POST['email2']);
		$typec=htmlspecialchars($_POST['typec']);
		$mailconnect = htmlspecialchars($_POST['email']);
        if(!empty($_POST['adresse']) AND !empty($_POST['numtel']) AND !empty($_POST['email']) AND !empty($_POST['mdp1']))
        {
           if(strlen($adresse) <= 150)
           {
            if(preg_match("#[0][6][- \.?]?([0-9][0-9][- \.?]?){4}$#", $numtel))
            {
              if($email == $email2)
              {
                 if(filter_var($email, FILTER_VALIDATE_EMAIL))
                 {
                    $reqemail = $bdd->prepare("SELECT * FROM client WHERE email = ?");
                    $reqemail->execute(array($email));
                    $emailexist = $reqemail->rowCount();
                        if($emailexist == 0)
                        {
							$mdp1 = password_hash($_POST['mdp1'], PASSWORD_DEFAULT);
							$mdp2 = password_hash($_POST['mdp2'], PASSWORD_DEFAULT);
						 if($_POST['mdp1'] == $_POST['mdp1'])
						 {
                          $insertclt = $bdd->prepare("INSERT INTO client(adresse, numtel, email, mdp) VALUES(?, ?, ?,?)");
                          $insertclt->execute(array($adresse, $numtel, $email, $mdp1));
                          if($typec=="particulier")
                          {
							$requser = $bdd->prepare("SELECT * FROM client WHERE email = ?");
							$requser->execute(array($email));
							 $userinfo = $requser->fetch();
							 session_start();
							 $_SESSION['numc'] = $userinfo['numc'];
							header("Location: crea2.php?numc=".$_SESSION['numc']);
                          }
                          else
                          {
							$requser = $bdd->prepare("SELECT * FROM client WHERE email = ?");
							$requser->execute(array($email));
							 $userinfo = $requser->fetch();
							 session_start();
							 $_SESSION['numc'] = $userinfo['numc'];
                                header('Location: crea3.php');
						  }
						}
						 else
						 {
							 echo "mot de passe non identique";
						 }
                        }
                        else
                        {
                           echo "Adresse mail déjà utilisée !";
                        }
                  }
                  else
                  {
                    echo "Votre adresse mail n'est pas valide !";
                  }
              }
              else
              {
                 echo "Vos adresses mail ne correspondent pas !";
              }
            }
            else
            {
                    echo "numéro de téléphone incorrect";
            }
           }
           else
           {
              echo "Votre adresse ne doit pas dépasser 150 caractères !";
           }
        }
        else
        {
		echo "Tous les champs doivent être complétés !";
		header('Location: crea1.php');
        }
}
else
{
        ;
}
?>
							<form name="inscri1" method="post" action="crea1.php">
								<div class="top-margin">
									<label>Adresse</label>
									<input type="text" id="adresse" name="adresse" class="form-control">
								</div>
								<div class="top-margin">
									<label>Numéro de téléphone</label>
									<input type="tel" id="numtel" name="numtel" class="form-control">
								</div>
								<div class="top-margin">
									<label>Addresse email <span class="text-danger">*</span></label>
									<input type="email" id="email" name="email" class="form-control">
								</div>
								<div class="top-margin">
									<label>Répeter email <span class="text-danger">*</span></label>
									<input type="email" id="email2" name="email2" class="form-control">
								</div>
								<div class="top-margin">
									<label>Entrer votre mot de passe <span class="text-danger">*</span></label>
									<input type="password" id="mdp1" name="mdp1" class="form-control">
								</div>
								<div class="top-margin">
									<label>Répeter répeter votre mot de passe <span class="text-danger">*</span></label>
									<input type="password" id="mdp2" name="mdp2" class="form-control">
								</div>
								<div class="top-margin">
								<label>Etes-vous un particulier ou un professionnel?<span class="text-danger">*</span></label>
								<select name="typec" id="typec">
									<option value="particulier">particulier</option>
									<option value="professionnel?">professionnel</option>
								 </select>
								</div>

								<hr>

								<div class="row">
									<div class="col-lg-8">
										<label class="checkbox">
											<input type="checkbox">
											I've read the <a href="page_terms.php">Terms and Conditions</a>
										</label>
									</div>
									<div class="col-lg-4 text-right">
										<button class="btn btn-action" name="forminscription" type="submit">Register</button>
									</div>
								</div>
							</form>
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
