<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('All players') }}
        </h2>

    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if (Auth::user()->isAdmin())
                        <a class="ml-4 inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                            href="{{ route('players.create') }}">
                            {{ __('New player') }}</a>
                    @endif
                    <div class="">
                        <div class="md:px-32 py-8 w-full">
                            <div class="shadow overflow-hidden rounded border-b border-gray-200">
                                <table class="min-w-full bg-white">
                                    <thead class="bg-gray-800 text-white">
                                        <tr>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Name
                                            </th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">
                                                Date of birth
                                            </th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">Team
                                            </th>
                                            <th class="w-1/3 text-left py-3 px-4 uppercase font-semibold text-sm">

                                            </th>

                                        </tr>
                                    </thead>
                                    <tbody class="text-gray-700">
                                        @foreach ($players as $player)
                                            <tr data-id="{{ $player->id }}">
                                                <td class="w-1/3 text-left py-3 px-4">{{ $player->name }}</td>
                                                <td class="w-1/3 text-left py-3 px-4">{{ $player->birthdate }}</td>

                                                <td class="w-1/3 text-left py-3 px-4">
                                                    {{-- @foreach ($player->teams as $team) --}}

                                                    {{ $player->team->name }}
                                                    {{-- @endforeach --}}
                                                </td>
                                                <td class="text-left py-3 px-4">
                                                    @if (Auth::user()->role->name == 'Admin')
                                                        <div class="mx-5  px-5">
                                                            <div class="my-2">

                                                                <a href="{{ route('players.edit', $player->id) }}"
                                                                    class="ml-4 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                                    type="submit">Edit</a>
                                                                {{-- </form> --}}
                                                            </div>
                                                            <form action="{{ route('players.destroy', $player->id) }}"
                                                                method="POST">
                                                                @method('DELETE')
                                                                @csrf
                                                                <button
                                                                    class="ml-4 inline-flex items-center px-2 py-1 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 transition ease-in-out duration-150"
                                                                    type="submit">Delete</button>
                                                            </form>


                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <x-slot name="script">
        <script>

        </script>
    </x-slot>
</x-app-layout>
