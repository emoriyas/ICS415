<!DOCTYPE html>
<html lang="en">
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
    <?php
    include "./header.php";
    get_globals();
    ?>
</head>

<body>
<div class="container">
    <div class="jumbotron">
        <h1>Welcome to your Homepage!</h1> 
    </div>
    <div class="row">
        <div class="col-sm-4" id="nav">
            <input type="button" class="btngold" onclick="location.href='./home.php';" value="Home Page" />
            <input type="button" class="btngold" onclick="location.href='./about.html';" value="About" />
            <input type="button" class="btngold" onclick="location.href='./create_student.html';" value="New Student" />
            <input type="button" class="btngold" onclick="location.href='./create_review.html';" value="New Review" />
            <input type="button" class="btngold" onclick="location.href='./logout.php';" value="Log Out" />
        </div>
        
        <div class="col-sm-8" id="maincont">
            <h3>Welcome to Rate My Project Partner!</h3>
            
            <p>By Eric Moriyasu and Alexandra Minko-Flacco</p>


            <h3>From here, you may access any page. Try creating a student!</h3>

        </div>
    </div>
</div>
</body>
</html>