<?php

namespace App\Traits;

trait Sms
{

    public function sendSMSMessage($message, $userMobile)
    {
        $username = '966582225635';
        $password = '38407cod';
        $sender = 'ALJAZYAH';

        $message = str_replace(' ', '%20', $message);

        $url = 'https://www.hisms.ws/api.php?send_sms&username=' . $username . '&password=' . $password . '&numbers=' . $userMobile
            . '&sender=' . $sender . '&message=' . $message;

        $curl = curl_init();

        curl_setopt_array($curl, array(
            CURLOPT_URL => $url,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "UTF8",
            CURLOPT_TIMEOUT => 30000,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => array(),
        ));
        $response = curl_exec($curl);
        $err = curl_error($curl);
        curl_close($curl);


        return $response;
    }
}
