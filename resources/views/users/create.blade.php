<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('User Management') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-5xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg p-8">
                <div class="mt-10 sm:mt-0">
                    <div class="md:grid md:grid-cols-3 md:gap-6">
                        <div class="md:col-span-1">
                            <div class="px-4 sm:px-0">
                                <h3 class="text-lg font-medium leading-6 text-gray-900">Register User</h3>
                                <p class="mt-1 text-sm text-gray-600">
                                    Creates the user under the specified account. If no account is specified, the
                                    username will be used as the account name.
                                </p>
                            </div>
                        </div>
                        <div class="mt-5 md:mt-0 md:col-span-2">
                            <form action="{{ route('users.store') }}" method="POST">
                                @csrf

                                <div class="shadow overflow-hidden sm:rounded-md">
                                    <div class="px-4 py-5 bg-white sm:p-6">
                                        <div class="grid grid-cols-6 gap-6">
                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="username" value="{{ __('Username') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="username"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="text" name="username" :value="old('username')"
                                                             required autofocus/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="account" value="{{ __('Account') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="account"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="text" name="account" :value="old('account')"
                                                             required/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <x-jet-label for="firstname" value="{{ __('First Name') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="firstname"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="text" name="firstname" :value="old('firstname')"
                                                             required/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-3">
                                                <x-jet-label for="lastname" value="{{ __('Last Name') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="lastname"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="text" name="lastname" :value="old('lastname')"
                                                             required/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="email" value="{{ __('E-Mail Addresss') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="email"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="email" name="email" :value="old('email')" required
                                                             autofocus/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="roleid" value="{{ __('Role ID') }}"
                                                             class="block text-sm font-medium text-gray-700"/>
                                                <x-jet-input id="roleid"
                                                             class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                                             type="number" name="roleid" :value="old('roleid')" required
                                                             autofocus/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="password" value="{{ __('Password') }}"/>
                                                <x-jet-input id="password" class="block mt-1 w-full" type="password"
                                                             name="password" required autocomplete="new-password"/>
                                            </div>

                                            <div class="col-span-6 sm:col-span-4">
                                                <x-jet-label for="password_confirmation"
                                                             value="{{ __('Confirm Password') }}"/>
                                                <x-jet-input id="password_confirmation" class="block mt-1 w-full"
                                                             type="password" name="password_confirmation" required
                                                             autocomplete="new-password"/>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
                                        <button type="submit"
                                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                            Register
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
