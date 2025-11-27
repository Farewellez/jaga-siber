<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-100 leading-tight">
            Submit Report for: <span class="text-indigo-400">{{ $program->title }}</span>
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-gray-800 border border-gray-700 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-100">
                    
                    <form action="{{ route('hunter.reports.store') }}" method="POST" enctype="multipart/form-data" class="space-y-6">
                        @csrf
                        
                        <input type="hidden" name="program_id" value="{{ $program->id }}">

                        <div>
                            <x-input-label for="title" :value="__('Bug Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus placeholder="e.g. SQL Injection on Login Page" />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <div>
                            <x-input-label for="severity" :value="__('Severity Level')" />
                            <select id="severity" name="severity" class="mt-1 block w-full rounded-md border-gray-600 bg-gray-900 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                                <option value="low">Low (Minor Impact)</option>
                                <option value="medium">Medium (Significant Impact)</option>
                                <option value="high">High (System Compromise)</option>
                                <option value="critical">Critical (Immediate Action Required)</option>
                            </select>
                            <x-input-error class="mt-2" :messages="$errors->get('severity')" />
                        </div>

                        <div>
                            <x-input-label for="description" :value="__('Description & Steps to Reproduce')" />
                            <textarea id="description" name="description" rows="6" 
                                class="mt-1 block w-full rounded-md border-gray-600 bg-gray-900 text-gray-100 shadow-sm focus:border-indigo-500 focus:ring-indigo-500 placeholder-gray-500" 
                                required placeholder="1. Go to...&#10;2. Click...">{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <div class="p-4 bg-gray-900 rounded-lg border border-dashed border-gray-600">
                            <x-input-label for="attachment" :value="__('Proof of Concept (Screenshot/Log/Video)')" />
                            <input id="attachment" name="attachment" type="file" 
                                class="mt-2 block w-full text-sm text-gray-400 file:mr-4 file:py-2 file:px-4 file:rounded-full file:border-0 file:text-sm file:font-semibold file:bg-indigo-600 file:text-white hover:file:bg-indigo-500 cursor-pointer" />
                            <p class="text-xs text-gray-500 mt-2">Allowed: pdf, jpg, png, txt, zip. Max 10MB.</p>
                            <x-input-error class="mt-2" :messages="$errors->get('attachment')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Submit Report') }}</x-primary-button>
                            <a href="{{ route('hunter.reports.index') }}" class="text-gray-400 hover:text-gray-200 transition">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>