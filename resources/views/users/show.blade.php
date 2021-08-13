<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-3xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <div class="bg-white shadow overflow-hidden sm:rounded-lg">
                    <div class="px-4 py-5 sm:px-6">
                        <h3 class="text-lg leading-6 font-medium text-gray-900">
                            <span class="text-indigo-700">{{ $user['firstname'] }} {{ $user['lastname'] }}</span> Information
                        </h3>
                        <p class="mt-1 max-w-2xl text-sm text-gray-500">
                            User information and actions.
                        </p>
                    </div>
                    <div class="border-t border-gray-200">
                        <dl>
                            @foreach($user as $field => $value)
                            @isset($fields[$field])
                            <div class="bg-gray-{{ $loop->even ? '100' : '50' }} px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    {{ $fields[$field] }}
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    {{ $user[$field] }}
                                </dd>
                            </div>
                            @endisset
                            @endforeach

                            <div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
                                <dt class="text-sm font-medium text-gray-500">
                                    Actions
                                </dt>
                                <dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
                                    <div class="d-flex">
                                        <form method="POST" action="{{ route('users.destroy', $user['id']) }}">
                                            @csrf
                                            @method('DELETE')

                                            <button class="py-2 px-4 bg-red-600 text-white rounded hover:bg-red-500">
                                                Delete
                                            </button>
                                        </form>
                                    </div>
                                </dd>
                            </div>
                        </dl>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
