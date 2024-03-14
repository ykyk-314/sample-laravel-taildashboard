@extends('admin._layouts.master')

@section('body')
    <h2 class="text-gray-700 text-3xl font-semibold">User</h2>

    <div class="mt-8">
        <div class="mt-4">
            <div class="p-6 bg-white rounded-md shadow-md">
                <h2 class="text-lg text-gray-700 font-semibold capitalize">Account settings</h2>

                <form method="post" action="{{ route('admin.users.update', $user) }}">
                    @csrf
                    @method('patch')
            
                    <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mt-4">
                        <div>
                            <label class="text-gray-700" for="username">Name</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" id="name" name="name" type="text" value="{{old('name', $user->name)}}">
                            <x-input-error class="mt-2" :messages="$errors->get('name')" />
                        </div>

                        <div>
                            <label class="text-gray-700" for="emailAddress">Email</label>
                            <input class="form-input w-full mt-2 rounded-md focus:border-indigo-600" id="email" name="email" type="email" value="{{old('email', $user->email)}}">
                            <x-input-error class="mt-2" :messages="$errors->get('email')" />
                        </div>
                    </div>

                    <div class="flex justify-end mt-4">
                        <button type="submit" class="px-4 py-2 bg-gray-800 text-gray-200 rounded-md hover:bg-gray-700 focus:outline-none focus:bg-gray-700">Save</button>
                    </div>
                    @if (session('status') === 'user-updated')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-sm text-green-600 dark:text-green-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                    @if (session('status') === 'user-update-failed')
                        <p
                            x-data="{ show: true }"
                            x-show="show"
                            x-transition
                            x-init="setTimeout(() => show = false, 3000)"
                            class="text-sm text-red-600 dark:text-red-400"
                        >{{ __('Saved.') }}</p>
                    @endif
                </form>
            </div>
        </div>
    </div>
@endsection