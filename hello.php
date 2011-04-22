<?php

	error_reporting(E_ALL);

	$message = NULL;

	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		$message = "<h3>" . sendEmail($_POST['email']) . "</h3>\n";
	}
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
		<title>Wingtip Marketing - Just Met!</title>
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
	 <h2 >Just met!</h2>
	 <h3 >Thanks for your interest.</h3>
						<form class="form-h1" method="post">
							<fieldset>
								<legend><span>		<?php echo $message ?></span></legend>
								<dl>
									<dd><input class="text" type="text" name="email" value="Email Address" onfocus="this.value =''" placeholder="Email Address" /></dd>
									<dd><input class="text" type="text" name="name" value="Full Name" onfocus="this.value =''" placeholder="Full Name" /></dd>	
									<dd><input class="text" type="text" name="phone" value="Phone Number" onfocus="this.value =''" placeholder="Phone Number" /></dd>
									<dd><input class="button" type="submit" name="" value="Send" id="submit" /></dd>
								</dl>
							</fieldset>
						</form>
		</div>
	</body>

</html>
<?php

function sendEmail($email)
{
	// This pattern will match email addresses
	$pattern = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/i";
	if (preg_match($pattern, trim($email)))
	{
		// Remove leading and trailing whitespace
		$to = trim($email);
	}
	else
	{
		// Return an error message so the user knows what went wrong
		return "The email address you entered was invalid. Please try again!";
	}

	$subject = "Thanks for your interest.";
	$attachment = chunk_split(base64_encode(file_get_contents("WingtipMarketing.vcf")));
	// Generate a random boundary string
	$mime_boundary = '_x'.sha1(time()).'x';

	// Using the heredoc syntax to declare the headers
	$headers = <<<HEADERS
From: Richie Lokay <richie@wingtipmarketing.com>
MIME-Version: 1.0
Content-Type: multipart/alternative;
 boundary="==PHP-alt$mime_boundary"
HEADERS;

	// Use our boundary string to create plain text and HTML versions
	$message = <<<MESSAGE

--==PHP-alt$mime_boundary
Content-Type: text/plain; charset="iso-8859-1"
Content-Transfer-Encoding: 7bit

WINGTIP
The New Old-Fashioned

Buddies!
Thanks for your interest.

Recently, we spoke and promised I'd shoot you my contact information. 

--
Call 347.635.4373
Visit 217 Water Street, Suite 301. New York, NY 10038

--==PHP-alt$mime_boundary
Content-Type: text/html; charset=ISO_8859-1\r\n

<html style="margin: 0; padding: 0;">
     <head>
     
     <style type="text/css">
     a:hover { color: #3f78c6 !important; }
     a:active .button td { background-color: #bbb !important; }
    span.amp { 
    font-family: Baskerville, Palatino, Constantia, "Book Antiqua", "URW Palladio L", serif;
    font-style: italic; font-size: 110%;
    }
     /* Not to be inlined */
     @media only screen and (max-device-width: 480px) {
          .page {
               padding: 0px 10px 5px 10px !important;
               margin: 0px 10px 10px !important;
          }
          body {
               padding:  0 10px  !important;
          }
          #header {
               font-size: 16px !important;
          }
          .headline {
               font-size: 20px !important;
          }
          #screenshot {
               width: 275px;
               height: 190px;
          }
          p {
               font-size: 10px;
          }

     }
     </style>
     <META NAME="ROBOTS" CONTENT="NOINDEX,NOFOLLOW">
</head>
     
     <body  style="margin: 0; padding: 0; color: #333; background: #dde8f6 url(http://wingtipmarketing.com/images/WT_bkgblue.png) repeat top left; text-rendering: optimizeLegibility; -webkit-text-size-adjust: none; line-height: 1.25; font-weight: 400;">
     
          <!-- Summary Text. Shows up on iPhone / Gmail. -->
     
          <span style="display: none;">Recently, we spoke and promised I&#8217;d shoot you my contact information.  Read on.</span>
          <!-- The Page -->
          <div class="page" style="-webkit-border-bottom-left-radius: 10px; -moz-border-radius-bottomleft: 10px; border-bottom-left-radius: 10px; -webkit-border-bottom-right-radius: 10px; -moz-border-radius-bottomright: 10px; border-bottom-r-radius: 10px;  -webkit-box-shadow: rgba(0,0,0,.4) 0 3px 10px; clear: both; margin: 0px; background: white 16px; border: 0px; font: 14px/19px Helvetica, sans-serif; padding: 0px 20px; margin: 0 20px;">

               <!-- Headline / Subhead -->
			<div id="header" style="
				background: #270d0a url(http://wingtipmarketing.com/images/WT_bkgbrown.png) repeat top left; width: 275px; color: #ffffff; text-align: center; padding: 2em 0 1em; -webkit-border-bottom-left-radius: 8px; -moz-border-radius-bottomleft: 8px; border-bottom-left-radius: 8px; -webkit-border-bottom-right-radius: 8px; -moz-border-radius-bottomright: 8px; border-bottom-r-radius: 8px; font-size: 100%; font-weight: 500; text-rendering: optimizeLegibility; ">
				<h1 style="letter-spacing: -0px; font-family:  Impact, Helvetica, Arial, Verdana, sans-serif; font-size: 50px; line-height: 1; text-shadow: rgba(0, 0, 0, .4) 1px 2px 2px; font-weight: 400;  margin: 0 0 3px; padding: 0; ">WINGTIP</h1>
				<h4 style="font-size: 14px; letter-spacing: 1px; color: #ffffff; font-style: italic; text-shadow: rgba(0, 0, 0, .4) 1px 2px 2px; font-weight: 500; font-family: Georgia, Times, serif; margin: 0; padding: 0;">The New Old-Fashioned</h4>
			</div>
               
               <!-- Body -->
               
			<h2 style="	letter-spacing: -1px; letter-spacing: -2px; font-style: italic; font-size: 62px; line-height: 1; margin-top: .5em; color: #9d4149; font-family: Georgia, Times, serif; font-weight: 400; margin: 20px 0 0; padding: 0; ">Buddies!</h2>
			<h3 style="font-size: 32px; color: #302b25; font-weight: 400;  margin: 0; padding: 0; font-family: Georgia, Times, serif; line-height: 1.1">Recently we spoke and I shot you my contact information.</h3>
			 <p style="	color: #857667; font-size: 18px; margin: 5px 0; line-height: 1.5; font-family: Georgia, Times, serif;"> While I have you here, perhaps you'd like a look around. Lately, we just finished the following interface and <a href="http://sproutandpea.com" style="color: #6a8012; font-family: Georgia, serif; font-style: italic; font-weight: 500; text-decoration: underline;" alt="Strategic ">web design</a> project for an affiliate group <a href="http://markettraq.com" style="color: #6a8012; font-family: Georgia, serif; font-style: italic; font-weight: 500; text-decoration: underline;">Endai Worldwide</a>. Interested? Shoot me an <a href="mailto:richie@wingtipmarketing.com" style="color: #6a8012; font-family: Georgia, serif; font-style: italic; font-weight: 500; text-decoration: underline;">email</a>, we'd love to talk about other exciting technologies and future.</p>
			 <hr style="background: none; border-top: 1px dotted rgba(40, 30, 0, 0.5); margin: 0px;"/>
			<div id="footer" style=" margin: 0; padding: 0 0 10px;  color: #270d0a; font-size: 10px; text-align:center; margin: 8px 0; line-height: 1.5;">
				<a  href="tel:347.635.4373" style="text-decoration: none; color: #6a8012; font-family: Georgia, serif; font-style: italic; font-weight: 500; text-decoration: none">Call 347.635.4373</a><br />
				<a  href="http://maps.google.com/maps/place?cid=8391176498626091929&q=Wingtip+Marketing,+217+Water+Street,+New+York,+NY+10038&hl=en&cd=2&ei=qIj9TPTLOZGQyQXWjbW7CA&dtab=0&sll=40.707544,-74.003284&sspn=0.006295,0.006295&ie=UTF8&ll=40.712638,-74.009914&spn=0,0&z=16" style="text-decoration: none; color: #6a8012; font-family: Georgia, serif; font-style: italic; font-weight: 500; text-decoration: none" >Visit 217 Water Street, Suite 301. New York, NY 10038</a>
			</div>
		</div>
          </div> <!-- End The Page -->

          
          <!-- End -->
          
     </body>
</html>

--==PHP-alt$mime_boundary--

--==PHP-mixed-$mime_boundary
Content-Disposition: attachment;
	filename=WingtipMarketing.vcf
Content-Type: text/directory;
	x-unix-mode=0644;
	name="WingtipMarketing.vcf"
Content-Transfer-Encoding: quoted-printable

BEGIN:VCARD=0D=0AVERSION:3.0=0D=0AN:Lokay;Richie;;;=0D=0AFN:Wingtip=20=
Marketing=0D=0AORG:Wingtip=20Marketing;=0D=0ATITLE:Driving=20Force\,=20=
Enthusiast\,=20Technologist=0D=0A=
EMAIL;type=3DINTERNET;type=3DWORK;type=3Dpref:richie@wingtipmarketing.com=0D=
=0ATEL;type=3DWORK;type=3Dpref:347-635-4373=0D=0A=
item1.ADR;type=3DWORK;type=3Dpref:;;217=20Water=20St=20Third=20Fl;New=20=
York;NY;10038;USA=0D=0Aitem1.X-ABADR:us=0D=0A=
item2.URL;type=3Dpref:wingtipmarketing.com=0D=0A=
item2.X-ABLabel:_$!<HomePage>!$_=0D=0ABDAY;value=3Ddate:1981-02-25=0D=0A=
item3.X-JABBER;type=3Dpref:richielokay=0D=0Aitem3.X-ABLabel:skype=0D=0A=
PHOTO;BASE64:=0D=0A=20=20=
/9j/4AAQSkZJRgABAQAAAQABAAD/2wBDAAICAgICAQICAgICAgIDAwYEAwMDAwcFBQQGCAcICA=
gH=0A=20=20=
CAgJCg0LCQkMCggICw8LDA0ODg4OCQsQEQ8OEQ0ODg7/2wBDAQICAgMDAwYEBAYOCQgJDg4ODg=
4O=0A=20=20=
Dg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg4ODg7/wAARCAELAQsDAS=
IA=0A=20=20=
AhEBAxEB/8QAHwAAAQUBAQEBAQEAAAAAAAAAAAECAwQFBgcICQoL/8QAtRAAAgEDAwIEAwUFBA=
QA=0A=20=20=
AAF9AQIDAAQRBRIhMUEGE1FhByJxFDKBkaEII0KxwRVS0fAkM2JyggkKFhcYGRolJicoKSo0NT=
Y3=0A=20=20=
ODk6Q0RFRkdISUpTVFVWV1hZWmNkZWZnaGlqc3R1dnd4eXqDhIWGh4iJipKTlJWWl5iZmqKjpK=
Wm=0A=20=20=
p6ipqrKztLW2t7i5usLDxMXGx8jJytLT1NXW19jZ2uHi4+Tl5ufo6erx8vP09fb3+Pn6/8QAHw=
EA=0A=20=20=
AwEBAQEBAQEBAQAAAAAAAAECAwQFBgcICQoL/8QAtREAAgECBAQDBAcFBAQAAQJ3AAECAxEEBS=
Ex=0A=20=20=
BhJBUQdhcRMiMoEIFEKRobHBCSMzUvAVYnLRChYkNOEl8RcYGRomJygpKjU2Nzg5OkNERUZHSE=
lK=0A=20=20=
U1RVVldYWVpjZGVmZ2hpanN0dXZ3eHl6goOEhYaHiImKkpOUlZaXmJmaoqOkpaanqKmqsrO0tb=
a3=0A=20=20=
uLm6wsPExcbHyMnK0tPU1dbX2Nna4uPk5ebn6Onq8vP09fb3+Pn6/9oADAMBAAIRAxEAPwD+f+=
ii=0A=20=20=
igAooooA/Vr4LSyf8MqeCUL4X+z1A/FmFfn78ars3f7TXi1hyFu/Lz9ABX3t8GmA/Zd8FIr4b+=
zh=0A=20=20=
n8WNfnR8SZzc/HfxVOTktqMn6HFAHEn75+tbnh9Hm8baLCg3M17EpH1cVhV2nw/t/tXxo8Lwf3=
tQ=0A=20=20=
j/8AQs/0oA9w/ami8r46aTIkXkhtIjH12jbXqP7DfhuTWPiT4nuRtRIbVV3Ou4KeoOK5H9rSDb=
4z=0A=20=20=
8MTFY97WrhcdSM17l/wTyjU6z4zkbOP3Y/SgD9RvhN8MfBWkeKYdYtvDejpq6S+aty8ONjnq6o=
3y=0A=20=20=
Bz/f6196aSjLZKyvgtg/6vNfLfgu12os0UkiYIAA6GvpLRZZIo0E3m7CBj60GbPVNHhnleNJCp=
iA=0A=20=20=
yS4wM13iIDb7Zgj56Belch4TWRhLPJs+7hc9a7brVNgVhaQqzfu0+bqK5bXtMkaydoGjQH+L09=
q7=0A=20=20=
KsvVUaSx2jf1zgd6EwPlPxdpbxXcoZBtZcnA6mvlzx2Xj1xhLHMyqFEiHoV7GvuvXdLXUDJuiN=
vG=0A=20=20=
oJcHua+IviyYdN12TCshx8pTqaYH5c/tVNDq2rfYYIY5rmMebb5Xc24DO0f3ScfL7ivlXTL+6t=
PB=0A=20=20=
9jod9MkWswasjfatyMzCT5j5hPOMfK3vVv8AaQ8SeILP9pDVLB2k+yIFe0Mh2lec7wf0ryvRtZ=
XU=0A=20=20=
xPcSLcSXUVsJbq7nd2VGGVUEj+HnFAHnfipbU/EDVnsoxbWr3DtHEuPl+Y8cdv6VzTffPJP1qz=
eq=0A=20=20=
6anOjsHcSNlhnB5681VqDRBRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAfp/8IWX/h=
l7=0A=20=20=
wczvhU0vP45avze8UTtc/ETW52OWe+lJ/wC+zX6M/CxvK/ZG8MSb8bdJLfkHP9K/NXUpPO8RX8=
uc=0A=20=20=
77h2/NiaAKVeo/By2Nz+0p4PTO7GoKxH0BNeXV7X+z9bG6/aj8OjtGXl/wC+R/8AXoA92/avyt=
74=0A=20=20=
bkZzFHLDKm3Z1Od1fTX/AAT68KpB8PL/AFe6mMEmqXhRUI6IvAavHv2jvCc2u/CBdWt0kM2lu0=
xx=0A=20=20=
0K4w3+Neh/soy/EiX4G6Uuj28NpYQOwi+0LhbpSf73aghn7u+EvBipYW7WiRzBsHeetes6Vo4i=
v8=0A=20=20=
XGBs5VhX5CXHxN+IGnXS2+veP/DXhuyVhtjk8QeXCCpxh/McBv8AgIr6Y8BeNPiB/Ydpe2fiG3=
8X=0A=20=20=
6Wjhpf7LukumZW5wu2VpB/3yBVoR+lmjWaW1u7I27cetbleN+CfiPZa94csmingLyYRh2Qjja3=
T5=0A=20=20=
q9HvtYgsoHeU7flyEkT9aTVwN2o5Y1liZG6EV8bfE749614eE8Og32lm7BOFNv52B2yvQfU149=
of=0A=20=20=
xu/anvYU1U+FNL1vw4ZMLdWBgcqP4siNxRqB906xbpaO2DG0e0gg1+fP7RlskWpwiIiMtIB+DV=
6S=0A=20=20=
3xW8carNcX134Yv2lO39yimMqV6nOTn6ZrwP4p+NJPFPiPT7OTTLuymQjfJJC8SvznYcfxVQH4=
3/=0A=20=20=
ALWWm2N58WtI1OLUIoJvL8mWJzHkgMTuGPm6DvXzF4Wu5o7LVLWG3jnscrcXJZ/LYpE24Jv9Ce=
1f=0A=20=20=
SX7Wnw+u9D/aJgewt5potQhaQvcTSSHOc7N0nCgA8Bai8G/s0+MW/Yu8efGDWrs6P4XsdKZ0i+=
zZ=0A=20=20=
uLttwAVWP3EzjJP3qQHxlqM4uddu7gRxRCWUuEiOVXPOBVKpZf8Aj5fIwc9Cc1FUGiCiiigAoo=
oo=0A=20=20=
AKKKKACiiigAooooAKKKKACiiigAooooA+7fhJ47sbn9ka/0q91HTINR02zmigt2l2SbFVirY/=
iP=0A=20=20=
NfC0pJuXY7sk5ORg816I/wAP9Yt/glZ+OzPaSaVM/lbFl2zKd2OncV51J/rm6Yz2GKAGV9D/AL=
M9=0A=20=20=
sZf2lrKbtDaTP+mK+eK9y+BfjbQfA3xPn1bxA8yW7WTwxvArs4ZiOoHagD78+KVzFZfs+eJp5/=
Md=0A=20=20=
BZNGERdpO/5evfnFfaH7G/g/7T+w94Z0maCeLUfsrKXZE3Rb87cSH73+7X56+OfiH4H8afs461=
Bo=0A=20=20=
+s6ddXFwqQrAZVhaNi4G5lbkgDJ5r9cP2YZbXS/g54Wt7cCTyLOIQ4wAp2j95x2PX8atGZ4N4r=
/Z=0A=20=20=
M0/xHouraLfE3Gsz3TSXWqXLBrhMnCquSzKgHTYoFfdXwW8FaH8Of2erDwz4njuPGGuth7jU76=
Ue=0A=20=20=
aojAWMB9gkAVccqMV63N4dvNcAe4isDGyZWWeIOceoK8rXnurafpWm/aVilfUJVUqkKO0UIYer=
/f=0A=20=20=
Y+3SgDktEu57r9pkGyW3s7Yrlo4ZS6HacB2YgFyfUivcfiNrt02hx2ED7ZW2x5A8twW4GPSvnL=
4b=0A=20=20=
XEk37QEtxN+7UERhREBtX8OK918fR/bLgBfLVV+dHPcr2oA828Q/DjwH4h+FOqabcwhtVlsZIb=
Wa=0A=20=20=
5/eReewyZJSnzk54z0FfOH7NX7NfifSvGN9c+MbePTfCGltOtlfaTHc217dySNndJIsh3beinY=
FC=0A=20=20=
8ENmvt/w1Y2mr6JD/aVuLO/LEI4G9W9yK9Tg0+4gshbGWeSzCj5LQoq/Ug9KYHzJ4e8E+MLb4t=
XK=0A=20=20=
3EtzrWg5P2G8wqXgTv5qLgMPfFW/i94b0ufwOS9sPtsbriZ4tpjx3Jr6u0aytIIi0UCiZ/vTS4=
dm=0A=20=20=
/wBnI6V4r8akht/Cd+fMlaF4iGVmyM/WkB+B/wC0foF948/bY+FnhHSbG9ea+1CNL1bG3eWYQ7=
wC=0A=20=20=
ykdARnPvX2D/AMFErXSfhN/wSj0Lwl4YjFlBqM0WlvbRE58hDuJbPOcjn3rZ+DnhW48X/wDBRK=
DW=0A=20=20=
NPuVjOhWXyjf8qSNnDv/AHgo/h7V8+f8FT/GBTwb4Y8BXN5Fc6nFcvcSJBNu2qp+8R/tE0wPwz=
ky=0A=20=20=
Zmz1pR0FJJnzmB6554pQV2jKE1maIYeppKU8seMUlABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFA=
BR=0A=20=20=
RRQB2dx40128+Gen+FJJ0Gj2hYxRJHgksc5Y9641vvnp+FJRQAUUVKn3z9KAHo0gTIJG3n/Cv6=
MP=0A=20=20=
+CffihfF37OGkXt4yPeQKIGBlz/q/l6dq/nJH3xX7C/8EyfGt1BrGp+FFcmNbrzI1ZtwBPPSgD=
+g=0A=20=20=
tdV0220c2+oT+RbhN0hxyB2ArxXxp4x0bT0t9KsNFvJ7u7J8mS4kwv8AvVVm8RQ3moWct3c2rK=
05=0A=20=20=
hhtUbaqsCRvYdmrzz4n6jFJFFPbXTreWzLtK/MuW4wV7/WrRmdP8INHvNV+Lt5eJAq2y5TzAmV=
PP=0A=20=20=
zYNey+P9Lu9OunuiFZFUYYDAI9K5H9nnxp4f+xTaDftb6VrEC/uo5G2LcAn7yH+I16n4+8ZaPP=
pt=0A=20=20=
3pVlC+oXMQzPOvyQRj0L+vtQBz/g7xfpEF9b6dqejTLLMP3Tou7DfSvd9O1CwvoStlIrBfvxlc=
Mv=0A=20=20=
sRXzL4cvdKbW7a8uZLeW6ClLeMfdh/vMfevSnuVvXhubC5a31NfuXBk2MQOzD+NP9mgD2BkAU+=
WE=0A=20=20=
R8dT6V8gftF6/wD2N4Uumnkg8jY+7f1xtOMV9AaT4vF5aPb3bRw6nEmZUH/LUf3k/wBmvz8/bL=
19=0A=20=20=
1+HFzNLNElryssneIeooQHyb8Mv2tPhP+z98PPGWt68LvxB8TdYvnfTNFto3yY0G1Hlkb93Gme=
/W=0A=20=20=
vyi+O/xQ8Q/GP4u+IvH/AIhCw3l9IXWAfcgUH5UT1FWviPfpd/FieGOW4nSG3Ur537xwP9kfwi=
vM=0A=20=20=
/ESSDwzeSKn7vZhm9TmoYHkL5EhByDnvUq/cFRH/AFp+tWwhEG5ulBoio33zTalZcrkdO1IOn3=
M+=0A=20=20=
9AEdFObtxim0AFFFFABRRRQAUUUUAFFFFABRRRQAUUUUAFFFFABRRRQAV9c/scfFOP4X/tdaLd=
39=0A=20=20=
39k0q9dY5n3bQrA5Uk/mK+RqtW80kN1FMhO6NgwLdBg5FAH9f138KdH+Ilra+LfD+utZRajGtx=
bC=0A=20=20=
JxJGk5GQG287ScV49psHiWT4kR+EfEHhGbX9QmuDG8llfKjI6joUmC7N3qGNfI//AAT/AP2o9W=
8R=0A=20=20=
eDpfAes38V3rFnJHLawSN5QCg4bD9+O1fa/xok1CXxFo3jrwxdy6ZrNncxzCSL93+8Vvuv8A9M=
z0=0A=20=20=
P1q0ZndeHfD/AIWtfE9u3ibw5rOlWMThYo5LFpjGyHldykjB9QTXqd3oXgC+vNSu7LXr8aVdKF=
Sz=0A=20=20=
tLGRkhb2Pep/hr8cNC8QaGs/imG00PXJVLXEUUUgTOcBBlNshxzuB6V79peraFfadu0q+06e3U=
tu=0A=20=20=
W3dMZ9SOMflRcDwltM0iz8PxL4b8MeJb2WNfLRo9OZUZj1LFnAz+FeW+K/EPjPRU020Hhe+0v+=
0o=0A=20=20=
mS2ubq6iTyyDja21mIc/wrjpX1xrninw9oujz32p63bW9rFgvi4XKg8cBeTmvAofGNh8T/i9pV=
lp=0A=20=20=
9hjw/oshullniKvPIBt6H+HvQA7QfCOuaPqllqus6pLcyW9qz3O58Ab1/wBX0HT6Cvzx/av8Y2=
l5=0A=20=20=
aS6fKtvcQpdmTy5ZPlmVD8y/XFfd37RXxAXwl8PJDbzy2moX90IogeFlbbgY9lzzX4F/tXfGm2=
mR=0A=20=20=
9E0nUbfUbss0UixvwnGHaQD5up+XHFMD5A1K+ttd+MXiTULOGa3tZbkiOJuCg54zWX4ki2eCrl=
uT=0A=20=20=
gqOWz39ayPCbJ5tyXIYttwZJK2PGEvl+EJk+X94yr8pyKzA8dK5djnvW5HbldFibzHZ2PCj0rE=
yc=0A=20=20=
k+oIrsFhRdHiR0jLFBjNBojmpI2iJwh2n1ppQqgJ4rUkjQYQpHkf7FQND+8b5eOyCP8AWrRmZL=
Jm=0A=20=20=
Qmm7PetCSEed8zeZx8oxiqLIVbJQ/SmaIiIwxFJTiDn0pveswCiiigAooooAKKKKACiiigAooo=
oA=0A=20=20=
KKKKACiiigAp4fAxTR1FL/y0oA9d+D/xD1H4Z/GDTPFVgl1KLdgZoYGKl1ByRn0Nf0k/DX4iaJ=
8T=0A=20=20=
/wBnzRtf054tQhu4ke5Dt+7ww+6R/ER93Nfy6afqE1nbzxJ5TwzJiWOYfIff61+oX7DPxeSy8N=
f8=0A=20=20=
INrGo28rR3Pm20M0rwyRw7uUVh1Ddce1WjM/cDwp4E8KusM0eryadJG2545cXCD/AGQV5Fe6aZ=
o/=0A=20=20=
hVdONm+n6VO5jOLmOQliOvflT9a+f/DOqSatZwyaalpa28uQSELEhfQGvWdM8D3t1HE9vFGhnL=
NJ=0A=20=20=
NO7xSSjbjauOgoAh8YfDTRdRTzNK/s+0MsY3Sz3fnNF7qn9areC/Dtn4US4hhZXmf/XXU3VyB8=
qn=0A=20=20=
/Zz0pNba78IabDFqBQRvGVUxzFlAHoT/ABetfMHxQ+Pln4R8FarcW+oK80/+jx28CtO7yfw+Wq=
8n=0A=20=20=
c3BHamB8v/tYfFDWtV+NCeGdH3S6jakxeS0zr++Ztoyo4PBNfh58WbDV9L+PWu2OtRxpexz5Yx=
xF=0A=20=20=
V2444PNfuX4K+Gt7cW+peOPFCtd+KdRHmqsu5jZRtztQtzuPQ59K+Hf2oPgNfeKPidba7o8lvZ=
3c=0A=20=20=
iGJxMhCzMBwGZeE9NzUAfCXhSELpzTFMljgHy6u+Mc/8Ir8/DeauOMV01p4X17w7byW+paVqFh=
cx=0A=20=20=
ttK3CNjgH7rLwR7iuY8ZZ/4RZcowPmr1JJ/XmgDykj5vrmu+kCx6bAkjycoMY+lcKM+auOBk5/=
Ou=0A=20=20=
7uI42tkl/dkLGBy+KAMG5QBsosjbW3Z9c0roFjQSRyJuH3t+M1ZmtvNMiJIjLgEq0nAq0I082L=
Ih=0A=20=20=
+Tnht36UgMS4hAiyOV7ZkrJkQIeCmT6nNdNPHGSXCAtnHEWM1mTQbNyfu/XBGKYGE+RIc4/Coj=
1N=0A=20=20=
WpVZiD+6/wCA9aqtkOc5zWZohKKcegptABRRRQAUUUUAFFFFABRRRQAUUUUAFFKAS2K6nQ/DOu=
eI=0A=20=20=
biO30fSby/fO0vCmQCemT2FAHLD71dJoOhX+v6tBY2cbncw8yXy8pGvfc3b2FeyeBPhTYX3iZ/=
8A=0A=20=20=
hIr6ykggbb5EE7J57D7wyfvAf7NfQtn4fOhsNPs7ezXSkO6OC2OIifdern3etEB51ovwp8Iafp=
Jl=0A=20=20=
e0vNbvlhH73UcxRKR1KxoASfdmq5a/BvxjonxITU/AxjuJIpYpotKvMRpMT820kkqw9CTla980=
PT=0A=20=20=
/wC0Jrq1ZAYTCGVFkUlMfe+VeB+Fe2+C4rbUNKt2g2jVbI52OMSsoHVfagzO9+A/7WepaVpJ0D=
4q=0A=20=20=
eH7zwPqVmcNLeQSxpMN2xI4Wb5Xzydw4GM96+vLP9sTwtDK7S+JLJ9OjZdrbsO69CgUdOMVp+E=
PB=0A=20=20=
Hhj4g/C+xk1nR9I1OeOP71zEjkcdBmtqf4NfDiHQ2gm8D+Gp4FZH8p7OOJwV+6R/epAeK/ED9q=
G9=0A=20=20=
8ZvDpvw+0rV/FN1cThFgS0yVY8fe7DFcV8PPgp4rn+LFz46+JEclrI0ofTtDWYvFa5HLsG+XLV=
+h=0A=20=20=
HhDw/wCENF8BPd6VpGl6RbxDJFtaRI+f9or82a56SS31bV1jyWCuXJPQn8aYHlU+nCJY1xKTyp=
Qg=0A=20=20=
BT9McV4d8VfC9ha+BrjVbsQkRjMG/rK3oK+i/GV3p/hq3n1HVLq2tLOJQ0jSNleOmP7xP93tX5=
/f=0A=20=20=
ET4mar8RvFMaQq1joVpIRZ2wbIA7yMfU0gPEteCPpF8WQoDGSE++Gwecp/WvlnV/hK/xBOpJ4a=
vN=0A=20=20=
PsruFxMLWdP3RUkhgD2Oa+zpbKOeym2RGVIm4kLOolP8QJFc54A06Cy+P+nIHtD9uguEdEBdNw=
Xc=0A=20=20=
pyeSeKAPzc174O/EXw5q4tdS8MahOcFw1qguFZV4JJXkVPqGnXVkiR3kE9qwQALPCVPTsTz+df=
qR=0A=20=20=
8dPCpT4RwavZ7hdWN7G7OhdCY5Plbdj3xXyVcTahJpVxFfW9teW6L80dyhliJPT5j0NAHyOIxI=
+1=0A=20=20=
AWIb+JckfjViWORrn5JMsE+b93XuN74B0y+t2uraF9FlPKeU4mi39xsbkD3WvOdZ8K6to4aSe2=
L2=0A=20=20=
xHM9tKZhn3zytAHHzq3mK4aRTjDYGN1ZN0myLP7wwdGXZnBroZFDW7Bo5OvH72sq6jkMX+rkwP=
8A=0A=20=20=
ppTA5WWPBI3FR6EYqseGPOfetO4Q7gxQ5K5OTms4/cHGKQFaT7p+tQ1M33zUR6moNEJRRRQAUU=
UU=0A=20=20=
AFFFFABRRRQAVvaRoGq627Jp9pNMFwWdR8q/WrvhTQZfEXiyx02IrtkYvOzdEjXqa+2NJ8K6fZ=
2s=0A=20=20=
Ftptv9kCAFFhixHyPvse5oA8c8CfBO71jxJY2FxsvJ3TzZiFxFbRr95n/vE/dX1OT2r6i8R+Fr=
Xw=0A=20=20=
h4G07wzo0Asb3UmMEHkDZ5UQGZJR7gHGe5NeqfBzwz5fgmbxDdRtNc6pMz24Y8iKPIVfxwzfjX=
L+=0A=20=20=
JoP+Eh/aE1zyo4bi30u2i021Zm3IkhHmzEj1JKj8KtGZ4veaXH4VjtrSIyPZRhf3KJ5pjP8AeD=
dg=0A=20=20=
a9Js/J1ewtWheSFVGG2nKsf9j/a9a6Ofw+0+mmzaKG6OSqrO208dwO1c3p2larp+oLHbIksKuW=
cM=0A=20=20=
MBT9e9QB1OnWQjjRreXzr20lLBEZ03Y6quPvN612GnRXENwL/TpmiuCrMAgJ8wk8pz92sLSbbU=
f7=0A=20=20=
Xe9WeCCfZsYsUX8Ax6f71dLBbTPdgwwGSaWTLxSyxxqxHGQ/8J5696QH1/8AA345+GNAs4tF8S=
z3=0A=20=20=
Wkzo3zSMrSrn3ZeRX1JqvxL+Gmo+Hnms/Gnha7LIRMj3myVc9P8AWd6/Lc2kcV9E8yi0ucbXju=
Uj=0A=20=20=
jYKO4P8AH9e9aK6WqSmeVoZ4AM73MaFvXBrRAfXsfxMtdJEml/8ACcWaaMZxJ5KlJpAP9mWPoP=
ap=0A=20=20=
rr9pb4d+FdLuYbFL/wAQanwfLUbIiexZ3BP4BT9a+NYdB0u6uJIzdS+Znebbz1fd6fd5rVg8J2=
yy=0A=20=20=
KlvYxhxz5lzGYooffJ5Y0wHeOviR4r+JmtS3utLFa6RDzbWUQKQDPcgklz/tVy1npzTKkcSzJY=
B9=0A=20=20=
sssByZB/d+ld9F4fgKTC78uWXqIYjsix2J96hntzG7xyLNIWG1I0l37T/v8A8P0oA881dWgLW9=
vF=0A=20=20=
hQG8sRNtzx61l+FLeNf2gfBlwQwWbUCmxm3EZQjr3rsrnTrSUeaJbsuisWid8Ow9QfSsXQ9Pmt=
Pj=0A=20=20=
n4JkcNKP7ZiG1JshdwI/rSA9n+Kmkw3XwB8UKkWJFsS6ru27trK3X8K+I59IdpZvMhTaRkRk72=
jJ=0A=20=20=
5yD/ABfTtX6IeObPf8JPEkICnOkzAK7bc4iPf8K+NIkWTRrbzpUjilt0JWON5tg2jA4/nUAeI3=
el=0A=20=20=
KlrmSOeGZD91k84/T/Z+lc/eaTcRxOyQGN2+WOM8e54719AXGnyzpmOwkeUvtLyuWjx/tE9vSq=
D6=0A=20=20=
Y7FhJDEUXlS6ZNID5V1vwdpd9boZFm0+/ddxkji2qR6NH/WvHNd0ebRdVNpciIMQrq8cvyunYi=
v0=0A=20=20=
K1Twvaf2a109vCkjlV3CTOf+A9q8I+Lfg6KP4YwX0VtG95Ytvd4o+WjZujfjWiA+NbxP9JYmON=
ev=0A=20=20=
JOc1imMibZwdwzxXR3qxqkjRyRZYkt+771hDy8dpPcDGKAM9+JDUR6mrUnzzMAdwXvVU/fP1pS=
NE=0A=20=20=
JRRRUgFFFFABRRRQAUUUUAfSHwD06KTxt9uuYmKfZ2hifOWDMc8D0xX1tfwR23h+6ECW9xcNC6=
xy=0A=20=20=
PC6hS3yqFI+tfNHwW05dO8O2GrStJG11ckFghKlcYwd3FfVUNsLjX/DOmx28W641SGJ1IAGxSX=
JX=0A=20=20=
HH8PakQz6d0q1tPDfw4soZVkS306wXcoJO0RoCx557E/jXzV4Yl+0aN9uMxN5qV5NfXUhXbjzX=
L/=0A=20=20=
APAvlxXtHxXvri1+CV/bW7J5+oyxWEDn7xMr4bP/AAEGvM7S1WSUeUB5McQiAWLGQvGWPegR0l=
vP=0A=20=20=
apdKZ5vtLAgMwheEFOgzhxu/KtcWyLJFBBNBDa/6wrboSDn1BJ/nWFFDCXjWEwFi48x2neOIjt=
07=0A=20=20=
/wC13rrNOjebTtyM7EMxSNoWEbH147/71adAJ5LZZyzRx2RkRP3SJE4Of7zgdv8Ad5pIbe4t7S=
S4=0A=20=20=
jthJu/5d4o3kc+4H8Iq/pqO88lyVlRcbWBMaMD6gfxCt7T4o55WeS7tbpyOWWJwoPvs+Xd9aYF=
aw=0A=20=20=
E/26KMWosQ6EzSeUwjHtluN/rW+ljZyea89vbSXPCrcIY/vY/hA+81SQWkciRx2xvbq5O4RxiT=
IB=0A=20=20=
xzlR0q5bgywLFIIln2FGlmd4Vix3XH3qQEYhjhiIgjjZAmS0dtHHhl5IqvPqMf2xnMa2ruo2xH=
Eo=0A=20=20=
cHucfdap9rWyg5jljY7YUjj3A/3iVHzH6mrjRtHbvcQ/YopFGVLISGbt15pgYE483V1S3uLuEx=
/J=0A=20=20=
I7OmQzfdGTytWFt3kv2QT3hvY02kBxMrHtkjrV2Fo57VVlltVuFOfMQINvs2f4aQyy3WjFbZmn=
dG=0A=20=20=
YbXbzMj1wnC/jSApXthcrazJAjRyEjzmePYCe4WuR0+zmh+Ing6J0niB8RQbYmm3A7mPOK668+=
0r=0A=20=20=
LEZHSRGUKB5ayRr7Z+4D+tc9Faufjf4BZ4Zzbvr0A3yElzyeVJ520wPpnxJaCXwHqsbhm3WE0W=
Wf=0A=20=20=
GCYZTwPwr4S0+O5Hh7TDPJHETDG2ZG3uy4GMCv0J1S1STQblRje1q6jEmFwUm6/lXwro8bN4Rt=
XR=0A=20=20=
mLFFEJgG4A9wF7/WkBjraiaWKIm6CsxJTqH9yvapYdLhW4VmfzrdM5giG0Nz0K963ItPVbmWJk=
lc=0A=20=20=
Bd3kyknn1yPm/LirlrayJE8M3yEvuKK42bV6g470AcS3KX01snmIF8vItt8a/N/zz/hPvXAeIt=
Mj=0A=20=20=
1nwZNp7KrK9tIkhlZH5OWXg9813YkETXsSi7iuftEnmK6ZcrkhOfTmudv939jWjrutihKo6HYF=
45=0A=20=20=
OO+TUAfmXrVrLp9/cWzNcLPBIY5A8WDkH2rmXwBgSbm9CMV7d8YtJ/s34kPeQrtt7+NZ1AXDZX=
h+=0A=20=20=
PrXiMolB3L5uCfmyKsCs/mMuTwR1FUmJMjE9c1fJcsSHI9jVF/8AXNk5560pFRGUUUVJQUUUUA=
FF=0A=20=20=
FFABRRRQB9pfDe5ij+DuhW6SJ5whSVjG24gbsYYV9T+C7WG8+Nnh2GKCFUiE9wy7cZKoFz+Zr4=
S+=0A=20=20=
G2qJeWOk6VG80UsRRpCkSDcqnPU+5FfoZ8L1iufjPmR3TytLkzK8gzlmC4OKtGZqfFqdpfiF4C=
0C=0A=20=20=
KVJESSe/mCZz8i+Wv3uPvVkQIVtzGyNJ5jbcGIOYye+RwKn8YSNfftRaijxC4XTtGgiG1ypDOx=
du=0A=20=20=
V46AfeqWCOVDvMsdrDJ95pWEzZ9BjgVAGpaiUXEnnwQCMbVlDSfMg6BxXWRQzCGaHzYZYgNytM=
hO=0A=20=20=
1c9Ms4G78Kw7MCWzRlj2P90gcs49a2kjt1i83ZCVjPzGZfMTHuP4j/s9qsC1FbW1vGW8i7uI2c=
mF=0A=20=20=
mYDy8/e3AEj9a3tNE1jZ3FvbrDNIU3Q+TEflz/GWbh/pWXbSTrJHFJ5IB3NkFAAdvy5Q/wA60Y=
bW=0A=20=20=
4MKLsV5TgtcQsGhb/ZJHegDSsdNkMQM8kUkrbWEaXAjkIb7xOOGSrsKPHdTRMbWKJPu7lLO4Hc=
Fi=0A=20=20=
w/8AHRWSWn8zCTK1qjbmluHcCIjuuHH8qbFFbtIXeWdAzD91DINsh65OJN3T1oA27o20twspRr=
sY=0A=20=20=
x5qYUofRlAAP1wKriOKOdBcQq7gqUVPMcj33JwfxqFTG0UskiW8O3gpM5XcvYjJJb861LFYDK0=
ck=0A=20=20=
czyNyzsTFbgds7uFP+13pgV57K2hiuZUaKW5J3h3HzJkdBikhaZNNij2zIwO8kruGPcbD/OtCZ=
XR=0A=20=20=
1+0vHJFvxGzTRug9wB2WqUts8U1wTHHcR/elktY24HbOOKQEXmWogkiVrdN4JkmMSCIeg2kAk/=
hW=0A=20=20=
bBbuPjV4AMn73f4ggX7RJEsY6E/Kqcir5t2l1ExyWrJtUeWZkkZM47D1qe0hg/4XN8OIYo7mOQ=
eI=0A=20=20=
IS5kUruKqT0NMD6SvoC2k7ByjR4xz825JvXmvhLStx8O6e0RjSKOIgKVkYRPkgZCcfnX31PvOi=
Iq=0A=20=20=
Hy1ZQxP/AACY18P+GlK+BLKSEC4kCtIir1LKx5z/AA0AF1ZYC3P2Z7d4ydwtYlVSe3yryfrWLa=
3V=0A=20=20=
k5cwvc+amUwHMuZGPCbTyeM81s3V5czC4GZLWN8Nuim82VmXkj3Fcy6rd3S3SRSxhG8uYSYjjG=
77=0A=20=20=
rnbznNAHPatPZQalqG0xF3kG/cmQpx3/ANquT1RmtrKK5imkkiDD5g+GbP8ABirOqXQOu6i7PG=
Zo=0A=20=20=
9qZkYssb92JPO6sFnaeeG2jnjVFy7ja+6Q+nmD7v0rNgfPvxy0pbr4XWGrwo8UlpeEOWOSUf/w=
Cv=0A=20=20=
Xx8zcN80ivnkDsa+/wDxZYf2t8O9b0dvOV7m2cgFiQ7jJByevSvz5kUxTyR78yA7W+tWgEbJUZ=
JJ=0A=20=20=
96ot/rG+tXDuGNxqpJjz3x0zSkVEZRRRUlBRRRQAUUUUAFFFFAHs3hq0i0O30vUTcJCuoaeHjY=
pl=0A=20=20=
hKrZKj/exX6D/ADWG1P4rXF3NOZDNpZQCbhvlYNxXwloul3Wp/CKz08u0k0Vqt7p+5t2FyVkjA=
9z=0A=20=20=
X0D+yh4oK/GuDQrpmLrDOkKIyK+GXPQ/xA9aszPo3Vridf2jPHzqm2NZ4EfzBjcqxevfrXRaXb=
RL=0A=20=20=
Z4ykJPzNHEzlBu/iYjjNcnq8qWv7S3jiBonkkd7ecGFAVYvFhckV0dqZhL5UqyW0z8eVvAUx9W=
OF=0A=20=20=
5pgdFBGhgZLaQQ/KQWdi3Tvg81spdQOsEk7RtMPkDCfyonA9V7mseH7Oi28kl1AZHZirmVmKD0=
wP=0A=20=20=
/Zq1C9uboMwtr28HKp9mD7tvbI4FICci2klkmLQpH96N4VVvKZe5A/L5vWti2Nw9whhiuZsttT=
5V=0A=20=20=
WAFuuQvAP0rI0+Wc3cZjMk07EjyIX8tT9V/j+taw2GMy3NnjaW2xum/y27tn+JfQdqANXb9mjX=
fI=0A=20=20=
jTo+DEsqIy/UHqKljCxzo5udP8kK3FuGGT68cVQZpoovKt3EQdflMjxiZj3xj5sfWobS8QxOrT=
3K=0A=20=20=
ELiQRyqgP1BLFvxUUwNzE8V4ZFknnt3QNLMLchwAeAGLjIq7HJcwxyFBIiltwX5Nrk9D85Kfmc=
1z=0A=20=20=
Ty3SCRrueacbd0cKQA4b+E5AGPyFaWnCOO2klLXEluIyZVkuc5z/APXpAaNyD9kK3Ku93tDPJ8=
zl=0A=20=20=
c9gi8Y9xUdtb/Z7tD8ohlbcCs7Nt2/3Y24/GopI44WGLVoGniCowmLyAZ6KW4UU+KM3IAtEV7j=
eY=0A=20=20=
xFJcgSbuxyHAYfhTAub459SuAm26DD95JdyxlSMfKvHeq+mWka/tBfDSNI5UkGth5JJABGFETH=
BI=0A=20=20=
6mrEtrJpSKQlunysGkjt8jOORuycfnVPwwTcftP/AA7VMrGt1O8jq+7BEDNhT3akB9SXQRNGRm=
VE=0A=20=20=
UxIwO7LcQTN1r4l8Pu0vg/Sf9MARYB5KQ2/mSE7j19q+19TkH/CKvIYlfyrPcuzqNtnIf618Y+=
H7=0A=20=20=
drX4e6Tco8SStboSwk3SkHnHl+nvTAr3lnJPfzTo7rbr8zGGDaFbvx2rzvxCtnZq9zb3MpJQt5=
kh=0A=20=20=
2biP4v8AgNd7q13M0TTFB9mQMg2PlgT2C+nvXy5408XQXfxAGhRiSS6aLBhikd1+bjBA4oASK5=
m1=0A=20=20=
C2jD3KFg73E80aCUJk/KSx+UZ9+atX5ubXRVnU2kL3LAFklIKD+Ic/d4/ip9pYJFAunwBWl/19=
y/=0A=20=20=
VQF+6HUfMAenPYGqOp3dtc6jIBJavGieXFiIjcx6lc849KyAx79vKLIbsujFQqJ0IA4zXwZ4x0=
99=0A=20=20=
K+JOs2bxCNVuGYKOjAnIP619wX04isZQ9xumYYHnR7JGA/uv2HtXyx8X7bzPGFjq8VuYIbqAIz=
IO=0A=20=20=
HdODWiA8XcEStnrUJ6mpX/1rfWoj1NQaISiiigAooooAKKKKACiiigD6C8Pzzaf4N8J6vdvN9m=
VD=0A=20=20=
bSSKrhViYkjJHTa38XfNemfDonRf2zvAmvrLEiXepfZ50hQpwykbyT68V8+aL461TTvCcekz21=
rq=0A=20=20=
el+SYmguS+wqTnGR90iuy0Xx4Ljxl4UkgsEia01S3keUTlmjUOABk9eCatGZ+gXxDMmj/tbpJI=
1v=0A=20=20=
bwajoqOHLbiXRiuAfoa3bKa6kkijyqhn2hp4fMMY/vAbxj64rB+PsDjxF8O/Ey8rHNPbPIeflZ=
A6=0A=20=20=
D/a/3ag0u7luNMguI1MMcmCVZtwfH3uO1AHpwMFrAxV/3b/KxMIkdjn+EqSdvuTWhbzJHCEdIo=
Q7=0A=20=20=
7jIGyyIO5f7x/wCB8elYiSy2+lMnmR+eWDvAP4FP3flwuP8Avo1qxyW5s3upg9zclQkTBOAe/w=
Am=0A=20=20=
T+eaYFl7uSDUYhG7W8LY3ZWVkA/hYk9zWtbsBcMIoLyWcnHmOSQf9nB6VjssaIJo7WaTzQA24i=
YM=0A=20=20=
O4+XlcVsRXaxrKtt5lwm0NGRKWwfoefzpAa63KG2ZvLVNzKJJFVxg+hUdP8Afqi5F1fLJH5FxM=
in=0A=20=20=
5IkUoR/dYnnNSW1zF5SsyeVET+++cAE+pDOD/wB8iojqCIkxilsnh6W00chTH94bypP4ZNAGha=
Rf=0A=20=20=
YpImuT5iSqyqkgwg9hs4z9amjjtVZQqRtFIfljuY2Dxv03ZXg9e1ZSTSSTndHDuGN8gYAyD+Eb=
VA=0A=20=20=
L/7xFNtSBcPLLLPOfNIj2RIpVu/O8P8AmM0AdrFb3NxJnbqEcSDEgERKbR/GJCF2j23Gm/YC8Q=
SK=0A=20=20=
2uJxNKNpim3SAfxZGTx+JrKgnU7ojLcS28bb2hDlfMPoxYkfrWnBdNcXCz2cSRKG2iRJw5DY9k=
I/=0A=20=20=
WmBofarq2tZbKWK2n8kbo4dqNtXPoQv/AKEaq+FXWT9q/wAIIS5WCzv7mNRGFUOISOGBOOvTJq=
td=0A=20=20=
3Cf2cWIup72SPcZiUQHaeuCAWo+HjXFz+1DA8k8U4tPDN4ykMysjOQoGBx37UgPo3xbL9k+G+s=
3B=0A=20=20=
Dq8OlXLAg7cYs1Xp2+9XxrbhbXwjpVvNOk4MMQlJWImMbOuT835V9S/FG7e0+CHi+eMbWGm3MY=
5J=0A=20=20=
+Z2iiA5+hr5Kvp7xYIXMcflRxKpSZ8bCAOlMDlPFmsWth4Rvrplt/LRSFZWIYr7BuQ/oD96vl7=
QI=0A=20=20=
76112/8AE+vvBJ4gvh5dikS5aJADsjH+0B9+vQfid4pig8RaPoO6Nlv5M3HlOJCu3pkLytUNPg=
is=0A=20=20=
9QjvLjZdz5+ZmUnywPugEgn81P1oAtOr2GkhAsaajcKXubnyzuIP+9xVGP7NGPP89J5YxnYSMj=
jr=0A=20=20=
sHB+tbFxF51wsk0VsED+ZMkkaSuc9+SdtQLp1/qLSvZWkyxEbWubsbYse27lj/ufLWfUDx7xNq=
sO=0A=20=20=
nQTanqF0I7KMgy7zvST0AP8AEf8AZ7V8u+MPGX/CSSxWsFr9l022dmhRm+di3ct2+ldb8cNOv9=
O+=0A=20=20=
I6xz3k1zalcwxlAoQ/xAAcV4gTk1ojRDnz5h5LH1xioj1NB6mkrMAooooAKKKKACiiigAooooA=
/S=0A=20=20=
j4SfA74VeK/2ePB2ueIPDXnahPYI9xPBeTRtK25uWw4HbsKT4r/D/wCE3w++BHiF/Dfhy007VH=
Ct=0A=20=20=
a3M9xJPMJFYEeW8pIU8dFNdD8M/E8Gg/saeC7ie6SFItKyxP1biviD4s/Eq88deMmCMyaRbuwt=
0R=0A=20=20=
sBieCTQZn6G/GbzvEX/BPzT9ct2H2mwtrPUUlTJOQAHOT0GDXlfw78VfaNNg8+/tLiORFRmU+Y=
FG=0A=20=20=
OArd69X+HLJ40/4JxWunz+VMZ/Dk1oVTrvQMR/IV+eHhPV9T8MXwmQzSW6KBPEsjl7cgkFgF+b=
H0=0A=20=20=
4q0B+kY1OSR0t14BXZIRHyQOgrV07VpCzRSR+VKeRHJGM7/bd/7LXz34d1221OztrhLiAyyRCV=
HZ=0A=20=20=
3XLHg9Pu/wC9Xoun6lcQyLAtxayHZvABVv8A0LlfxoA9UinmnW4cwXNrcA4L71h3j+783LfjW8=
sO=0A=20=20=
bUpA0ctwUBaNj8w92z8uPpXmS67O8SW169m6SNiKPzvl3epI+YH/AGhxV5r9p7JYIJGRlHzBiH=
jP=0A=20=20=
+8g6n3oA9Cj+0T38MTRx3CxR4zKkZ2Z5z+lXbScMJpPOtVDsAbcMAcr3AFcJDfsJoUmlaEHh0W=
LC=0A=20=20=
svqTV621G1+3qqebeRxknFs21SP7pNAHZ2EdxHcTI1un77J3M0jtGOu5iflUfSmzibyikEPk2r=
nA=0A=20=20=
YPuJYfxZHrXKtqFulnMYop44WKn5ZhMZGz8q/LyuKiTW3S+ijeWIXG350uZCzH6MeR9KYHeWmq=
yw=0A=20=20=
weTslit4vmEBO4P/AHsiulh1oT2Hl3NppUKv8xiMhjaNR0wq8H/gVeSnXIEnlt4omhym9lXegb=
3w=0A=20=20=
OlTWmuW4uDi2iuV2bmUwlpM+uT1FAHpV3cQvCGR3ij+7I6ShS5/u7Rwa3PhIYrn9ovxVODtht9=
Bt=0A=20=20=
rcLIm1cyzjII7FgK81j1yN45VYWkBReCu8gH+9tHSvQ/gJcz3eqfELWp44RJJqkFsNoIOIIWfv=
z1=0A=20=20=
IpAdp8ctTeH4H38RMwN3c20McaDJBe4aQ7l74CjmvlG+vYbVZJ7kRXEjMHkIOWXPTNe2/H/UVt=
9D=0A=20=20=
8L6eJFR59VEsivvzthgzkY4+89fKusanaT2skEVy9xJESX/1iYJ/vt3HtUAfHnxC8XXl1+1xbW=
80=0A=20=20=
lvFZW0yQqgVgqhyMsSvO/kV+lfgr9ne98T6VY3V34r0/S7FlU/6PBPLKR6BjIgH/AAIGvxr8ca=
nL=0A=20=20=
efHHXdQhdw4vyyMsZTlTx8p6civ3A/Zw8ex+IPgX4fvI5vMlezVJQHwdwGD+oNWgPWLP4JfD7w=
ZZ=0A=20=20=
fbksrrXtWUgi71SRZ9hx/DGPkX+dfM/i7yrfXL9WQRIs7FFBJA/OvsbWNSE2mqzsy4HIJyelfE=
Px=0A=20=20=
K1AR+K9RJG2HzA271qagHwN+0TbxtdQzr/rY5xt+jCvlI9a+lPj/AH5fVbSDzM7+a+Zzwx71K2=
NE=0A=20=20=
ByGzSd6KKYBRRRQAUUUUAFFFFABRRRQB6hqvxBvr34T6B4TtZJks7W1CTlfvOcn5R7c15i3+tP=
GO=0A=20=20=
elNooA/VP9kTU11H9lkabKcm0v5YQfRX+Yj8q+PfEOjS2nxY8WaFbyx2eqWGqTLbGSXYHUkkRs=
P4=0A=20=20=
gwNe4/sWasV0jxdo7SYPnRTIp/hVgVJrL+LXhuCb9sfxPZmZNNTV7CG9tWlTO6XBVtn+0CBVoz=
PL=0A=20=20=
Ph9rUekapJo+rxzwNKcN5uSgbPyhVbgD6V9S6etjqVkI7aGMzIA3lZ2P9Ts4x9a+bv7LTWohpO=
ry=0A=20=20=
x6Z4ksuVMq7Y7kDgMD6mvRvDvivV/Dd8NO12xt5LTb5RvBKSwUdN27imB7Pc6dfJdmW0KBlQDy=
7Z=0A=20=20=
Q6Y9UA4J9TUsVnfxzIZQlyjLvSTdtVG9D/eatbSNUe8t1eK8tUtWAWIxeU0in1DK4IHtXaK9tb=
6c=0A=20=20=
kl3GYgy4GyIQrj+LKOSG+uazA4iG+S2ucXIvPPjA3t9m+eMfwkH+EVZtU82UXNo6pKTzC8iev9=
49=0A=20=20=
a6cGzkjIt5V8tByVjhfPsoTk/Wun07wP4v1DSr/V9I8MateabZRiS7uBahxCCflJD8n6rQBxsZ=
lj=0A=20=20=
lKx+TFuGXihlc5Pv/D+VZ1zcXvnrKfKnjU7Qmc4b1romvLTS7u7tJrSOCWVlNwsyyJsPfBLipW=
td=0A=20=20=
MkgeYSNNZzDEXmSkgMP7uSf51aA4+1nmNrPtvTGIyRIgj81cer/3Vpu4T24kN1NLcI+EnaVkgA=
9M=0A=20=20=
Jyf+A/N61uah4dtG1YeZJbwrjO+aR9x3dhioU0e0MkBivIbdFb/VO5XOPc/3qhgc5Pf36aVcKH=
ln=0A=20=20=
ghbdKvlnJbsRj97X1L+zVER+y3BqIzE+rard3WZV2uQXWFcn86+afF13a2fgDVb2O5tbv7PbSK=
GD=0A=20=20=
BinyngFeTzX1n8GLJdH/AGS/AVm5Fu40eCZw+cl5N8xznnrirQHk3x7vrm6+LPh2xgli2RWFxc=
Sc=0A=20=20=
5wzy7VGfoteA6qVj0G6gMANwIyxATOPevVPihqcdx+0Bq9tCZRLb2dtbGaKXIjATexI/3mrx/w=
AU=0A=20=20=
ysdOvGjkAuBGVQCTPmZGANvbmoYH5o+J+PiFrOH3/wClv82MZ5r76/Y1+IiW+h3Phe6uVSSCXd=
GH=0A=20=20=
fBEben41+eeqCUeIr1Z/9cJ3EnGPmDHNfRHwGnjTxFYSQy+RqdvOQGR8eZC33lf2zQaI/aC78Q=
JL=0A=20=20=
p0W2VjgYYtya+S/ifffaPFcnlSBYyAW/2jXssDRR+DIpZ7iRiUBK5zg4rwPxRapPPcXbSMZScK=
7d=0A=20=20=
FHpVozPz/wDjVNLP45jaWTO1cKvpXihBDHPWvU/iw4b4mygYIUAZHTrXlh+8ag0QlFFFABRRRQ=
AU=0A=20=20=
UUUAFFFFABRRRQAUUUUAfVn7JusCx+O2pae8jol7pTBQHxl0YEfzr2f9pPT7mHxj4S8Vaai/bo=
La=0A=20=20=
bBkVzv8ALIbZx1yM18bfC7xongD4u6V4mls3v4bbcJbeOVUMqsuNuT74P4V9C+Kvj1Y/EeLTrG=
Hw=0A=20=20=
9/Zs+nTNcxtfaijx3Py7XjI2HYWHfJoIe50dpb6J8R/DFvco9vbaoYg1vNExieBv4thPUZ+8Ke=
1v=0A=20=20=
420eyeC/05NZ0+BSsktqUdfL6hmQ/cPtXksNveeGvHC6a88dlZXrC506aOTzIYWbkxDICkn2r3=
PR=0A=20=20=
PFuoaRLa22vlbmBnDGRcGUDsCo4xViOKtvifa6N46/sDR2msUaMvdXFzbBnGQG8uPtub1Py16b=
ov=0A=20=20=
iLUvEt3JbzX8+mxO/wC7cKZHQeolk4DeoXivBfirrFgf2gb1rbTtPVL3TUzPDDkIQDuJHYkY3G=
n+=0A=20=20=
FfHOmQaVaeVeA3kUmJ7bUXeKNEHClbmPcMsc43x/jTA+xYfC0m+1unv728bzhvjkuHeGRdv3cB=
xk=0A=20=20=
/wCzWhapqlrpdzp+l6/4l0SznZxcwQarcQW5GOkgSTBH+9Xlnh7x3bvbQLLo+ryQbzIs9tNDfr=
Fg=0A=20=20=
jkskh3emNgx6V7Lpdjf6/wDD3VfElrbzjTLGdftW+RRLGWJ2ssTMrlT/ABGOOT3xQB41e+H9cO=
oy=0A=20=20=
DTviB4207d88kAv1nt5NvQhJVOT/ALpNYdt4u8X+C9TaPxBLZarpbShW1XToHtJYc9GmiIEcqj=
PT=0A=20=20=
Ga9I1G9s7eWZ76PVN0SfuSIAPLbH3sgDcvtuOK82fWfDurQJodzqOm2GqM7BbWOeS5ku8848tH=
YR=0A=20=20=
jj7xK0gPdLPxFHf2zWj5uZgFdfKO6KXP8R/uk+lQKWaeRZS4kyCIVk8wjNUPBtrY3Vnc3E6SWs=
sr=0A=20=20=
gQtCmT8g6Abm+X8TXULqdklkEikWPdIV3rbHK+2W4WmB5f4+tru1+EWp28IuhJO6W65f52MjgD=
C9=0A=20=20=
hya/Q/T4U07wFp+nRIsX2axhtRtGB8sccf8AU18AeKNSfW/FHgTwkEbytQ8T2oaQzAmRUfcTkc=
dB=0A=20=20=
X3TqV+ltpFzdjeYoleTAOdqgux/9BWkB8XeK9Ytbz4m+LNStlee4n1WYHHYKwRP0WvOtXuJZLc=
mU=0A=20=20=
x+c+SYn6nbzlv9nArVQtHZiZ3jVrh2nImG3exbcSD+Ncj441KzsfBuq63NmOKC3dYphJnzXIwF=
/M=0A=20=20=
1AH5/wCuSLN4y1WVBhXu5GA9ixruPhhfatYfEa1m0i1e7uG+XhtoQepf+GuR060GpeI1hnn8pZ=
G3=0A=20=20=
PIY92c9f/wBdfV3gzTdI07S4bfS4CueTIhSQMfUt3oNEfQ2meIfEeoaFBBc6wI5I+JYooEQFfX=
Jr=0A=20=20=
nPEsGsT6a4g1zUF35wQwY/TA7VnWV/JvdWLJcxjbuUABs/SqOp6rcSaexMmZ0yAFfkYNWjM+LP=
Hh=0A=20=20=
u/8AhP7lL9bZZ0IDPC/Dj129q4Rv9Y2PX0r0T4jXAufGTz/MJGyr5Oec150eSag0QlFFFABRRR=
QA=0A=20=20=
UUUUAFFFFABRRRQAUUUUAdx4AjspfjF4Wj1CCKeyfUI0nilVSjAnHIbg9a/Qz4h6H4S0H4Mapr=
Wn=0A=20=20=
eCPCVxc6cyXJtjpkSRTrHICyv5YU4I4O1i2OtfmjpNy1p4i027X5TBcpJn2Vga/TjVwNf+FOp2=
rP=0A=20=20=
uivtOdWj/vBk+U/nWiA8J1d7D4geAjqOn2NlZSXOZbeG2bals4OVCjJwqngcnjFcJc/EeTTPD0=
1n=0A=20=20=
r2h21zq8Q8mSB5XjkBHKyEj7ykiq3grUEsPBFtIH2rGWt7+ENlYZA2FkCeuPvH8a5r4ppE93YX=
Yh=0A=20=20=
VJ2DDzI0zFKvZg/c+9BmdHpOoaLr1xY3+raJaRC6Vo/OaVySF+8qBefy+b1rsbzQfhrZeGnsNA=
k1=0A=20=20=
2Ke/jKZjlANwG52NGxZmRTzkqDXi2jaxo9t4YtkjOnrrEqOJrm+80+Vz8pARCXPtzXpfgTQ3Gk=
6p=0A=20=20=
q2ps9/d7Alg5dh5IznKq2CC3PBFIAt/hPF9gtTp1xtecFkunlkimcr95VO4RY+oBr1DwR8JNfv=
vF=0A=20=20=
+m6TFe6w/wBqlWCISazm33OQFyykqgBPfk1r6NFHeaWtsLqydQAzxCRCmfdT0aunsr0xyNDYah=
bI=0A=20=20=
keMrJIY3c/3QE5OKYHpP7QH7HPjj4MQaY+tRaV4o0e+t/wB1qNhO8qpMBueNo2+dGAz87fIa+H=
vD=0A=20=20=
XhK/sfiZqttr632gaTdI8trdSW7NKQvIMTjhc9N1fXGo6xrl/ZR2jz6retJhfJtYpRLt7AA8sK=
ra=0A=20=20=
f8Gfix451pINP8O3NjYsAi3Wqxm3iT3IPUUgOe8DXQ1Dw3cRRyzLFFN5UILkOYx0BJ5JavRzp9=
8L=0A=20=20=
BkaUMgGDE82Xb+6gH8WK+ofhX+x7B4Qs7a68VCHxLcBzIysmIh6/L/H7GvruX4M+C9R8Ni3sfD=
Np=0A=20=20=
FAU2zW81uCqtjrubkH/dqAPyO8P20E/7Y/wys/LUJZtc6hIG+Rw0cZAyvbk19Q/ErVotJ+CPiK=
8k=0A=20=20=
kWNv7OkCB3RQGKhM5PJ5Y15Z8cvhRqfwh/aa0bxHpOu3Gm6feWMlrEHhMxg3HLAOSxXdj+7WQ3=
hW=0A=20=20=
LXjDfeJIW1q3mZigv7mS5hm5BxyAqnPPAHSrWwHzTqPxC8GaZpsMd/4it7yUKMQWv+kTYQY2/J=
wp=0A=20=20=
z/erynx3q3iL4hadYWNho9/onhgSiRZ9Q27pm6KzBOQBmv0it/A3gc6agm0axtWQHZ9mgijUlu=
+V=0A=20=20=
+ZvxrivFGg2B0Sxkt4rZkEjI58ojzQPurzUAfFvg/wCGVjpN9bXEqJczkEpNKhKsP4htPNezjS=
Yv=0A=20=20=
sSt+52IQGEK7QDnrjtW1r+nYtIXgjRZYTkBODiuCl1K4tmSDzD5krlgp6gLVoCggl0/Vr+Uzvc=
Wx=0A=20=20=
lJA/5aJj+Ie1cb4r8QiwtJ5HkjU7S7bP4lNXNX1aKws93mKC+/dC/Qluc184eLvE8utagYIwot=
4z=0A=20=20=
khRxnpQBy2qajNqOrzXMztkn5A3YVlEjdweKMc59a+gPAXwVi8b/AA2t/EA8StpjPM8TQf2d5m=
3a=0A=20=20=
cbt3mjPX0rrwWArYuoqdGN2TWrQpRvI+f8E4yaaepr790X9gv4h698GNZ+Ium39xP4H0jP2/VP=
7O=0A=20=20=
hjEYUgMVV7lWkIJH3Qa+D9TtRY+I7+yEnmi3uHiD4xu2sRnGTjOPWnjsurYWXLU9ApYinVXulG=
ii=0A=20=20=
iuA2CiiigAooooAKKKKACiiigC3bxq0h3ErhSxNfot4D1tNQ+D3h+4eSMtJYIrk+wwf5V+dMP/=
Ho=0A=20=20=
9fbHwmkdvgbpGWJ2RSbfb5jQB4Ql3/winx08SaXcysdNnvZEkT+EBjlC3+zzUHxAmFt4b0zTIm=
32=0A=20=20=
/mNNbqYsGHP3lQ91qv8AFQk/GXxA55ZhExPqdg5ritdmllj0VZHZgLVcA/WgDMsb2Oy1IXMlv5=
zD=0A=20=20=
lRv6H1rufD1/448T+NrbT/DdhqGuajcMNmn2cMsrTY/vLHyQPU8V5o4xMwHrX7cf8ErPDmhXnw=
x+=0A=20=20=
IWu3Wl2k+rxXUcUd26ZkVMfdB9K0QHm/w2/Yl/aH8fWVk/ie70nwRYSlWaEHdKFx02JwD7Gv0P=
8A=0A=20=20=
hb/wTk8LQwQzeIfF3iPWmjILwRMtrEcdc7ApP/fRr7D0aKODxc0EKLHCQCUXp92vVPDV1cQ3Es=
cc=0A=20=20=
rom9RtB4rNmZkeCv2fPhp4C0KO30Dw3p8U6c/aTEHc/UsSSfqaTxn4V0ix8Pz3cVpbwGKJjtSI=
Au=0A=20=20=
f7vFeqG7uf8Ans/evn74ra3q0Ph29SK+nRRkAA1aA4m3vLe30CGS9mSJCGwpGM1oeHpr/WlvJr=
C3=0A=20=20=
l/sppB/pBiwoYe/evMvhLEniT4kyrroOppFINizElR+HSvrjxMq2VgltaIltbhiBHGoVQPTFMD=
8q=0A=20=20=
/wBqqxHiHxLDBKg8jT+d+c5Y18ceC/FM+mCXw7qkcV/ps05VUkfmPngivsf9pEmD4mx+V8m9H3=
Y7=0A=20=20=
18Gao7J4h81TiRZ1IYdR8wpAe66zus/DklpvlnvNhMadcD+GuV1e+2+H4ZbuQv5LKrsXxgY6fn=
XU=0A=20=20=
27te3eqS3RM8iWy7WbqOK8G8UXl02l3yNM5QXPAz9KAE1zVLdLTdwHkYkRK24/XFeE+ItbtrGW=
e5=0A=20=20=
luTE4U4JXBT/AGq29XuZ11BmWVwyqNpz04r5G8WarqN3r91Fc3c00YkOFY+9MB3iXxXNq1yYYm=
lW=0A=20=20=
NJC28PgP71w7EmQk9SfXNOl4uGqOs2aIeDX37+z3p2o3v7Odq1pYX90gvZl329s0gUkjqRx788=
iv=0A=20=20=
gIf0r1rwz8XPiN4M8DWmj+GPFF3o+m+Y7mCGGIgsTySSpJ/Ovo+G8x+qYp1LX0scGZUHVpKK7n=
79=0A=20=20=
+OtV8HXH/BKDwTDp/wAGbzTpZ9ZvLexT+3byY6ZdKieZfE4zJ5oz+6b5Bmv5wPEXHj/XOMf6fN=
xj=0A=20=20=
GPnPavcj+078fJtCg0mb4n+I59It3eWCwlMb20bt1YRFdmT3OOa+fb25mvNYuru5fzLieVpJW2=
gb=0A=20=20mY5JwOBye1LOK8ZUlFL7Tf3k4KjKEnzMrUUUV86eiFFFFAH/2Q=3D=3D=0D=0A=
X-ABShowAs:COMPANY=0D=0ACATEGORIES:People=0D=0A=
X-ABUID:305E78F8-1175-4F2B-BCD9-6214B8F7947F\:ABPerson=0D=0AEND:VCARD=0D=0A=

--==PHP-mixed-$mime_boundary--
MESSAGE;

	// Send the message
	if(!mail($to, $subject, $message, $headers))
	{
		// If the mail function fails, return an error message
		return "Something went wrong!";
	}
	else
	{
		// Return a success message if nothing went wrong
		return "Message sent successfully.";
	}
}

?>