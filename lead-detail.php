<?php
/**
 * @file lead-detail.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * Displays ful details of an individual lead
 */

require_once 'src/DBService.php';
$db = new DBService();

/** @var Lead $lead */
$lead = $db->retrieveLeadById($_GET['id']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Lead Detail</title>

    <link rel="stylesheet" href="css/normalize.css">
</head>
<body>
	<h1>Lead Detail</h1>
	<p>Contact this individual as a lead</p>

	<div class="lead">
		<div class="lead">
            <div id="name"><span class="label">Name</span> <?php echo $lead->getFirstName(). ' ' . $lead->getLastName(); ?></div>
			<div id="email"><span class="label">Email</span> <?php echo $lead->getEmail(); ?></div>
            <div id="phone"><span class="label">Phone</span> <?php echo $lead->getPhone(); ?></div>
            <div id="address">
                <span class="label">Address</span>
                <span id="street"><?php echo $lead->getStreetAddress() . ', <br />' . $lead->getStreetAddress2(); ?></span><br />
                <span id="city"><?php echo $lead->getCityAddress(); ?></span>,
                <span id="state"><?php echo $lead->getStateAddress(); ?></span>
                <span id="zip"><?php echo $lead->getZipAddress(); ?></span>
            </div>
            <div id="sqft"><span class="label">Home Area</span> <?php echo $lead->getHomeSqft(); ?> ft<sup>2</sup></div>
			<div id="date-created"><span class="label">Date Entered</span> <?php echo $lead->getDateCreated(); ?></div>
		</div>
	</div>

    <a href="agent-dashboard.php" class="buttonesque">Return to Dashboard</a>
</body>
</html>
