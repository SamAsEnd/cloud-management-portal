<?php

namespace App\CloudStack;

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
}
