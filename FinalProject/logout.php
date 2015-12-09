<?php
// File: logout.php
// Copyright (C) 2012 WoodDuck Computer Consulting

include "./header.php";
get_globals();

close_session();

?>

<P>
<H3>You are now logged out.</H3>

<A HREF="./login.php"><BUTTON TYPE=button> Go to login page </BUTTON></A>

<?php
include "./footer.php";
?>
