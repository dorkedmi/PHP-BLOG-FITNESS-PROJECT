<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title>post</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
	<link rel="shortcut icon" href="favicon.ico">

	<link href='https://fonts.googleapis.com/css?family=Roboto:400,100,300,700,900' rel='stylesheet' type='text/css'>
	
	<!-- Animate.css -->
	<link rel="stylesheet" href="/php/fitness/css/animate.css">
	<!-- Icomoon Icon Fonts-->
	<link rel="stylesheet" href="/php/fitness/css/icomoon.css">
	<!-- Bootstrap  -->
	<link rel="stylesheet" href="/php/fitness/css/bootstrap.css">
	<!-- Superfish -->
	<link rel="stylesheet" href="/php/fitness/css/superfish.css">

	<link rel="stylesheet" href="/php/fitness/css/style.css">
	<link rel="stylesheet" href="/php/fitness/css/postStyle.css">


	<!-- Modernizr JS -->
	<script src="/php/fitness/js/modernizr-2.6.2.min.js"></script>
	<!-- FOR IE9 below -->
	<!--[if lt IE 9]>
	<script src="js/respond.min.js"></script>
	<![endif]-->
<?php session_start();?>
	</head>
	<body>
		<div id="fh5co-wrapper">
		<div id="fh5co-page">
		<div id="fh5co-header">
			<header id="fh5co-header-section">
				<div class="container">
					<div class="nav-header">
						<a href="#" class="js-fh5co-nav-toggle fh5co-nav-toggle"><i></i></a>
						<h1 id="fh5co-logo"><a href="index.html">Fit<span>ness</span></a></h1>
						<!-- START #fh5co-menu-wrap -->
						<nav id="fh5co-menu-wrap" role="navigation">
							<ul class="sf-menu" id="fh5co-primary-menu">
								<li>
									<a href="/php/fitness/index.php">Home</a>
								</li>
								<li><a href="/php/fitness/index.php?logout">logout</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</header>		
		</div>
		<!-- end:fh5co-header -->
		<div class="fh5co-parallax" style="background-image: url(/php/fitness/images/home-image-2.jpg);" data-stellar-background-ratio="0.5">
			<div class="overlay"></div>
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-md-offset-2 col-sm-12 col-sm-offset-0 col-xs-12 col-xs-offset-0 text-center fh5co-table">
						<div class="fh5co-intro fh5co-table-cell animate-box">
							<h1 id="post_title" class="text-center">post title</h1>
							<ul class="list-inline text-center col-md-12">
                                <li id="trainer_name"></li>
                                <li id="post_subject"></li>
                                <li id="post_date"></li>
                            </ul>
							<p id="post_data"></p>
						</div>
					</div>
				</div>
			</div>
		</div><!-- end: fh5co-parallax -->
		<!-- end:fh5co-hero -->
		<div id="fh5co-team-section">
			<div class="container animate-box">
				<div class="row">
					<div class="col-md-8 col-md-offset-2">
						<div class="heading-section text-center animate-box">
							<h2>Comments</h2>
						</div>
					</div>
				</div>
				<div class="row text-center" id="commentArea">
                    <!-- comment area -->
        
				</div>
			</div>
	<form role="form" id="commentform" onsubmit='return onSubmit(this)'>		        
