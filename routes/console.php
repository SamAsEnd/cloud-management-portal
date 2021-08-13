<?php

use App\CloudStack\UserRepository;
use Illuminate\Support\Facades\Artisan;

Artisan::command('stack:list-users', function (UserRepository $repository) {
    dump($repository->listUsers());
});

Artisan::command('stack:get-user {id}', function (UserRepository $repository) {
    dump($repository->getUser(['id' => $this->argument('id')]));
});

Artisan::command('stack:create-user {firstname} {lastname} {email} {roleid}', function (UserRepository $repository) {
    /** @var \Illuminate\Console\Command $this */
    $password = $this->secret('Password: ');

    dump($repository->createUser([
        'account' => $this->argument('email'),
        'username' => $this->argument('email'),
        'email' => $this->argument('email'),
        'firstname' => $this->argument('firstname'),
        'lastname' => $this->argument('lastname'),
        'password' => $password,
        'roleid' => $this->argument('roleid'),
    ]));
});

Artisan::command('stack:delete-user {id}', function (UserRepository $repository) {
    dump($repository->deleteUser(['id' => $this->argument('id')]));
});
