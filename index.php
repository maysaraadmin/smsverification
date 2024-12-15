<?php
require_once('../../config.php');

$otp = required_param('otp', PARAM_TEXT);
$userid = required_param('userid', PARAM_INT);

$record = $DB->get_record('local_smsverification', ['userid' => $userid, 'otp' => $otp]);

if ($record && $record->expiry > time()) {
    $DB->delete_records('local_smsverification', ['userid' => $userid]);
    echo get_string('otp_verified', 'local_smsverification');
} else {
    echo get_string('otp_invalid', 'local_smsverification');
}
