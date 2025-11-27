<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('My Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="mb-4 bg-green-900 border border-green-700 text-green-300 px-4 py-3 rounded relative" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-xl sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    
                    <div class="flex justify-between items-center mb-6">
                        <h3 class="text-lg font-medium text-gray-200">Program List</h3>
                        <a href="{{ route('company.programs.create') }}" class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-lg shadow-indigo-500/30 flex items-center gap-2">
                            <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path></svg>
                            Create New Program
                        </a>
                    </div>

                    <div class="overflow-x-auto">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Title</th>
                                    <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Slug</th>
                                    <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-left text-xs font-semibold text-gray-300 uppercase tracking-wider">Reward Range</th>
                                    <th class="px-5 py-3 border-b border-gray-600 bg-gray-700 text-right text-xs font-semibold text-gray-300 uppercase tracking-wider">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($programs as $program)
                                    <tr class="hover:bg-gray-700 transition-colors">
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm font-bold text-white">
                                            {{ $program->title }}
                                            @if($program->is_public)
                                                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-900 text-green-300 border border-green-700">
                                                    Public
                                                </span>
                                            @else
                                                <span class="ml-2 px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-900 text-red-300 border border-red-700">
                                                    Private
                                                </span>
                                            @endif
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm text-gray-400 font-mono">
                                            {{ $program->slug }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm text-gray-300">
                                            Rp {{ number_format($program->reward_min) }} - {{ number_format($program->reward_max) }}
                                        </td>
                                        <td class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm text-right">
                                            <div class="flex justify-end gap-3">
                                                <a href="{{ route('company.programs.edit', $program) }}" class="text-indigo-400 hover:text-indigo-300 font-medium">Edit</a>
                                                
                                                <form action="{{ route('company.programs.destroy', $program) }}" method="POST" class="inline" onsubmit="return confirm('Are you sure?');">
                                                    @csrf @method('DELETE')
                                                    <button type="submit" class="text-red-400 hover:text-red-300 font-medium">Delete</button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="4" class="px-5 py-5 border-b border-gray-700 bg-gray-800 text-sm text-center text-gray-500">
                                            No programs created yet.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="mt-4">
                        {{ $programs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>