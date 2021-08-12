<?php

namespace Tests\Feature\CloudStack;

use App\CloudStack\Client;
use Illuminate\Contracts\Container\BindingResolutionException;
use Illuminate\Http\Client\Request;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
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
        /** @var Client $client */
        $client = app(Client::class);

        $this->assertEquals('http://localhost:8080/client', $client->getEndpoint());
        $this->assertEquals('some-random-key', $client->getKey());
        $this->assertEquals('some-random-secret', $client->getSecret());
    }

    public function test_client_execute_commands()
    {
        Http::fake();

        // The following test is created from example available in the following link (including the key and secret)
        // http://docs.cloudstack.apache.org/en/latest/developersguide/dev.html#how-to-sign-an-api-call-with-python
        config([
            'services.cloudstack.endpoint' => 'http://localhost:8080/client/api',
            'services.cloudstack.key' => 'plgWJfZK4gyS3mOMTVmjUVg-X-jlWlnfaUJ9GAbBbf9EdM-kAYMmAiLqzzq1ElZLYq_u38zCm0bewzGUdP66mg',
            'services.cloudstack.secret' => 'VDaACYb0LV9eNjTetIOElcVQkvJck_J_QljX_FcHRj87ZKiy0z0ty0ZsYBkoXkY9b7eq1EhwJaw7FF3akA3KBQ',
        ]);

        /** @var Client $client */
        $client = app(Client::class);

        try {
            $client->exec('listUsers');
        } catch (RequestException $ex) {
            $this->fail($ex->getMessage());
        }

        Http::assertSent(function (Request $request) {
            return $request->url() === 'http://localhost:8080/client/api?'.
                'apikey=plgWJfZK4gyS3mOMTVmjUVg-X-jlWlnfaUJ9GAbBbf9EdM-kAYMmAiLqzzq1ElZLYq_u38zCm0bewzGUdP66mg&'.
                'command=listUsers&'.
                'response=json&'.
                'signature=TTpdDq%2F7j%2FJ58XCRHomKoQXEQds%3D';
        });
    }
}
