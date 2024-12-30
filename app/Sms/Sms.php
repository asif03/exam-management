<?php

namespace App\Sms;

class Sms
{
    private $user, $password, $sid, $url, $apiToken;

    public function __construct()
    {
        $this->user = config('sms.user');
        $this->password = config('sms.password');
        $this->sid = config('sms.sid');
        $this->url = config('sms.url');
        $this->apiToken = config('sms.apiToken');
    }

    /**
     * Send the message to desired number
     *
     * @param $phone
     * @param $message
     * @return string
     */
    function send($phone, $message)
    {
        $url = $this->url;
        $data = [
            'user'      => $this->user,
            'pass'      => $this->password,
            'sms[0][0]' => $phone,
            'sms[0][1]' => $message,
            'sms[0][2]' => random_int(1, 99999999),
            'sid'       => $this->sid,
        ];

        // key 'http' is same for both http and https
        $options = [
            'http' => [
                'header'  => "Content-type: application/x-www-form-urlencoded;charset=utf-16be",
                'method'  => 'POST',
                'content' => http_build_query($data),
            ],
        ];

        $context = stream_context_create($options);
        $result = file_get_contents($url, false, $context);
        $parsed_result = simplexml_load_string($result);

        echo '<pre>';
        print_r($parsed_result);
        echo '</pre>';
        die;

        if ($parsed_result->SMSINFO->REFERENCEID) {

            return json_decode(json_encode([
                'status'           => 'success',
                'result'           => 'sms sent',
                'phone'            => $phone,
                'message'          => $message,
                'reference_no'     => $parsed_result->SMSINFO->CSMSID,
                'ssl_reference_no' => $parsed_result->SMSINFO->REFERENCEID,
                'datetime'         => date('Y-m-d H:ia'),
            ]));
        } elseif ($parsed_result->SMSINFO->SMSVALUE) {

            return json_decode(json_encode([
                'status'           => 'failed',
                'result'           => 'invalid mobile or text',
                'phone'            => $phone,
                'message'          => $message,
                'reference_no'     => '',
                'ssl_reference_no' => '',
                'datetime'         => date('Y-m-d H:ia'),
            ]));
        } elseif ($parsed_result->SMSINFO->MSISDNSTATUS) {

            return json_decode(json_encode([
                'status'           => 'failed',
                'result'           => 'invalid mobile no',
                'phone'            => $phone,
                'message'          => $message,
                'reference_no'     => '',
                'ssl_reference_no' => '',
                'datetime'         => date('Y-m-d H:ia'),
            ]));
        } else {

            return json_decode(json_encode([
                'status'           => 'failed',
                'result'           => 'invalid credentials',
                'phone'            => $phone,
                'message'          => $message,
                'reference_no'     => '',
                'ssl_reference_no' => '',
                'datetime'         => date('Y-m-d H:ia'),
            ]));
        }
    }

    function sentMultiple($recipients, $messages)
    {
        $url = $this->url;
        $smsString = 'user=' . $this->user . '&pass=' . $this->password;
        $smsSl = 0;

        foreach ($recipients as $recipient) {
            if ($smsSl != count($recipients) - 1) {
                $smsString .= '&sms[' . $smsSl . '][0]=' . $recipient . '&sms[' . $smsSl . '][1]=' . urlencode($messages[$smsSl])
                    . '&sms[' . $smsSl . '][2]=' . random_int(1, 99999999);
            } else {
                $smsString .= '&sms[' . $smsSl . '][0]=' . $recipient . '&sms[' . $smsSl . '][1]=' . urlencode($messages[$smsSl])
                    . '&sms[' . $smsSl . '][2]=' . random_int(1, 99999999) . '&';
            }

            $smsSl++;
        }

        $smsString .= 'sid=' . $this->sid;

        $crl = curl_init();
        curl_setopt($crl, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($crl, CURLOPT_SSL_VERIFYHOST, 2);
        curl_setopt($crl, CURLOPT_URL, $url);
        curl_setopt($crl, CURLOPT_HEADER, 0);
        curl_setopt($crl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($crl, CURLOPT_POST, 1);
        curl_setopt($crl, CURLOPT_POSTFIELDS, $smsString);

        $response = curl_exec($crl);
        curl_close($crl);

        return $response;
    }
}
