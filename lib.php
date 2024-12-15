<?php
defined('MOODLE_INTERNAL') || die();

function local_smsverification_extend_registration_form($mform) {
    global $PAGE;

    $mform->addElement('text', 'mobile', get_string('mobile', 'local_smsverification'));
    $mform->setType('mobile', PARAM_TEXT);
    $mform->addRule('mobile', null, 'required', null, 'client');
    $PAGE->requires->js_call_amd('local_smsverification/otp', 'init');
}
