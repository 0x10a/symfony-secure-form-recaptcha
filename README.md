Symfony Secure Form with Google ReCaptcha
========================

Installation
--------------

1. Configure app/config/parameters.yml

Fill in your host,database name,password.

2. Configure ReCaptcha

Generate your own custom Recapcha Public and Secret Keys in the address
https://www.google.com/recaptcha

Update your Recapcha Public keys in
/Resources/views/Contact_form/contactform.html.twig.

```
<!-- Update your Recapcha public key here -->
<div class="g-recaptcha" data-sitekey="YourRecapchaPublicKey"></div>
```

Update your Recapcha Secret Keys in
/src/AppBundle/Recapcha/RecapchaVerification.php

```
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
```

3. Updating the Database

```
$ php bin/console doctrine:schema:update –force to update
```

```
php bin/console server:run
```

Symfony 3.4 Documentations
--------------

[1]:  https://symfony.com/doc/3.4/setup.html
[6]:  https://symfony.com/doc/current/bundles/SensioFrameworkExtraBundle/index.html
[7]:  https://symfony.com/doc/3.4/doctrine.html
[8]:  https://symfony.com/doc/3.4/templating.html
[9]:  https://symfony.com/doc/3.4/security.html
[10]: https://symfony.com/doc/3.4/email.html
[11]: https://symfony.com/doc/3.4/logging.html
[13]: https://symfony.com/doc/current/bundles/SensioGeneratorBundle/index.html
[14]: https://symfony.com/doc/current/setup/built_in_web_server.html
[15]: https://symfony.com/doc/current/setup.html