<!-- Trigger the modal with a button -->
            <div class="col-md-4"></div>
 <button type="button" class="btn btn-info btn-lg col-md-4 animate-box" data-toggle="modal" data-target="#myModal">Add Comment</button>
 
 <!-- Modal -->
 <div class="modal fade" id="myModal" role="dialog">
 <div class="modal-dialog vertical-align-center" style="padding-top:10%;">
 
 <!-- Modal content-->
 <div class="modal-content">
     <div class="modal-body ">
            <div class="panel panel-default">
               
                <div class="panel-heading">
                    <h3 class="panel-title"><?php echo $_SESSION["name"] ?> Says:</h3>
                </div>
                <div class="panel-body">
                    <!-- form tag was here -->
                    <div class="form-group">
                        <label for="comment">Comment:</label>
                        <div class="input-group col-md-12">
                            <textarea type="text" class="form-control" id="comment_data" name="comment_data" required autofocus ></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-5 col-md-5 pull-right">
                            <input id="user_id"type="text" name="user_id" style="display: none;" value="<?php echo $_SESSION['user_id']; ?>">
                            <input id="post_id" type="text" name="post_id" style="display: none;" value="<?php echo $_GET['id']; ?>">
                        </div>
                    </div>
                </div>
            </form>
                
            </div>
            <input id="PostComment" type="submit" value="Post" class="btn btn-success btn-lg btn-block" role="button">
        
     </div>
     <div class="modal-footer">
         <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
     </div>
 </div>
 
 </div>
 </div>
<!-- Modal end-->
		</div>
		<footer>
			<footer>
			<div id="footer">
				<div class="container">
					<div class="row">
						<div class="col-md-4 animate-box">
							<h3 class="section-title">About Us</h3>
							<p>Fitness Company is the Cape’s best in health and fitness.We offer the best of fitness world for you to GET FIT!</p>
						</div>

						<div class="col-md-4 animate-box">
							<h3 class="section-title">Our Address</h3>
							<ul class="contact-info">
								<li><i class="icon-map-marker"></i>Tel Aviv, Israel</li>
								<li><i class="icon-phone"></i>+ 1235 2355 98</li>
								<li><i class="icon-envelope"></i><a href="#">dorkedmy@gmail.com</a></li>
								<li><i class="icon-globe2"></i><a href="#">www.fitness.com</a></li>
							</ul>
						</div>
						<div class="col-md-4 animate-box">
							<h3 class="section-title">Drop us a line</h3>
							<form class="contact-form">
								<div class="form-group">
									<label for="name" class="sr-only">Name</label>
									<input type="name" class="form-control" id="name" placeholder="Name">
								</div>
								<div class="form-group">
									<label for="email" class="sr-only">Email</label>
									<input type="email" class="form-control" id="email" placeholder="Email">
								</div>
								<div class="form-group">
									<label for="message" class="sr-only">Message</label>
									<textarea class="form-control" id="message" rows="7" placeholder="Message"></textarea>
								</div>
								<div class="form-group">
									<input type="submit" id="btn-submit" class="btn btn-send-message btn-md" value="Send Message">
								</div>
							</form>
						</div>
					</div>
					<div class="row copy-right">
						<div class="col-md-6 col-md-offset-3 text-center">
							<p class="fh5co-social-icons">
								<a href="#"><i class="icon-twitter2"></i></a>
								<a href="#"><i class="icon-facebook2"></i></a>
								<a href="#"><i class="icon-instagram"></i></a>
								<a href="#"><i class="icon-dribbble2"></i></a>
								<a href="#"><i class="icon-youtube"></i></a>
							</p>
							<p>Created By Dor Kedmi</p>
						</div>
					</div>
				</div>
			</div>
		</footer>
	
	

	</div>
	<!-- END fh5co-page -->

	</div>
	<!-- END fh5co-wrapper -->
    
	<!-- jQuery -->


	<script src="/php/fitness/js/jquery.min.js"></script>
	<!-- jQuery Easing -->
	<script src="/php/fitness/js/jquery.easing.1.3.js"></script>
	<!-- Bootstrap -->
	<script src="/php/fitness/js/bootstrap.min.js"></script>
	<!-- Waypoints -->
	<script src="/php/fitness/js/jquery.waypoints.min.js"></script>
	<!-- Stellar -->
	<script src="/php/fitness/js/jquery.stellar.min.js"></script>
	<!-- Superfish -->
	<script src="/php/fitness/js/hoverIntent.js"></script>
	<script src="/php/fitness/js/superfish.js"></script>

	<!-- Main JS (Do not remove) -->
	<script src="/php/fitness/js/main.js"></script>
    <script src="/php/fitness/js/post.ajax.js"></script>
	</body>
</html>


