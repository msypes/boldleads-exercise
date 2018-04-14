<?php
/**
 * @file agent-dashboard.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * Displays a list of clients
 */
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agent Dashboard</title>
</head>
<body>
	<h1>Agent Dashboard</h1>
	<p>Below is a list of current leads in the system, alphabetized for your convenience.</p>

	<ul id="lead-list">
		<?php foreach ($leads as $lead): /** @var Lead $lead */ ?>
		<li class="lead">
			<span class="name"><a href="client-detail.php?id=<?php echo $lead->getId(); ?>"><?php echo $lead->getFirstName(). ' ' . $lead->getLastName(); ?></a></span>
			<span class="email"><?php echo $lead->getEmail(); ?></span>
			<span class="date-created"><?php echo $lead->getDateCreated(); ?></span>
			<a href="client-detail.php?id=<?php echo $lead->getId(); ?>" class="buttonesque">Details ...</a>
		</li>
		<?php endforeach; ?>
	</ul>
</body>
</html>