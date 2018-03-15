<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Admin Dash Board</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="/php/fitness/dashBoard/assets/css/bootstrap.min.css" rel="stylesheet" />

    <!-- Animation library for notifications   -->
    <link href="/php/fitness/dashBoard/assets/css/animate.min.css" rel="stylesheet"/>

    <!--  Light Bootstrap Table core CSS    -->
    <link href="/php/fitness/dashBoard/assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet"/>
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'/>
    <link href="/php/fitness/dashBoard/assets/css/pe-icon-7-stroke.css" rel="stylesheet" />

</head>
<body>
<?php session_start();?>
<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="dashBoard/assets/img/sidebar-5.jpg">

    <!--
        data-color="blue | azure | green | orange | red | purple"
    -->

    	<div class="sidebar-wrapper">
            <div class="logo">
                <a href="login.php" class="simple-text">
                    FITNESS
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a>
                        <i class="pe-7s-graph"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-left">
                        <li>
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="fa fa-dashboard"></i>
                            </a>
                        </li>
                    </ul>

                    <ul class="nav navbar-nav navbar-right">
                        <li>
                           <a href="/php/fitness/index.php">
                               Home
                            </a>
                        </li>
                        <li>
                            <a href="/php/fitness/index.php?logout">
                                <p>Log out</p>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Users Table</h4>
                                <p class="category">Manage All Users</p>
                            </div>
                            <div class="content">
                                <form>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Select</th>
                                    	<th>First Name</th>
                                    	<th>Last Name</th>
                                    	<th>Email</th>
                                    	<th>Password</th>
                                    	<th>Gender</th>
                                    	<th>Plan ID</th>
                                    	<th>Profile Picture</th>
                                    </thead>
                                <tbody id="usersTable">
                                        
                                    </tbody>
                                                    <button type="submit" class="btn btn-info btn-fill pull-left">New User</button>
                                                    <button type="submit" class="btn btn-warning btn-fill pull-left">Update</button>
                                                    <button type="submit" class="btn btn-danger btn-fill pull-left">Delete</button>
                                                    
                                </table>
                                
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="card">

                            <div class="header">
                                <h4 class="title">Trainers Table</h4>
                                <p class="category">Manage All Trainers</p>
                            </div>
                            <div class="content">
                                <form>
                                <table class="table table-hover table-striped">
                                    <thead>
                                        <th>Select</th>
                                    	<th>First Name</th>
                                    	<th>Last Name</th>
                                    	<th>Email</th>
                                    	<th>Password</th>
                                    	<th>Gender</th>
                                    	<th>Experties</th>
                                    	<th>Lesson Price</th>
                                    	<th>Quotes</th>
                                    	<th>Profile Picture</th>
                                    </thead>
                                    <tbody id="trainersTable">
                                       <!-- fetch goes here -->
                                    </tbody> 
         
                                                    <button type="button" class="btn btn-info btn-fill pull-left">New Trainer</button>
                                                    <button type="submit" class="btn btn-warning btn-fill pull-left">Update</button>
                                                    <button type="button" class="btn btn-danger btn-fill pull-left">Delete</button>
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">
  Update
</button>


                                </table>
                                </form>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
            </div>
        </div>
 
</div>
 <form role="form" id="trainerform" onsubmit='return onUpdateTrainer(this)' enctype="multipart/form-data">
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="panel panel-default">
               
                <div class="panel-heading">
                    <h3 class="panel-title">Update Trainer Profile:</h3>
                </div>
                <div class="panel-body">
                   
                    <div class="form-group">
                        <label for="comment">first name:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tfirst_name" name="first_name" required autofocus >
                        </div>
                        <label for="comment">last name:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tlast_name" name="last_name" required autofocus >
                        </div>
                        <label for="comment">email:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Temail" name="email" required autofocus >
                        </div>
                        <label for="comment">password:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tpassword" name="password" required autofocus >
                        </div>
                        <label for="comment">gender:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tgender" name="gender" required autofocus >
                        </div>
                        <label for="comment">experties:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Texperties" name="experties" required autofocus >
                        </div>
                        <label for="comment">lesson price:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tlesson_price" name="lesson_price" required autofocus >
                        </div>
                        <label for="comment">plan leader:</label>
                        <div class="input-group col-md-12">
                            <input type="text" class="form-control" id="Tplan" name="plan_leader" required autofocus >
                        </div>
                        <label for="comment">quotes:</label>
                        <div class="input-group col-md-12">
                            <textarea type="text" class="form-control" id="Tquotes" name="quotes" required autofocus ></textarea>
                        </div>
                        <label for="comment">profile picture:</label>
                        <div class="input-group col-md-12">
                            <input type="file" class="form-control" id="Tprofile_picture" name="profile_picture" required autofocus >
                        </div>
                    </div>
                   
                    
                    <div class="row">
                        <div class="col-xs-5 col-md-5 pull-right">
                            <input id="trainer_id"type="text" name="id" style="display: none;" value="">
                            
                        </div>
                    </div>
                </div>
                 </form>        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
    </div>
<!-- Modal --> 
</body>

    <!--   Core JS Files   -->
    <script src="/php/fitness/dashBoard/assets/js/jquery.3.2.1.min.js" type="text/javascript"></script>
	<script src="/php/fitness/dashBoard/assets/js/bootstrap.min.js" type="text/javascript"></script>

	<!--  Charts Plugin -->
	<script src="/php/fitness/dashBoard/assets/js/chartist.min.js" type="text/javascript"></script>

    <!--  Notifications Plugin    -->
    <script src="/php/fitness/dashBoard/assets/js/bootstrap-notify.js" type="text/javascript"></script>

    <!--  Google Maps Plugin    -->
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>

    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
	<script src="/php/fitness/dashBoard/assets/js/light-bootstrap-dashboard.js?v=1.4.0" type="text/javascript"></script>

	<!-- Light Bootstrap Table DEMO methods, don't include it in your project! -->
   <script src="/php/fitness/js/dashboard.ajax.js" type="text/javascript"></script>
   

</html>
