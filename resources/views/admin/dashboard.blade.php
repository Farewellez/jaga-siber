<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Admin Control Center') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-8">
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-indigo-900 bg-opacity-75 text-indigo-400">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="mb-2 text-sm font-medium text-gray-400">Active Programs</p>
                            <p class="text-lg font-semibold text-white">{{ \App\Models\Program::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-red-900 bg-opacity-75 text-red-400">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="mb-2 text-sm font-medium text-gray-400">Total Reports</p>
                            <p class="text-lg font-semibold text-white">{{ \App\Models\Report::count() }}</p>
                        </div>
                    </div>
                </div>
                <div class="bg-gray-800 border border-gray-700 p-6 rounded-lg shadow-lg">
                    <div class="flex items-center">
                        <div class="p-3 rounded-full bg-green-900 bg-opacity-75 text-green-400">
                            <svg class="h-8 w-8" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"></path></svg>
                        </div>
                        <div class="ml-4">
                            <p class="mb-2 text-sm font-medium text-gray-400">Registered Users</p>
                            <p class="text-lg font-semibold text-white">{{ \App\Models\User::count() }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-2 gap-8">
                <div class="bg-gray-800 border border-gray-700 shadow-xl sm:rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h3 class="text-lg font-medium text-gray-100">Newest Users</h3>
                    </div>
                    <div class="p-6">
                        <ul class="divide-y divide-gray-700">
                            @foreach($latestUsers as $user)
                            <li class="py-3 flex justify-between items-center">
                                <div class="flex items-center gap-3">
                                    <div class="w-8 h-8 rounded-full bg-gray-700 flex items-center justify-center text-xs font-bold text-gray-300">
                                        {{ substr($user->name, 0, 1) }}
                                    </div>
                                    <div>
                                        <p class="text-sm font-medium text-white">{{ $user->name }}</p>
                                        <p class="text-xs text-gray-500">{{ $user->email }}</p>
                                    </div>
                                </div>
                                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full 
                                    {{ $user->role === 'admin' ? 'bg-red-900 text-red-200' : 
                                      ($user->role === 'company' ? 'bg-indigo-900 text-indigo-200' : 'bg-green-900 text-green-200') }}">
                                    {{ ucfirst($user->role) }}
                                </span>
                            </li>
                            @endforeach
                        </ul>
                    </div>
                </div>

                <div class="bg-gray-800 border border-gray-700 shadow-xl sm:rounded-lg overflow-hidden">
                    <div class="px-6 py-4 border-b border-gray-700">
                        <h3 class="text-lg font-medium text-gray-100">Latest Vulnerabilities</h3>
                    </div>
                    <div class="p-6">
                        @if($latestReports->isEmpty())
                            <p class="text-gray-500 text-sm">No reports yet.</p>
                        @else
                            <ul class="divide-y divide-gray-700">
                                @foreach($latestReports as $report)
                                <li class="py-3">
                                    <div class="flex justify-between">
                                        <p class="text-sm font-medium text-white">{{ $report->title }}</p>
                                        <span class="text-xs font-bold {{ $report->severity === 'critical' ? 'text-red-500' : 'text-orange-400' }}">
                                            {{ strtoupper($report->severity) }}
                                        </span>
                                    </div>
                                    <div class="flex justify-between mt-1">
                                        <p class="text-xs text-gray-500">
                                            on <span class="text-gray-400">{{ $report->program->title }}</span>
                                        </p>
                                        <span class="text-xs text-indigo-400">{{ $report->status }}</span>
                                    </div>
                                </li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>