<?php
/**
 * @file agent-dashboard.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * Displays a list of clients
 */

require_once 'src/DBService.php';
$db = new DBService();

$leads = $db->retrieveAllLeads();

uasort($leads, function($a, $b){
	return $a->getLastName() <=> $b->getLastName();
});
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Agent Dashboard</title>

    <link rel="stylesheet" href="css/normalize.css">
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <h1>Agent Dashboard</h1>
</header>
<main class="main-content-wrapper">
	<p>Below is a list of current leads in the system, alphabetized for your convenience.</p>

	<ul id="lead-list">
		<?php foreach ($leads as $lead): /** @var Lead $lead */ ?>
		<li class="lead">
			<div class="name"><span class="label">Name:</span> <a href="lead-detail.php?id=<?php echo $lead->getId(); ?>"><?php echo $lead->getFirstName(). ' ' . $lead->getLastName(); ?></a></div>
			<div class="email"><span class="label">Email:</span> <?php echo $lead->getEmail(); ?></div>
			<div class="date-created"><span class="label">Date Created:</span> <?php echo $lead->getDateCreated(); ?></div>
			<div class="detail-link-wrapper"><a href="lead-detail.php?id=<?php echo $lead->getId(); ?>" class="buttonesque">Details ...</a></div>
		</li>
		<?php endforeach; ?>
	</ul>
</main>
<footer>
    <p>This exercise brought to you by Bold Leads and Michael A. Sypes</p>
</footer>
</body>
</html>
