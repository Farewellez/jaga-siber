<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Active Bug Bounty Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($programs as $program)
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:shadow-md transition-shadow duration-200">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-bold text-gray-900 mb-2">{{ $program->title }}</h3>
                                <span class="bg-blue-100 text-blue-800 text-xs font-semibold px-2.5 py-0.5 rounded">Active</span>
                            </div>
                            
                            <p class="text-gray-600 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($program->description, 100) }}
                            </p>

                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Rewards</p>
                                <p class="text-green-600 font-bold">
                                    Rp {{ number_format($program->reward_min) }} - Rp {{ number_format($program->reward_max) }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Scope</p>
                                <code class="text-xs bg-gray-100 p-1 rounded block mt-1 truncate">{{ $program->scope }}</code>
                            </div>

                            <a href="{{ route('hunter.reports.create', $program) }}" 
                               class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline transition duration-150 ease-in-out">
                                Submit Report
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 bg-white rounded-lg shadow">
                        <p class="text-gray-500 text-lg">No active programs found.</p>
                        <p class="text-gray-400 text-sm">Wait for companies to post new bounties.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>