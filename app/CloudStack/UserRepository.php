<?php

namespace App\CloudStack;

use Illuminate\Support\Collection;

class UserRepository
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function listUsers(array $parameters = []): Collection
    {
        $result = $this->client->exec('listUsers', $parameters)->json();

        return collect($result['listusersresponse']['user'] ?? []);
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function getUser(array $parameters = []): array
    {
        return $this->client->exec('getUser', $parameters)->json();
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function createUser(array $parameters = []): array
    {
        return $this->client->exec('createUser', $parameters)->json();
    }

    /**
     * @throws \Illuminate\Http\Client\RequestException
     */
    public function deleteUser(array $parameters = []): array
    {
        return $this->client->exec('deleteUser', $parameters)->json();
    }
}
