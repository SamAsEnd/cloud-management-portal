<?php

namespace App\Http\Controllers;

use App\CloudStack\UserRepository;
use App\Http\Requests\CreateUserRequest;

class UserController extends Controller
{
    const FIELD_MAP = [
        'id' => 'User ID',
        'username' => 'Username',
        'firstname' => 'First Name',
        'lastname' => 'Last Name',
        'email' => 'E-Mail Address',
        'created' => '2021-08-11T12:14:13+0000',
        'state' => 'State',
        'account' => 'Account',
        'accounttype' => 'Account Type',
        'usersource' => 'User Source',
        'roleid' => 'Role ID',
        'roletype' => 'Role Type',
        'rolename' => 'Role Name',
        'domainid' => 'Domain ID',
        'domain' => 'Domain',
        'apikey' => 'API Key',
        'accountid' => 'Account ID',
    ];

    protected UserRepository $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        $users = $this->repository->listUsers();

        return view('users.index', compact('users'));
    }

    public function create()
    {
        return view('users.create');
    }

    public function store(CreateUserRequest $request)
    {
        $this->repository->createUser($request->validated());

        return redirect()->route('users.index')
            ->with('success', 'success')
            ->with('message', 'User registered successfully.');
    }

    public function show($user)
    {
        $user = $this->repository->getUser(['userapikey' => $user]);

        return view('users.show', ['user' => $user, 'fields' => self::FIELD_MAP]);
    }

    public function destroy($id)
    {
        $result = $this->repository->deleteUser(['id' => $id]);

        return redirect()->route('users.index')
            ->with('success', $result['success'])
            ->with('message', $result['displaytext']);
    }
}
