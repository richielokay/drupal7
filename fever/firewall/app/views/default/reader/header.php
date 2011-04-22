<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>Fever&deg;<?php if ($this->prefs['unread_counts'] && $this->total_unread):?> (<?php e($this->total_unread); ?>)<?php endif; ?></title>
<meta http-equiv="X-UA-Compatible" content="chrome=1" />
<link rel="apple-touch-icon" href="firewall/app/images/webclip<?php e($this->is_ipad ? '-ipad':''); ?>.png" />
<meta name="viewport" id="viewport" content="width=1024" />
<link rel="shortcut icon" type="image/png" href="firewall/app/images/favicon.png" />
<link rel="stylesheet" type="text/css" href="firewall/app/views/default/styles/reader.css?v=<?php e($this->version);?>" />
<script type="text/javascript" src="firewall/app/views/default/scripts/fever.js?v=<?php e($this->version);?>"></script>
<script type="text/javascript" src="firewall/app/views/default/scripts/reader.js?v=<?php e($this->version);?>"></script>
<script type="text/javascript" language="javascript">
// <![CDATA[
<?php $this->render('reader/js-initial');?>
// ]]>
</script>
</head>
<?php

$body_class = '';

if ($this->prefs['ui']['show_feeds'])
{
	$body_class .= ' show-feeds'; 
}

if (!$this->prefs['ui']['section'])
{
	$body_class .= ' hot'; 
}

/** /
if (!$this->prefs['unread_counts'])
{
	$body_class .= ' hide-unread-counts';
}
/**/

if ($this->prefs['layout'])
{
	$body_class .= ' fluid'; 
}


$body_class = trim($body_class);

if (!empty($body_class))
{
	$body_class = ' class="'.$body_class.'"';
}

?>
<body<?php e($body_class); ?>>
	<div id="top"></div>
	<div id="fixed">
		<div class="container">
			<div id="fever">
				<img id="logo" src="firewall/app/images/logo-fever.png" alt="fever&deg;" title="Fever <?php e($this->formatted_version()); ?>" />
				<span class="btn menu action" onclick="Fever.displayMenu(this, 'action');"></span>
			</div><!-- #fever -->
			