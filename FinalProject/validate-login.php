<!DOCTYPE HTML>
<html>
 <head>
    <meta charset="UTF-8">
    <title>result</title>
    <link rel="stylesheet" type="text/css" href="styles.css">
    <link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>

    <!--
    Use these if there is no organic bootstrap
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
    -->

</head>
<body>
<?php
// File: validate-login.php
// Copyright (C) 2012 WoodDuck Computer Consulting

include "./header.php";
// Session globals get defined here

// Fetch username and password from the FORM POST data (once only)
$username  = $_POST['username'];
$password  = $_POST['password'];
if ($username == "" || $password == "")
	{
	echo "<H3>Sorry, you must supply non-null username and password.</H3>\n";
	die("<A HREF=\"./login.php\"><BUTTON TYPE=button> Try again </BUTTON></A>\n");
	}	
decho("Checking authentication of user '$username' with password '$password' ... <BR>");

// Try to authenticate to the database, die if fail
my_connect();
$sessionid = session_id();
decho("You have authenticated as user '$username'. Your sessionid is '$sessionid'.<BR>");

// That's all we need to do with the database on this page, so let go
my_disconnect();

// Determine our PHP session ID
$sessionid = session_id();

// Store username and password in the session array for later use (once only)
$_SESSION['username'] = $username;
$_SESSION['password'] = $password;
$_SESSION['debug']    = $debug;

?>

<div class="container">
    <div class="jumbotron">
        <h1>Log In</h1> 
    </div>
    <div class="row">
        <div class="col-sm-4" id="nav">
            <input type="button" class="btngold" onclick="location.href='./about.html';" value="About" />
            <input type="button" class="btngold" onclick="location.href='./create_student.html';" value="New Student" />
            <input type="button" class="btngold" onclick="location.href='./search.html';" value="Search" />
        </div>

        <div class="col-sm-8" id="maincont">
            <H3>You have logged in successfully.</H3>

            <input type="button" class="btngold" onclick="location.href='./home.php';" value="Proceed to your home page" />
			<input type="button" class="btngold" onclick="location.href='./logout.php';" value="Log Out" />
        </div>
    </div>
</div>
<?php
include "./footer.php";
?>
</body>
</html>



<P>
