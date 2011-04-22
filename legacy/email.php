<?php

error_reporting(E_ALL ^ E_NOTICE);

$my_email = "richie@wingtipmarketing.com";
$from_email = "";
$continue = "/";
$errors = array();

// Remove $_COOKIE elements from $_REQUEST.

if(count($_COOKIE)){foreach(array_keys($_COOKIE) as $value){unset($_REQUEST[$value]);}}

// Validate email field.

if(isset($_REQUEST['email']) && !empty($_REQUEST['email']))
{

$_REQUEST['email'] = trim($_REQUEST['email']);

if(substr_count($_REQUEST['email'],"@") != 1 || stristr($_REQUEST['email']," ") || stristr($_REQUEST['email'],"\\") || stristr($_REQUEST['email'],":")){$errors[] = "Email address is invalid";}else{$exploded_email = explode("@",$_REQUEST['email']);if(empty($exploded_email[0]) || strlen($exploded_email[0]) > 64 || empty($exploded_email[1])){$errors[] = "Email address is invalid";}else{if(substr_count($exploded_email[1],".") == 0){$errors[] = "Email address is invalid";}else{$exploded_domain = explode(".",$exploded_email[1]);if(in_array("",$exploded_domain)){$errors[] = "Email address is invalid";}else{foreach($exploded_domain as $value){if(strlen($value) > 63 || !preg_match('/^[a-z0-9-]+$/i',$value)){$errors[] = "Email address is invalid"; break;}}}}}}

}

// Check referrer is from same site.

if(!(isset($_SERVER['HTTP_REFERER']) && !empty($_SERVER['HTTP_REFERER']) && stristr($_SERVER['HTTP_REFERER'],$_SERVER['HTTP_HOST']))){$errors[] = "You must enable referrer logging to use the form";}

// Check for a blank form.

function recursive_array_check_blank($element_value)
{

global $set;

if(!is_array($element_value)){if(!empty($element_value)){$set = 1;}}
else
{

foreach($element_value as $value){if($set){break;} recursive_array_check_blank($value);}

}

}

recursive_array_check_blank($_REQUEST);

if(!$set){$errors[] = "You cannot send a blank form";}

unset($set);

// Display any errors and exit if errors exist.

if(count($errors)){foreach($errors as $value){print "$value<br>";} exit;}

if(!defined("PHP_EOL")){define("PHP_EOL", strtoupper(substr(PHP_OS,0,3) == "WIN") ? "\r\n" : "\n");}

// Build message.

function build_message($request_input){if(!isset($message_output)){$message_output ="";}if(!is_array($request_input)){$message_output = $request_input;}else{foreach($request_input as $key => $value){if(!empty($value)){if(!is_numeric($key)){$message_output .= str_replace("_"," ",ucfirst($key)).": ".build_message($value).PHP_EOL.PHP_EOL;}else{$message_output .= build_message($value).", ";}}}}return rtrim($message_output,", ");}

$message = build_message($_REQUEST);

$message = $message . PHP_EOL.PHP_EOL."-- ".PHP_EOL."Thanks for your interest.";

$message = stripslashes($message);

$subject = "Good meeting you!";

$subject = stripslashes($subject);

if($from_email)
{

$headers = "From: " . $from_email;
$headers .= PHP_EOL;

}
else
{

$from_name = "";

if(isset($_REQUEST['name']) && !empty($_REQUEST['name'])){$from_name = stripslashes($_REQUEST['name']);}

$headers = "From: {$from_name} <{$_REQUEST['email']}>";

}

mail($_REQUEST['email'],$subject,$message,$headers);

?>

<!doctype html>
<html lang="en">

	<head>
		<meta charset="utf-8"/>
		<meta name="description" content="Email Marketing Friends. As your full-service digital marketing agency, Wingtip Marketing is focused on partnerships with small and medium businesses, commitmented to growing, together." />
		<meta name="keywords" content="Email Wingtip Marketing Design Email Marketing Template Small Business Full Service Eblast Design Template E-blast Deployment Web Design Landing Page Design" />
		<meta name = "viewport" content = "initial-scale = 1, user-scalable = yes, width=device-width,  height=device-height"/>
		<link rel="shortcut icon" href="images/favicon.png" />
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png" />
		<title>Wingtip Marketing — Ten Four</title>
		<!--[if lt IE 9]>
			<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
		<link rel="stylesheet" media="all" href="./css/wingtip.css"/>
		<link rel="stylesheet" media="all" href="./css/fonts.css"/>
		<meta name="viewport" content="initial-scale=1.0, width=device-width, maximum-scale=1.0"/>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.2/jquery.min.js"></script>
		<script type="text/javascript">
		
		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-17382503-1']);
		  _gaq.push(['_setDomainName', '.wingtipmarketing.com']);
		  _gaq.push(['_trackPageview']);
		
		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();
		
		</script>

	</head>

	<body>
	
		<div id="messaging">
			<header>
				<h1>WINGTIP</h1>
				<h4>The New Old-Fashioned</h4>
			</header>
	 <h2 >Ten Four.</h2>
	 <h3 >We hear you, over and out.</h3>
	<p></p>
	 <hr style="background: none; border-top: 1px dotted rgba(40, 30, 0, 0.5); margin: 0px;"/>
 
	 <footer>
	  <a  href="tel:347.635.4373" style="text-decoration: none;">Call 347.635.4373</a><br />
	  <a  href="http://maps.google.com/maps/place?cid=8391176498626091929&q=Wingtip+Marketing,+217+Water+Street,+New+York,+NY+10038&hl=en&cd=2&ei=qIj9TPTLOZGQyQXWjbW7CA&dtab=0&sll=40.707544,-74.003284&sspn=0.006295,0.006295&ie=UTF8&ll=40.712638,-74.009914&spn=0,0&z=16" style="text-decoration: none;">Visit 217 Water Street, Suite 301. New York, NY 10038</a>
	</footer>

	</body>

</html>