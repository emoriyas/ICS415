<?php
/*
 *  So far edited:
 *  show_client_list_all (changed it to call from student table but did not change the name yet)
 *
 */


// File: header.php
// Copyright (C) 2012 WoodDuck Computer Consulting
// This must be included at the very top of every page in the session group

// Init or continue the PHP session, done as the first thing on the page
session_start();

// Declare and set value of global $debug
include "./debug.php";

// Declare the global variables we want on every page
global $username, $password, $sessionid, $debug;

// The database connection is renewed on every page it is used
global $connection;

// Retrieve the session global variables we want on each page
// Note we re-connect on each page, so we don't store/retrieve $connection
// and sessionid is retrieved fresh with each call to get_globals()
function get_globals()
	{
	global $username, $password, $debug, $sessionid;
	$username  = $_SESSION['username'];
	$password  = $_SESSION['password'];
	$debug     = $_SESSION['debug'];
 	$sessionid = session_id();
	}

// Connect by authenticating to the MySQL database
// Call this on every page where you talk to the database
function my_connect() 
	{
	global $connection, $username, $password;
	decho("Opening connection ...<BR>\n");
	$connection = mysqli_connect('localhost', "$username", "$password", 'test');
	if (!$connection)
		{
		$error_msg = mysqli_connect_error();
		$epitaph = "user authentication failed: $error_msg";
		bail($epitaph);
		}
	}

// Disconnect from the database
// Call this on every page where you have connected
function my_disconnect()
	{
	global $connection;
	decho("Closing connection ...<BR>\n");
	mysqli_close($connection);
	}

// Try a (global) $query, returning the result in global $result
function try_query($query)
	{
	global $connection;
	decho("Query is: $query <BR>\n");
	$result = mysqli_query($connection, "$query");
	if (!$result)
		{
		$epitaph = "unhappy return status from the database";
		bail($epitaph);
		}
	return $result;
	}

// Display the output of a client SELECT query
// This function requires one arg: the result of a prior query
// Displayed columns are ordered:  First,Middle,Last,ID
function show_client_list_result($result)
	{
	echo "<TABLE BORDER=1 CELLPADDING=3 CELLSPACING=0>\n";
	echo "<TR>" .
			"<TH>First Name</TH>"   .
			"<TH>Middle Name</TH>"  .
			"<TH>Last Name</TH>"    .
			"<TH>Client<BR>ID</TH>" .
		"</TR>\n";
	while ($row = mysqli_fetch_array($result))
		{
		echo "<TR>" .
				"<TD>" . $row['FName'] . "</TD>" .
				"<TD>" . $row['MName'] . "</TD>" .
				"<TD>" . $row['LName'] . "</TD>" .
				"<TD>" . $row['ID'] .    "</TD>" .
			"</TR>\n";
		}
	echo "</TABLE>\n";
	}

// Show the complete client list, sorted by Last, then First, then Middle
function show_client_list_all()
	{
	$query = "SELECT SID,sname,school FROM Students ORDER BY sname";
	$result = try_query($query);
	show_client_list_result($result);
	}

// Display the output of a single-client query
// This requires an arg: the result of a prior query
// Return boolean status, based on whether there was a row to display
function show_client_result($result)
	{
	$row = mysqli_fetch_array($result);
	if (!$row)
		{
		return FALSE;
		}
	echo "<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=0>\n" .
		"<TR> <TH ALIGN=right>Client ID:</TH>  <TD>" . $row['ID']    . "</TD> </TR>\n" .
		"<TR> <TH ALIGN=right>First Name:</TH> <TD>" . $row['FName'] . "</TD> </TR>\n" .
		"<TR> <TH ALIGN=right>Middle Name:</TH><TD>" . $row['MName'] . "</TD> </TR>\n" .
		"<TR> <TH ALIGN=right>Last Name:</TH>  <TD>" . $row['LName'] . "</TD> </TR>\n" .
		"</TABLE>\n";
	return TRUE;
	}

// Display the output of a single-client query as an editable form, with hidden ID
// Return boolean status, based on whether there was a row to display
function show_client_edit_form($result)
	{
	$row = mysqli_fetch_array($result);
	if (!$row)
		{
		return FALSE;
		}
	echo "<TABLE BORDER=0 CELLPADDING=3 CELLSPACING=0>\n" .
		"<TR> <TH ALIGN=right>Client ID:</TH>  <TD>" .                                          $row['ID']    . "   </TD> </TR>\n" .
		"<TR> <TH ALIGN=right>First Name:</TH> <TD>" . "<INPUT TYPE=text NAME=FName VALUE=\"" . $row['FName'] . "\"></TD> </TR>\n" .
		"<TR> <TH ALIGN=right>Middle Name:</TH><TD>" . "<INPUT TYPE=text NAME=MName VALUE=\"" . $row['MName'] . "\"></TD> </TR>\n" .
		"<TR> <TH ALIGN=right>Last Name:</TH>  <TD>" . "<INPUT TYPE=text NAME=LName VALUE=\"" . $row['LName'] . "\"></TD> </TR>\n" .
		"</TABLE>\n";
	echo "<INPUT TYPE=hidden NAME=ID VALUE=\""  . $row['ID'] . "\">\n";
	return TRUE;
	}

// Close the PHP session -- do this last, after we're through
function close_session()
	{
	decho("Closing session ...<BR>\n");
	session_unset();
	session_destroy();
	}

// This combines all the steps needed to close up shop on a failure
function bail($epitaph)
	{
	my_disconnect();
	close_session();
	echo "\n<P>Sorry, your session has been closed due to an error. " .
		"<A HREF=\"./login.php\"><BUTTON TYPE=button> Login again </BUTTON></A>\n";
	die("\n<P>\n(Fatal: " . $epitaph . ")\n</BODY></HTML>\n");
	}

// Emit a debug string, if $debug != "FALSE"
function decho($msg)
	{
	global $debug;
	if ($debug != "FALSE")
		{
		echo "\n*DEBUG = '$debug'* $msg\n";
		}
	}

// Emit the common top-o'-the-page HTML code
?>
<!DOCTYPE html>
<HTML>
<HEAD>
  <TITLE>Session Test Suite</TITLE>
  <META HTTP-EQUIV=\"Content-Type\" CONTENT=\"text/html; charset=UTF-8\">
</HEAD>
<BODY>
<!-- Banners, images, headings, stylesheet code, etc. goes here -->

<?php
// End of header.php
?>
