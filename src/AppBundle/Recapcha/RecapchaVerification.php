<?php

namespace AppBundle\Recapcha;


class RecapchaVerification
{
    public function verify($response_key)
    {
        $url = "https://www.google.com/recaptcha/api/siteverify";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, array(
            "secret"=>"YourRecapchaSecretKey","response"=>$response_key));
        $response = curl_exec($ch);
        curl_close($ch);
        $data = json_decode($response);
        return $data->success;
    }

}

