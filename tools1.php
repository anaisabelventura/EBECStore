<?php
	ob_start();
	session_start();
	require_once 'dbconnect.php';

	// if session is not set this will redirect to login page
	if( !isset($_SESSION['user']) ) {
		header("Location: index.php");
		exit;
	}
	// select loggedin users detail
	$res=pg_query("SELECT * FROM ebec_shop_users WHERE userId=".$_SESSION['user']);
	$userRow=pg_fetch_array($res);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Loja EBEC Challenge Lisbon 2019</title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/shop-homepage.css" rel="stylesheet">

  <link rel="stylesheet" href="docsupport/prism.css">
  <!-- Jquery-->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
	<link rel="shortcut icon" href="img/BEST_icon_48.ico">
	<script src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.js"></script>
	<script type="text/javascript" src="js/jquery.countdown.min.js"></script>
	<script src='js/script.js'></script>
	<script src='js/cd.js'></script>
	<style type="text/css" media="all">
    /* fix rtl for demo */
    .chosen-rtl .chosen-drop { left: -9000px; }
	span.highlight {
		background-color: #5cb85c;
		border-radius: 3px;
	}
  </style>

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Loja EBEC Challenge Lisbon 2018</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li>
                        <a href="/EBECshop/home.php" target="_blank">Página Inicial</a>
                    </li>
					<li>
                        <a href="/EBECshop/tools.php" target="_blank">Tools 1</a>
                    </li>
					<li>
                        <a href="#"><u><b>Tools 2</b></u></a>
                    </li>
                </ul>
				<ul class="nav navbar-nav navbar-right">
                    <li>
                        <a href="logout.php?logout">Logout</a>
                    </li>
				</ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>

    <!-- Page Content -->
    <div class="container">
        <div class="col-md-12">
                <div class="row">
					<!------------------------------------FIRST Clock------------------------------------------------>
                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/screwdriver.jpg" alt="">
                            <div class="caption">
                                <h4><b>Screwdriver C</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect0" name="TeamSelect0" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start0" id="start0" onclick="initializeClock(15, 0, 'Screwdriver C')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock0" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[0]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="0TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(0)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List0" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add0" onclick="SetList(0)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/screwdriver.jpg" alt="">
                            <div class="caption">
                                <h4><b>Screwdriver D</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect1" name="TeamSelect1" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start1" id="start1" onclick="initializeClock(15, 1, 'Screwdriver D')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock1" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[1]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="1TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(1)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List1" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add1" onclick="SetList(1)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper A</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect2" name="TeamSelect2" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start2" id="start2" onclick="initializeClock(15, 2, 'Sand paper A')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock2" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[2]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="2TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(2)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List2" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add2" onclick="SetList(2)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper B</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect3" name="TeamSelect3" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start3" id="start3" onclick="initializeClock(15, 3, 'Sand Paper B')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock3" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[3]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>	
								<div class="row">
                                	<div class="col-sm-6">
										<select id="3TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(3)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List3" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add3" onclick="SetList(3)">Add</button>
									 </div>
                                </div>											
                            </div>
                        </div>
                    </div>

					<div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper C</h4></b>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect4" name="TeamSelect4" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start4" id="start4" onclick="initializeClock(15, 4, 'Sand Paper C')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock4" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[4]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="4TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(4)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List4" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add4" onclick="SetList(4)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper D</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect5" name="TeamSelect5" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start5" id="start5" onclick="initializeClock(15, 5, 'Sand paper D')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock5" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[5]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="5TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(5)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List5" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add5" onclick="SetList(5)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper E</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect6" name="TeamSelect6" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start6" id="start6" onclick="initializeClock(15, 6, 'Sand Paper E')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock6" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[6]=0;"  class="btn btn-danger">Reset</button></p>
                                	</div>
                                </div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="6TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(6)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List6" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add6" onclick="SetList(6)">Add</button>
									 </div>
                                </div>	
                            </div>
                        </div>
                    </div>

                    <div class="col-sm-3 col-lg-3 col-md-3">
                        <div class="thumbnail">
                            <img src="img/sandpaper.jpg" alt="">
                            <div class="caption">
                                <h4><b>Sand Paper F</b></h4>
                                <div class="row">
                                	<div class="col-sm-6 center">
                                		<p ><select id="TeamSelect7" name="TeamSelect7" style="width:100px; margin-top:5px; margin-left:12px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select></p>
                               		</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" name="start7" id="start7" onclick="initializeClock(15, 7, 'Sand Paper F')" class="btn btn-success">Start&nbsp;</button></p>
                                	</div>
                                </div>
                                <div class="row">
                                	<div class="col-sm-6 center">
										<p id="clock7" class="countdown">15:00</p>
                                	</div>
                                	<div class="col-sm-6 center">
                                		<p><button type="button" onclick="clocks[7]=0;"  class="btn btn-danger">Reset</button></p>
									</div>
								</div>
								<div class="row">
                                	<div class="col-sm-6">
										<select id="7TeamSelect" style="width:60px; margin-top:5px; margin-right:7px;" tabindex="1"" required>
											<option value="" selected disabled>Team</option>
										</select>
										<img src="img/arrow.png" height="18px" onclick="addtoList(7)" height="18px" alt="">
									 </div>
									 <div class="col-sm-6">
										<select id="List7" style="width:64px; margin-left:-35px; margin-top:5px; margin-right:10px;" tabindex="1"" required>
											<option value="" selected disabled>List</option>
										</select>
										<button type="button" id="Add7" onclick="SetList(7)">Add</button>
									 </div>
                                </div>	
							</div>
					   </div>
					</div>
				</div>
				
        </div>

	</div>
    <!-- /.container -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <!-- Custom Theme JavaScript---------------------------------------------------------------------------------------------------------
  ------------------------------------------------------------------------------------------------------------------------------------->
  <script src=https://sheets.googleapis.com/$discovery/rest?version=v4></script>
	<script type="text/javascript"
      src='https://www.google.com/jsapi?autoload={
        "modules":[{
        "name":"visualization",
        "version":"1"
        }]
      }'></script>

    <script>
	 SendRequest();
	 
	 function SendRequest() {
		  var queryString = encodeURIComponent('SELECT A, D');
		  //document.getElementById("demo").innerHTML = queryString;
		  var query = new google.visualization.Query(
			'https://docs.google.com/spreadsheets/d/1QqTUnwHrmkHEhQQHUXhO1Rt2J5_8RzF2c2sgXJDsHPg/gviz/tq?gid=1677008220&headers=1&tq=' + queryString);
		  query.send(handleQueryResponse);
		}

	 function handleQueryResponse(response) {
	  if (response.isError()) {
			alert('Error in query: ' + response.getMessage() + ' ' + response.getDetailedMessage());
			document.getElementById("demo").innerHTML = 'failed';
			return;
	  }
	  var data = response.getDataTable();
	  var rowInds = data.getSortedRows([{column: 0}]);
		for (var i = 0; i < rowInds.length; i++) {
		  if (!! data.getValue(rowInds[i], 1)){
			 var opt = document.createElement('option');
			 opt.value = data.getValue(rowInds[i], 1);
			 opt.text = data.getValue(rowInds[i], 1);
			 for (var j = 0; j < 8; j++) {
				var opt = document.createElement('option');
				opt.value = data.getValue(rowInds[i], 1);
				opt.text = data.getValue(rowInds[i], 1);
				var r = document.getElementById('TeamSelect' + j);
				r.add(opt);
			 }
			 for (var j = 0; j < 8; j++) {
				var opt = document.createElement('option');
				opt.value = data.getValue(rowInds[i], 1);
				opt.text = data.getValue(rowInds[i], 1);
				var r = document.getElementById(j + 'TeamSelect');
				r.add(opt);
			 }
		  }
		}
	 }


	 </script>

    <div class="container">

<script src='js/google-sheet.js'></script>
        <hr>

        <!-- Footer -->
        <footer>
            <div class="row">
                <div class="col-lg-12">
                    <p>Copyright &copy; BEST Lisboa 2017</p>
                </div>
            </div>
        </footer>

    </div>
    <!-- /.container -->

    <!-- jQuery -->
    <script src="js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
