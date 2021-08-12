<?php

namespace App\CloudStack;

/**
 * @method listUsers(array $parameters)
 * @method createUser(array $parameters)
 * @method getUser(array $parameters)
 * @method lockUser(array $parameters)
 * @method disableUser(array $parameters)
 * @method updateUser(array $parameters)
 * @method deleteUser(array $parameters)
 *
 * @see https://cloudstack.apache.org/api/apidocs-4.15/
 */
class UserRepository
{
    protected Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function __call($name, $arguments)
    {
        return $this->client->exec($name, [...$arguments])->json();
    }
}
