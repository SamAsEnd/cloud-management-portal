<?php

namespace App\CloudStack;

use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class Client
{
    protected string $endpoint;

    protected string $key;

    protected string $secret;

    public function __construct(array $config)
    {
        $this->endpoint = $config['endpoint'];
        $this->key = $config['key'];
        $this->secret = $config['secret'];
    }

    public function getEndpoint()
    {
        return $this->endpoint;
    }

    public function getKey()
    {
        return $this->key;
    }

    public function getSecret()
    {
        return $this->secret;
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function exec(string $command, array $parameters = []): Response
    {
        $queryParams = $this->buildQueryParameters($command, $parameters);

        $queryString = http_build_query($queryParams);

        $queryParams['signature'] = $this->buildSignature($queryString);

        return Http::get($this->endpoint, $queryParams)->throw();
    }

    private function buildQueryParameters(string $command, array $parameters = null): array
    {
        $additionalParameters = [
            'response' => 'json',
            'command' => $command,
            'apiKey' => $this->key,
        ];

        return collect($parameters + $additionalParameters)
            ->mapWithKeys(fn($value, $key) => [Str::lower($key) => rawurlencode($value)])
            ->sortKeys()
            ->toArray();
    }

    private function buildSignature(string $queryString): string
    {
        $lowered = Str::lower($queryString);

        $signature = hash_hmac('sha1', $lowered, $this->secret, true);

        $based64Encoded = base64_encode($signature);

        return rawurldecode($based64Encoded);
    }
}
