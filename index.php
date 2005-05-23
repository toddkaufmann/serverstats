<?php
/**
 * index.php $Id$
 *
 * Author: David Danier, david.danier@team23.de
 * Project: Serverstats, http://www.webmasterpro.de/~ddanier/serverstats/
 * License: GPL v2 or later (http://www.gnu.org/copyleft/gpl.html)
 */

// Load all needed classes, function and everything else
require_once('init.php');
// Validate the config with the graphes
validateConfig(true);

?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">  
<head>
	<title><?php echo lang::t('Statistics'); ?> - <?php echo lang::t('Summary'); ?></title>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<link rel="stylesheet" href="style.css" type="text/css" media="screen, projection" />
</head>
<body class="index">
<?php

// Show the menu
menu();

?>
<h1><?php echo lang::t('Statistics'); ?> - <?php echo lang::t('Summary'); ?></h1>
<?php

foreach ($config['graphlist'] as $graphindex => $graph)
{
	?>
	<h2><?php echo $graph['title']; ?></h2>
	<a href="detail.php?graph=<?php echo $graphindex; ?>">
		<img src="graph.php?graph=<?php echo $graphindex; ?>" alt="<?php echo $graph['title']; ?>" />
	</a>
	<?php
}
?>
</body>
</html>
