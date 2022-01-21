<?php

namespace App\Services;

use App\Support\PayWebSettings;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Psr\Http\Message\ResponseInterface;

class PayWebService
{
    /**
     * @var \Illuminate\Config\Repository
     */
    protected $config;

    protected $returnUrl = '/thanks';
    /**
     * @var string
     */
    protected $countryCode;
    /**
     * @var string
     */
    protected $email;

    /**
     * PayWebService constructor.
     */
    public function __construct(array $config = [])
    {
        $this->config = $this->config ?: config('services.paygate');
    }

    public function initiate(string $reference, int $amount, string $email)
    {
        $settings = $this->getSettings($reference, $amount, $email);
        $checksum = $this->getChecksum($settings);

        $settings['CHECKSUM'] = $checksum;

        $client = new Client();
        $response = $client->post($this->config['endpoint'] . '/initiate.trans', [
            'form_params' => $settings,
        ]);

        return $this->getResponseParts($response);
    }

    protected function getSettings(string $reference, int $amount, string $email)
    {
        $settings = [
            'PAYGATE_ID' => $this->config['id'],
            'REFERENCE' => $reference,
            'AMOUNT' => $amount,
            'CURRENCY' => 'ZAR',
            'RETURN_URL' => route('members.paid'),
            'TRANSACTION_DATE' => now()->format('Y-m-d H:i:s'),
            'LOCALE' => 'en-za',
            'COUNTRY' => 'ZAF',
            'EMAIL' => $email,
        ];

        return $settings;
    }

    protected function getChecksum(array $settings)
    {
        return md5(implode('', $settings) . $this->config['secret']);
    }

    protected function getResponseChecksum($payRequestId)
    {
        return md5($this->config['id'] . $payRequestId . $this->config['secret']);
    }

    protected function getResponseParts(ResponseInterface $response)
    {
        $parts = explode('&', $response->getBody()->getContents());
        $body = [];
        foreach ($parts as $part) {
            $p = explode('=', $part);
            $body[$p[0]] = $p[1];
        }

        return $body;
    }
}
