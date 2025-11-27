<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            {{ __('Hunter Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    <h3 class="text-lg font-bold mb-4">Welcome back, {{ Auth::user()->name }}!</h3>
                    <p class="text-gray-400 mb-6">Ready to hunt some bugs today?</p>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <a href="{{ route('hunter.reports.index') }}" class="block p-6 bg-gray-900 border border-gray-700 rounded-lg hover:border-indigo-500 transition">
                            <h4 class="font-bold text-indigo-400">Browse Programs</h4>
                            <p class="text-sm text-gray-500 mt-1">Find active bug bounties and start reporting.</p>
                        </a>
                        
                        <div class="p-6 bg-gray-900 border border-gray-700 rounded-lg opacity-50">
                            <h4 class="font-bold text-gray-400">My Earnings (Coming Soon)</h4>
                            <p class="text-sm text-gray-600 mt-1">Track your rewards here.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>