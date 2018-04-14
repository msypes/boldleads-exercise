<?php
/**
 * @file lead-submit.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * Handles submissions of client-form
 */

// Is this an AJAX submittal or regular form submit?
// That will determine how we respond, especially to failures.


// Sanity check - If we don't have at least phone or email, balk.
if((empty($_POST['email']) && empty($_POST['phone'])) || empty($_POST['submit'])){
	// balk
}
else{
	// We should sanitize data, of which there'll be a little in the entity.
	$lead = new Lead();

	foreach($_POST as $key=>$value){
		$setter_fxn = 'set' . ucwords($key, '_');

		$lead->$setter_fxn = $value;
	}

	$db_connection = new DBService();

	$db_connection->storeLead($lead);

	// Send to thank you page.
	header('Location: ' . '/thankyou.html', true, 301);
}