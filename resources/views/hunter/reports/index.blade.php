<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Active Bug Bounty Programs') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            @if(session('success'))
                <div class="bg-green-900 border border-green-700 text-green-300 px-4 py-3 rounded relative mb-4" role="alert">
                    <span class="block sm:inline">{{ session('success') }}</span>
                </div>
            @endif

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @forelse($programs as $program)
                    <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-lg rounded-xl hover:border-indigo-500 transition-colors duration-200">
                        <div class="p-6">
                            <div class="flex justify-between items-start">
                                <h3 class="text-xl font-bold text-white mb-2">{{ $program->title }}</h3>
                                <span class="bg-indigo-900 text-indigo-300 text-xs font-semibold px-2.5 py-0.5 rounded border border-indigo-700">Active</span>
                            </div>
                            
                            <p class="text-gray-400 text-sm mb-4 line-clamp-3">
                                {{ Str::limit($program->description, 100) }}
                            </p>

                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Rewards</p>
                                <p class="text-green-400 font-bold font-mono">
                                    Rp {{ number_format($program->reward_min) }} - {{ number_format($program->reward_max) }}
                                </p>
                            </div>

                            <div class="mb-4">
                                <p class="text-xs text-gray-500 uppercase font-semibold">Scope</p>
                                <code class="text-xs bg-gray-900 text-gray-300 p-1 rounded block mt-1 truncate border border-gray-700">{{ $program->scope }}</code>
                            </div>

                            <a href="{{ route('hunter.reports.create', ['program' => $program->id]) }}" 
                               class="block w-full text-center bg-indigo-600 hover:bg-indigo-700 text-white font-bold py-2 px-4 rounded transition duration-150 ease-in-out shadow-lg shadow-indigo-500/30">
                                Submit Report
                            </a>
                        </div>
                    </div>
                @empty
                    <div class="col-span-3 text-center py-10 bg-gray-800 rounded-lg border border-gray-700">
                        <p class="text-gray-400 text-lg">No active programs found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</x-app-layout>