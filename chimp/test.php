<? 
    //change this to your email. 
    $to = "richie@richielokay.com'"; 
    $from = "Richie Lokay <richie@wingtipmarketing.com>"; 
    $subject = "Good meeting you!"; 

    //begin of HTML message 
    $message = '<html><body bgcolor=\"#dde8f6\" style=\"background: #dde8f6 url(http://wingtipmarketing.com/images/WT_bkgblue.png) repeat top left; min-width: 500px;\">';
	$message .= '<img src="http://css-tricks.com/examples/WebsiteChangeRequestForm/images/wcrf-header.png" alt="Website Change Request" />';
	$message .= '<center>';
	$message .= '<h1>WINGTIP</h1>';
	$message .= '<h4>The New Old-Fashioned</h4>';
	$message .= '<h2 >Just met!</h2>';
	$message .= '<h3 >Thanks for your interest.</h3>';
	$message .= '<a  href=\"tel:347.635.4373\" style=\"text-decoration: none;\">Call 347.635.4373</a><br />';
	$message .= '<a  href=\"http://maps.google.com/maps/place?cid=8391176498626091929&q=Wingtip+Marketing,+217+Water+Street,+New+York,+NY+10038&hl=en&cd=2&ei=qIj9TPTLOZGQyQXWjbW7CA&dtab=0&sll=40.707544,-74.003284&sspn=0.006295,0.006295&ie=UTF8&ll=40.712638,-74.009914&spn=0,0&z=16\" style=\"text-decoration: none;\">Visit 217 Water Street, Suite 301. New York, NY 10038</a>';
	$message .= '</center>';
	$message .= '</body>';
	$message .= '</html>';
   //end of message 

    // To send the HTML mail we need to set the Content-type header. 
    $headers = "MIME-Version: 1.0rn"; 
    $headers .= "Content-type: text/html; charset=iso-8859-1rn"; 
    $headers  .= "From: $from\r\n"; 
    //options to send to cc+bcc 
    //$headers .= "Cc: [email]maa@p-i-s.cXom[/email]"; 
    //$headers .= "Bcc: [email]email@maaking.cXom[/email]"; 
     
    // now lets send the email. 
    mail($to, $subject, $message, $headers); 

    echo "Message has been sent....!"; 
?>