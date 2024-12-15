<?php
defined('MOODLE_INTERNAL') || die();

if ($hassiteconfig) {
    $settings = new admin_settingpage(
        'local_smsverification_settings',
        get_string('pluginname', 'local_smsverification')
    );

    $settings->add(new admin_setting_configtext(
        'local_smsverification/apikey',
        get_string('apikey', 'local_smsverification'),
        get_string('apikey_desc', 'local_smsverification'),
        ''
    ));

    $settings->add(new admin_setting_configtext(
        'local_smsverification/apisecret',
        get_string('apisecret', 'local_smsverification'),
        get_string('apisecret_desc', 'local_smsverification'),
        ''
    ));

    $settings->add(new admin_setting_configcheckbox(
        'local_smsverification/enabled',
        get_string('enabled', 'local_smsverification'),
        get_string('enabled_desc', 'local_smsverification'),
        0
    ));

    $ADMIN->add('localplugins', $settings);
}
