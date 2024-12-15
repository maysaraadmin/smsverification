<?php
namespace local_smsverification;

defined('MOODLE_INTERNAL') || die();

class api_client {
    private $apikey;
    private $apisecret;

    public function __construct() {
        $this->apikey = get_config('local_smsverification', 'apikey');
        $this->apisecret = get_config('local_smsverification', 'apisecret');
    }

    public function send_otp($mobile, $otp) {
        $url = 'https://sms.com.eg/api/send';
        $data = [
            'apikey' => $this->apikey,
            'apisecret' => $this->apisecret,
            'to' => $mobile,
            'message' => "Your OTP is: $otp",
        ];
        $options = [
            'http' => [
                'header' => "Content-Type: application/x-www-form-urlencoded\r\n",
                'method' => 'POST',
                'content' => http_build_query($data),
            ],
        ];
        $context = stream_context_create($options);
        return file_get_contents($url, false, $context);
    }
}
