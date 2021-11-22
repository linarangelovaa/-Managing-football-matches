<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Add player') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <!-- Validation Errors -->
                    <x-auth-validation-errors class="mb-4" :errors="$errors" />

                    <form method="POST" action="{{ route('players.store') }}">
                        @csrf

                        <!-- Name -->
                        <div>
                            <x-label for="name" :value="__('Name')" />

                            <x-input id="name" class="block mt-1 w-full" type="text" name="name"
                                value="{{ old('name') }}" required autofocus />
                        </div>

                        <!--  Year Founded -->

                        <div class="mt-4">
                            <x-label for="birthdate" :value="__('Date of birth')" />

                            <x-input id="birthdate" class="block mt-1 w-full" type="date" name="birthdate"
                                value="{{ old('birthdate') }}" required />
                        </div>

                        <x-label for="team" :value="__('Team')" />

                        <select name="teams[]" id="team" value="{{ old('team') }}"
                            class="block mt-1 w-full rounded-md shadow-sm border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                            @foreach ($teams as $team)
                                <option value="{{ $team->id }}">{{ $team->name }}</option>
                            @endforeach
                        </select>
                </div>




                <div class="flex items-center justify-end mt-4">
                    <x-button class="ml-4">
                        {{ __('Save') }}
                    </x-button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>

    <x-slot name="script">

    </x-slot>
</x-app-layout>
