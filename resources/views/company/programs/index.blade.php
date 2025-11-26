<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('My Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <a href="{{ route('company.programs.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded mb-4 inline-block">Create New Program</a>
                    <table class="min-w-full table-auto">
                        <thead>
                            <tr>
                                <th class="px-4 py-2">Title</th>
                                <th class="px-4 py-2">Slug</th>
                                <th class="px-4 py-2">Reward Min</th>
                                <th class="px-4 py-2">Reward Max</th>
                                <th class="px-4 py-2">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($programs as $program)
                                <tr>
                                    <td class="px-4 py-2">{{ $program->title }}</td>
                                    <td class="px-4 py-2">{{ $program->slug }}</td>
                                    <td class="px-4 py-2">{{ $program->reward_min }}</td>
                                    <td class="px-4 py-2">{{ $program->reward_max }}</td>
                                    <td class="px-4 py-2">
                                        <a href="{{ route('company.programs.edit', $program) }}" class="text-blue-500">Edit</a>
                                        <form action="{{ route('company.programs.destroy', $program) }}" method="POST" class="inline">
                                            @csrf @method('DELETE')
                                            <button type="submit" class="text-red-500">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <div class="mt-4">
                        {{ $programs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>