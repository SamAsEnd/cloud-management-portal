<?php

namespace Tests\Feature\CloudStack;

use App\CloudStack\Client;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ClientTest extends TestCase
{
    public function test_client_is_resolvable()
    {
        try {
            $client = app(Client::class);

            $this->assertInstanceOf(Client::class, $client);
        } catch (BindingResolutionException $ex) {
            $this->fail($ex->getMessage());
        }
    }

    public function test_client_load_enviroment_variables()
    {
        $client = app(Client::class);

        $this->assertEquals('http://localhost:8080/client', $client->getEndpoint());
        $this->assertEquals('some-random-key', $client->getKey());
        $this->assertEquals('some-random-secret', $client->getSecret());
    }
}
