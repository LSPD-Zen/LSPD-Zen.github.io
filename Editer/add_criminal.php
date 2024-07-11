<html>
	<head>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="" />
		<meta name="author" content="" />
		<!--[if IE]>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
			<![endif]-->
			<title>LSPD</title>
			<!-- BOOTSTRAP CORE STYLE  -->
			<link href="assets/css/bootstrap.css" rel="stylesheet" />
			<!-- FONT AWESOME STYLE  -->
			<link href="assets/css/font-awesome.css" rel="stylesheet" />
			<!-- CUSTOM STYLE  -->
			<link href="assets/css/style.css" rel="stylesheet" />
			<!-- GOOGLE FONT -->
			<link href='https://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />
		</head>
		<?php include( "config.php"); session_start();
		if (isset($_SESSION[ 'id']) and  ($_SESSION['police'] == 1 or $_SESSION['procureur'] == 1 or $_SESSION['Admin'] == 1)) {

            if($_SESSION['procureur']==1){
                $nav = '                    <li>
                                        <a href="police.php">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php" class="menu-top-active">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
									<li>
											<a href="concessionnaire.php">Plaques</a>
										</li>
										<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>';
            }else{
                $nav = '                    <li>
                                        <a href="police.php">Home</a>
                                    </li>
                                    <li>
										<a href="add_criminal.php" class="menu-top-active">Ajouter un criminel</a>
									</li>
									<li>
										<a href="bracelet.php">Bracelet</a>
									</li>
									<li>
											<a href="concessionnaire.php">Plaques</a>
										</li>
										<li>
										<a href="vehicule.php">Vehicule</a>
									</li>
										<li>
											<a href="trello" target="_blank">Informations Internes</a>
										</li>
										<li>
											<a href="drive" target="_blank">Documents</a>
										</li>';
            }


		    echo '
	    <head>
    <link rel="icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" />
<!--[if IE]><link rel="shortcut icon" type="image/x-icon" href="https://lspd-fivelife.fr/assets/img/lspdlogo.ico" /><![endif]-->
    </head>
		<body>
			<div class="navbar navbar-inverse set-radius-zero" >
				<div class="container">
					<div class="navbar-header">
						<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
							<span class="icon-bar"></span>
						</button>
						<a class="navbar-brand" href="police.php">
							<img src="https://i.imgur.com/BQoTEoz.png" width=180 height=70/>
						</a>
					</div>
					<div class="right-div">';
            if($_SESSION['Admin']==1){
                echo'<a href="administration.php" class="btn btn-info">ADMIN</a>';
            }else{
                if($_SESSION['PDG']==1){
                    echo'<a href="pdg.php" class="btn btn-info">PDG</a>';
                }
            }

            echo'
                        <a href="profil.php" class="btn btn-info">PROFIL</a>
                        <a href="logout.php" class="btn btn-danger">DECONNEXION</a>
                    </div>
				</div>
			</div>
			<!-- LOGO HEADER END-->
			<section class="menu-section">
				<div class="container">
					<div class="row ">
						<div class="col-md-12">
							<div class="navbar-collapse collapse ">
								<ul id="menu-top" class="nav navbar-nav navbar-right">
								'.$nav.'
									</ul>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- MENU SECTION END-->
			<div class="panel panel-info">
				<div class="panel-heading">
					<p></p>
					<p></p>Add a Criminal
					<p></p>
					<p></p>
				</div>
				<div class="panel-body">
					<form action="add_criminal_post.php" method="post">
						<p>
							<div class="form-group">
								<label for="nom">First and Surname *</label> :
								<p class="help-block">ex: John Cena</p>
								<input type="text" name="nom" id="nom" class="form-control" required />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Telephone</label> :
								<p class="help-block">ex 555-12345</p>
								<input type="text" name="telephone" id="telephone" class="form-control" />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Crime *</label> :
								<p class="help-block">Robber/ Car jacking / ...</p>
								<input type="text" name="crime" id="crime" class="form-control" required />
								<br />
							</div>
							<div class="form-group">
								<label for="message">Sanction *</label> :
								<p class="help-block">ex $100 Fine, 1 Year in jail</p>
								<input type="text" name="sanction" id="sanction" class="form-control" required />
								<br />
							</div>
							<input type="submit" value="Send" class="btn btn-info" />
						</p>
					</form>
					<p></p>
					<img src="https://image.noelshack.com/fichiers/2015/40/1443969486-lspd-logo-modern-2.png" align="center">
					</div>
				</div>
				<!-- CONTENT-WRAPPER SECTION END-->
				<section class="footer-section">
					<div class="container">
						<div class="row">
							<div class="col-md-12">
                   &copy; 2017 LSPD |
								<a href="https://www.youtube.com/user/davendrix" target="_blank"  > Coded by : Davendrix</a> &amp;  Glen McMahon
							</div>
						</div>
					</div>
				</section>
				<!-- FOOTER SECTION END-->
				<!-- JAVASCRIPT FILES PLACED AT THE BOTTOM TO REDUCE THE LOADING TIME  -->
				<!-- CORE JQUERY  -->
				<script src="assets/js/jquery-1.10.2.js"></script>
				<!-- BOOTSTRAP SCRIPTS  -->
				<script src="assets/js/bootstrap.js"></script>
			</body>'; } else { header( "Location: login.php"); } ?>
		</html>
