<?php

namespace Combindma\Recaptcha;

use Illuminate\Support\Arr;

class Recaptcha
{
    const DEFAULT_CURL_TIMEOUT = 10;
    const DEFAULT_RECAPTCHA_API_DOMAIN = 'www.google.com';

    //The Site key
    protected $api_site_key;

    //The Secret key
    protected $api_secret_key;

    //The API domain (default: retrieved from config file)
    protected $api_domain = '';

    //The API request URI
    protected $api_url = '';

    //The URI of the API Javascript file to embed in you pages
    protected $api_js_url = '';

    protected $enabled;

    public function __construct()
    {
        $this->setApiSiteKey(config('recaptcha.api_site_key'));
        $this->setApiSecretKey(config('recaptcha.api_secret_key'));
        $this->enabled = config('recaptcha.enabled');
    }

    public function setApiSiteKey(string $api_site_key): self
    {
        $this->api_site_key = $api_site_key;

        return $this;
    }

    public function setApiSecretKey(string $api_secret_key): self
    {
        $this->api_secret_key = $api_secret_key;

        return $this;
    }

    public function getCurlTimeout(): int
    {
        return config('recaptcha.curl_timeout', self::DEFAULT_CURL_TIMEOUT);
    }

    public function setApiDomain(?string $api_domain = null): self
    {
        $this->api_domain = $api_domain ?? config('recaptcha.api_domain', self::DEFAULT_RECAPTCHA_API_DOMAIN);

        return $this;
    }

    public function getApiDomain(): string
    {
        return $this->api_domain;
    }

    public function setApiUrls(): self
    {
        $this->api_url = 'https://' . $this->api_domain . '/recaptcha/api/siteverify';
        $this->api_js_url = 'https://' . $this->api_domain . '/recaptcha/api.js';

        return $this;
    }

    public function getApiSiteKey(): string
    {
        return $this->api_site_key;
    }

    public function getApiSecretKey(): string
    {
        return $this->api_secret_key;
    }

    /**
     * Call out to reCAPTCHA and process the response
     * @param $response
     * @return array|mixed
     */
    public function validate($response)
    {
        if (!$this->enabled) {
            return [
                'score' => 0.9,
                'success' => true,
            ];
        }

        $params = http_build_query([
            'secret' => $this->api_secret_key,
            'remoteip' => request()->getClientIp(),
            'response' => $response,
        ]);

        $url = $this->api_url . '?' . $params;

        if (function_exists('curl_version')) {
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_HEADER, false);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_TIMEOUT, $this->getCurlTimeout());
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, true);
            $curl_response = curl_exec($curl);
        } else {
            $curl_response = file_get_contents($url);
        }

        if (empty($curl_response)) {
            return [
                'error' => 'cURL response empty',
                'score' => 0.1,
                'success' => false,
            ];
        }
        $response = json_decode(trim($curl_response), true);

        return $response;
    }

    /**
     * Write script HTML tag in you HTML code
     * Insert before </head> tag
     * @param array|null $configuration
     * @return string
     */
    public function htmlScriptTagJsApi(?array $configuration = []): string
    {
        if (!$this->enabled) {
            return '';
        }

        $this->setApiUrls();
        $html = "<script src=\"" . $this->api_js_url . "?render={$this->api_site_key}\"></script>";
        $action = Arr::get($configuration, 'action', 'homepage');
        $token_name = config('recaptcha.token_name');
        $validate_function = "if (token){
        console.log(token);
                   document.getElementById('{$token_name}').value=token;
                }";

        $html .= "<script>
                  grecaptcha.ready(function() {
                      grecaptcha.execute('{$this->api_site_key}', {action: '{$action}'}).then(function(token) {
                        {$validate_function}
                      });
                  });
		     </script>";

        return $html;
    }

    public function recaptchaInput(): string
    {
        $token_name = config('recaptcha.token_name');
        if (!$this->enabled) {
            return "<input type=\"hidden\" name=\"{$token_name}\" id=\"{$token_name}\" value=\"token\">";
        }

        return "<input type=\"hidden\" name=\"{$token_name}\" id=\"{$token_name}\">";
    }
}
