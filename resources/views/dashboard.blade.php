<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-white leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="dark:bg-slate-400 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 dark:bg-slate-400 shadow sm:rounded-lg">
                    <div class="flex justify-end">
                        <button x-data="" x-on:click="$dispatch('open-modal', 'add-subscriber')"
                            class="w-40 px-4 py-5 leading-none text-white bg-green-400 rounded-md hover:bg-green-600 transition ease-in-out duration-150">
                            Add Subscriber
                        </button>
                        <x-modal name="add-subscriber" focusable class="max-w-md">
                            <div class="w-full p-6">
                                <form class="" action="{{ route('addSubscriber') }}" method="POST">
                                    @csrf
                                    <h2 class="text-lg font-medium text-white">
                                        Input a new Subscriber
                                    </h2>

                                    <p class="mt-1 text-sm text-white">
                                        {!! nl2br(__("Module is still under development, please tune in for more updates.\n")) !!}
                                    </p>
                                    <div class="mt-3 flex-1 mx-1">
                                        <x-input-label for="lastName" class="mt-3 block text-base font-medium ">
                                            Last Name:
                                            <span class="text-red-500">*</span>
                                        </x-input-label>
                                        <x-text-input type="text" name="lastName" id="lastName"
                                            class="mt-1 block w-full" required="" />
                                    </div>
                                    <div class="mt-3 flex-1 mx-1">
                                        <x-input-label for="fistName" class="mt-3 block text-base font-medium ">
                                            First Name:
                                            <span class="text-red-500">*</span>
                                        </x-input-label>
                                        <x-text-input type="text" name="firstName" id="fistName"
                                            class="mt-1 block w-full" required="" />
                                    </div>
                                    <div class="mt-3 flex-1 mx-1">
                                        <x-input-label for="middleName" class="mt-3 block text-base font-medium ">
                                            Middle Name:
                                            <span class="text-red-500">*</span>
                                        </x-input-label>
                                        <x-text-input type="text" name="middleName" id="middleName"
                                            class="mt-1 block w-full" required="" />
                                    </div>
                                    <div class="mt-3 flex-1 mx-1">
                                        <x-input-label for="gender" class="mt-3 block text-base font-medium">
                                            Gender:
                                            <span class="text-red-500 opacity-0">*</span>
                                        </x-input-label>
                                        <select name="gender" id="gender"
                                            class="w-full rounded-md h-10 hover:cursor-pointer pl-2 dark:bg-gray-900 dark:text-white dark:border-gray-700">
                                            <option value="" selected disabled>Please
                                                select your Gender...
                                            </option>
                                            <option value="0">MALE</option>
                                            <option value="1">FEMALE</option>
                                            <option value="2">NON-BINARY</option>
                                        </select>
                                    </div>
                                    <div class="mt-3 flex-1 mx-1">
                                        <x-input-label for="address" class="mt-3 block text-base font-medium ">
                                            Address
                                            <span class="text-red-500">*</span>
                                        </x-input-label>
                                        <textarea id="address" name="address" autocomplete="off" rows="4"
                                            class="block mt-1 w-full dark:border-gray-700 rounded-md shadow-sm dark:bg-gray-900 text-white"></textarea>
                                    </div>
                                    <div class="mt-9 flex justify-end">
                                        <x-primary-button class="ms-3 items-center justify-center py-2 w-1/2">
                                            {{ __('Add Subscriber') }}
                                        </x-primary-button>
                                    </div>
                                </form>
                            </div>
                        </x-modal>
                    </div>
                    <div
                        class="relative max-h-[520px] overflow-y-auto shadow-md rounded-lg sm:rounded-lg bg-gray-300 mt-2 scrollbar-none">
                        <table
                            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 rounded-md">
                            <thead
                                class="text-sm text-gray-700 uppercase bg-gray-300 dark:bg-gray-700 dark:text-gray-400 sticky top-0 z-10">
                                <tr>
                                    <th scope="col" class="px-6 py-3">
                                        Name
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Gender
                                    </th>
                                    <th scope="col" class="px-6 py-3">
                                        Address
                                    </th>
                                    <th scope="col" class="flex justify-center lg:justify-end px-6 py-3">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($subscribers as $index => $subscriber)
                                    <tr
                                        class="{{ $index % 2 === 0 ? 'bg-white dark:bg-gray-800' : 'bg-gray-100 dark:bg-gray-700' }} border-b">
                                        <td
                                            class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white max-w-sm overflow-hidden overflow-ellipsis">
                                            <div class="text-base font-semibold">
                                                {{ $subscriber->lastName }}, {{ $subscriber->firstName }}
                                                {{ $subscriber->middleName }}
                                            </div>
                                        </td>
                                        <td class="px-6 py-4 text-gray-900 whitespace-nowrap dark:text-white">
                                            @if ($subscriber->gender == '0')
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-blue-500 me-2"></div>
                                                    Male
                                                </div>
                                            @elseif ($subscriber->gender == '1')
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div>
                                                    Female
                                                </div>
                                            @elseif ($subscriber->gender == '2')
                                                <div class="flex items-center">
                                                    <div class="h-2.5 w-2.5 rounded-full bg-gray-500 me-2"></div>
                                                    Non-Binary
                                                </div>
                                            @endif
                                        </td>
                                        <td class="px-6 py-4">
                                            {{ $subscriber->address }}
                                        </td>
                                        <td class="px-6 py-4">
                                            <div class="flex justify-between lg:justify-end">
                                                <div class="flex mx-1">
                                                    <button x-data=""
                                                        x-on:click="$dispatch('open-modal', 'view-subscriber-{{ $subscriber->id }}')"
                                                        class="mr-1 w-24 px-4 py-2 leading-none text-white bg-green-500 rounded-md hover:bg-green-600 transition ease-in-out duration-150">
                                                        View
                                                    </button>
                                                    <button x-data=""
                                                        x-on:click="$dispatch('open-modal', 'edit-subscriber-{{ $subscriber->id }}')"
                                                        class="mr-1 w-24 px-4 py-2 leading-none text-white bg-indigo-500 rounded-md hover:bg-indigo-600 transition ease-in-out duration-150">
                                                        Edit
                                                    </button>
                                                    <form
                                                        action="{{ route('deleteSubscriber', ['subscriber' => $subscriber->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button
                                                            class="ml-1 w-24 px-4 py-2 leading-none text-white bg-red-500 rounded-md hover:bg-red-600 transition ease-in-out duration-150">
                                                            Delete
                                                        </button>
                                                    </form>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                    <x-modal name="view-subscriber-{{ $subscriber->id }}" focusable class="max-w-md">
                                        <div class="w-full p-6">
                                            <h2 class="text-lg font-medium text-white">
                                                <span class="dark:text-yellow-500">
                                                    {{ $subscriber->firstName }}
                                                    {{ $subscriber->lastName }}'s
                                                </span>
                                                Provider information
                                            </h2>

                                            <p class="mt-1 text-sm text-white">
                                                {!! nl2br(__("Module is still under development, please tune in for more updates.\n")) !!}
                                            </p>
                                            @foreach ($subscriber->details as $detail)
                                            <ul role="list" class="divide-y divide-gray-100">
                                                <x-modal name="edit-provider-{{ $detail->id }}" focusable class="max-w-md">
                                                    <div class="w-full p-6">
                                                        <form class="space-y-4 md:space-y-6"
                                                            action="{{ route('updateProvider', ['subscriber' => $subscriber->id, 'provider' => $detail->id]) }}"
                                                            method="POST">
                                                            @csrf
                                                            @method('patch')
                                                            <h2 class="text-lg font-medium text-white">
                                                                {{ __('Update Provider Information') }}
                                                            </h2>

                                                            <p class="mt-1 text-sm text-white">
                                                                {!! nl2br(__("Module is still under development, please tune in for more updates.\n")) !!}
                                                            </p>
                                                            <div class="mt-3 flex-1 mx-1">
                                                                <x-input-label for="phoneNumber"
                                                                    class="mt-3 block text-base font-medium ">
                                                                    Contact number:
                                                                    <span class="text-red-500">*</span>
                                                                </x-input-label>
                                                                <x-text-input class="block mt-1 w-full" type="text"
                                                                    name="phoneNumber" autocomplete="off" :value="$detail->phoneNumber ?? ''">
                                                                </x-text-input>
                                                                <x-input-error :messages="$errors->get('lName')"
                                                                    class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                            </div>
                                                            <div class="mt-3 flex-1 mx-1">
                                                                <x-input-label for="provider"
                                                                    class="mt-3 block text-base font-medium ">
                                                                    Provider:
                                                                    <span class="text-red-500">*</span>
                                                                </x-input-label>
                                                                <x-text-input class="block mt-1 w-full" type="text"
                                                                    name="provider" autocomplete="off" :value="$detail->provider ?? ''">
                                                                </x-text-input>
                                                                <x-input-error :messages="$errors->get('fName')"
                                                                    class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                            </div>
                                                            <div class="mt-9 flex justify-end">
                                                                <x-primary-button
                                                                    class="ms-3 items-center justify-center py-2 w-1/2">
                                                                    {{ __('Update Provider') }}
                                                                </x-primary-button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </x-modal>
                                                    <li class="flex justify-between gap-x-6 py-5">
                                                        <div class="flex min-w-0 gap-x-4">
                                                            <div class="min-w-0 flex-auto">
                                                                <p class="text-sm font-semibold leading-6 text-white">
                                                                    {{ $detail->provider }}</p>
                                                                <p class="mt-1 truncate text-xs leading-5 text-white">
                                                                    {{ $detail->phoneNumber }}</p>
                                                            </div>
                                                        </div>
                                                        <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                                                            <p class="text-sm leading-6 text-white">Created at:
                                                                {{ $detail->created_at }}
                                                            </p>
                                                            <p class="mt-1 text-xs leading-5 text-white">Last
                                                                updated:
                                                                {{ $detail->updated_at }}
                                                            </p>
                                                        </div>
                                                        <div class="flex">
                                                            <button x-data=""
                                                                x-on:click="$dispatch('open-modal', 'edit-provider-{{ $detail->id }}')"
                                                                class="mr-1 w-24 px-4 leading-none text-white bg-indigo-500 rounded-md hover:bg-indigo-600 transition ease-in-out duration-150">
                                                                Edit
                                                            </button>

                                                            <form
                                                                action="{{ route('deleteProvider', ['subscriber' => $subscriber->id, 'provider' => $detail->id]) }}"
                                                                method="post">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button
                                                                    class="ml-1 w-24 px-4 leading-none text-white bg-red-500 rounded-md hover:bg-red-600 transition ease-in-out duration-150">
                                                                    Delete
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </li>

                                            </ul>
                                            @endforeach
                                            <div class="mt-9 flex justify-end">
                                                <x-primary-button x-data=""
                                                    x-on:click="$dispatch('open-modal', 'add-provider-{{ $subscriber->id }}')"
                                                    class="ms-3 items-center justify-center py-2 w-1/2">
                                                    {{ __('Add Provider') }}
                                                </x-primary-button>
                                            </div>
                                        </div>
                                    </x-modal>
                                    <x-modal name="add-provider-{{ $subscriber->id }}" focusable class="max-w-md">
                                        <div class="w-full p-6">
                                            <form class="space-y-4 md:space-y-6" action="{{ route('addProvider') }}"
                                                method="post">

                                                @csrf
                                                <h2 class="text-lg font-medium text-white">
                                                    {{ __('Add Provider Information') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-white">
                                                    {!! nl2br(__("Module is still under development, please tune in for more updates.\n")) !!}
                                                </p>
                                                <input type="hidden" name="headerID" value="{{ $subscriber->id }}">
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="provider"
                                                        class="mt-3 block text-base font-medium ">
                                                        Provider Name:
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <x-text-input type="text" name="provider" id="provider"
                                                        class="mt-1 block w-full" required="" />
                                                </div>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="phoneNumber"
                                                        class="mt-3 block text-base font-medium ">
                                                        Contact Number:
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <x-text-input type="text" name="phoneNumber" id="phoneNumber"
                                                        class="mt-1 block w-full" required="" />
                                                </div>
                                                <div class="mt-9 flex justify-end">
                                                    <x-primary-button
                                                        class="ms-3 items-center justify-center py-2 w-1/2">
                                                        {{ __('Add Provider') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </x-modal>
                                    <x-modal name="edit-subscriber-{{ $subscriber->id }}" focusable class="max-w-md">
                                        <div class="w-full p-6">
                                            <form class="space-y-4 md:space-y-6"
                                                action="{{ route('updateSubscriber', ['subscriber' => $subscriber->id]) }}"
                                                method="POST">
                                                @csrf
                                                @method('patch')
                                                <h2 class="text-lg font-medium text-white">
                                                    {{ __('Update Subscriber Information') }}
                                                </h2>

                                                <p class="mt-1 text-sm text-white">
                                                    {!! nl2br(__("Module is still under development, please tune in for more updates.\n")) !!}
                                                </p>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="lastName"
                                                        class="mt-3 block text-base font-medium ">
                                                        Last Name:
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <x-text-input class="block mt-1 w-full" type="text"
                                                        name="lastName" autocomplete="off" :value="$subscriber->lastName ?? ''">
                                                    </x-text-input>
                                                    <x-input-error :messages="$errors->get('lName')"
                                                        class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                </div>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="fistName"
                                                        class="mt-3 block text-base font-medium ">
                                                        First Name:
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <x-text-input class="block mt-1 w-full" type="text"
                                                        name="firstName" autocomplete="off" :value="$subscriber->firstName ?? ''">
                                                    </x-text-input>
                                                    <x-input-error :messages="$errors->get('fName')"
                                                        class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                </div>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="middleName"
                                                        class="mt-3 block text-base font-medium ">
                                                        Middle Name:
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <x-text-input class="block mt-1 w-full" type="text"
                                                        name="middleName" autocomplete="off" :value="$subscriber->middleName ?? ''">
                                                    </x-text-input>
                                                    <x-input-error :messages="$errors->get('equipment')"
                                                        class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                </div>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="gender"
                                                        class="mt-3 block text-base font-medium">
                                                        Gender:
                                                        <span class="text-red-500 opacity-0">*</span>
                                                    </x-input-label>
                                                    <select name="gender" id="gender"
                                                        class="w-full rounded-md h-10 hover:cursor-pointer pl-2 dark:bg-gray-900 dark:text-white dark:border-gray-700">
                                                        <option value="0" class="select-options"
                                                            {{ old('gender', $subscriber->gender) == 0 ? 'selected' : '' }}>
                                                            MALE
                                                        </option>
                                                        <option value="1" class="select-options"
                                                            {{ old('gender', $subscriber->gender) == 1 ? 'selected' : '' }}>
                                                            FEMALE
                                                        </option>
                                                        <option value="2" class="select-options"
                                                            {{ old('gender', $subscriber->gender) == 2 ? 'selected' : '' }}>
                                                            NON-BINARY
                                                        </option>
                                                    </select>
                                                </div>
                                                <div class="mt-3 flex-1 mx-1">
                                                    <x-input-label for="address"
                                                        class="mt-3 block text-base font-medium ">
                                                        Address
                                                        <span class="text-red-500">*</span>
                                                    </x-input-label>
                                                    <textarea id="address" name="address" autocomplete="off" rows="4"
                                                        class="block mt-1 w-full border-gray-800 rounded-md shadow-sm dark:bg-gray-900 text-white">{{ $subscriber->address ?? '' }}</textarea>
                                                    <x-input-error :messages="$errors->get('address')"
                                                        class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                    <x-input-error :messages="$errors->get('address')"
                                                        class="mt-2 text-facilityEaseMain font-bold italic text-sm text-right my-1" />
                                                </div>
                                                <div class="mt-9 flex justify-end">
                                                    <x-primary-button
                                                        class="ms-3 items-center justify-center py-2 w-1/2">
                                                        {{ __('Update Subscriber') }}
                                                    </x-primary-button>
                                                </div>
                                            </form>
                                        </div>
                                    </x-modal>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
