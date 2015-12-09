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
include "./header.php";
?>

<div class="container">
    <div class="jumbotron">
        <h1>Log In</h1> 
    </div>
    <div class="row">
        <div class="col-sm-12" id="maincont">
            <FORM ACTION="./validate-login.php" METHOD="post">
				<TABLE>
					<tr><td>Use the credentials "Guest" and "guestpass" to access the anonymous guest account.
					Keep in mind this account cannot access all functionality.</td></tr>
					<TR><TD ALIGN=right>Username:</TD><TD><INPUT TYPE=text NAME="username"></TD>    </TR>
					<TR><TD ALIGN=right>Password:</TD><TD><INPUT TYPE=password NAME="password"></TD></TR>
				</TABLE>
				<INPUT TYPE=submit VALUE="  Login  "><P>
			</FORM>
        </div>
    </div>
</div>
<?php
include "./footer.php";
?>
</body>
</html>