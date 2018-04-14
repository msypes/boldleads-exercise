<?php
/**
 * @file lead-submit.php
 * @author Michael A. Sypes <michael@sypes.org>
 * @project boldleads
 *
 * @abstract
 * Handles submissions of client-form
 */

// Sanity check - If we don't have at least phone or email, or it wasn't a real submit, balk.
if((empty($_POST['email']) && empty($_POST['phone'])) || (empty($_POST['submit']) && !isAjax($_POST))){
	if (!isAjax($_POST)){
		header('Location: ' . '../client-form.html', true, 400);
	}
	else{
		echo 'false';
		die();
	}
}
else{
	// We should sanitize data, of which there'll be a little in the entity.
	require_once 'Lead.php';

	$lead = new Lead();

	foreach($_POST as $key=>$value){
		$setter_fxn = 'set' . str_replace('_','' , ucwords( $key, '_' ));

		if (method_exists($lead, $setter_fxn)) {
			$lead->$setter_fxn( $value );
		}
	}

	require_once 'DBService.php';
	$db_connection = new DBService();

	$db_connection->storeLead($lead);

	// Is this an AJAX submittal or regular form submit?
	// That will determine how we respond, especially to failures.
	if(isAjax($_POST)){
		echo 'success';
		die();
	}
	else{
		// Send to thank you page.
		header('Location: ' . '../thankyou.html', true, 301);
	}
}

function isAjax($posted_data){
	return (isset($posted_data['ajax']) && $posted_data['ajax'] == 'true');
}