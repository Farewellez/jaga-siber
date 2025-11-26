<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Create New Program') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <form action="{{ route('company.programs.store') }}" method="POST" class="space-y-6">
                        @csrf

                        <!-- Title -->
                        <div>
                            <x-input-label for="title" :value="__('Program Title')" />
                            <x-text-input id="title" name="title" type="text" class="mt-1 block w-full" :value="old('title')" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('title')" />
                        </div>

                        <!-- Description -->
                        <div>
                            <x-input-label for="description" :value="__('Description')" />
                            <textarea id="description" name="description" rows="4" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('description') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('description')" />
                        </div>

                        <!-- Scope -->
                        <div>
                            <x-input-label for="scope" :value="__('Scope (Target URLs)')" />
                            <textarea id="scope" name="scope" rows="3" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" required>{{ old('scope') }}</textarea>
                            <x-input-error class="mt-2" :messages="$errors->get('scope')" />
                        </div>

                        <!-- Rewards -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div>
                                <x-input-label for="reward_min" :value="__('Min Reward (IDR)')" />
                                <x-text-input id="reward_min" name="reward_min" type="number" class="mt-1 block w-full" :value="old('reward_min')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('reward_min')" />
                            </div>
                            <div>
                                <x-input-label for="reward_max" :value="__('Max Reward (IDR)')" />
                                <x-text-input id="reward_max" name="reward_max" type="number" class="mt-1 block w-full" :value="old('reward_max')" required />
                                <x-input-error class="mt-2" :messages="$errors->get('reward_max')" />
                            </div>
                        </div>

                        <!-- Is Public Checkbox -->
                        <div class="block mt-4">
                            <label for="is_public" class="inline-flex items-center">
                                <input id="is_public" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="is_public" value="1" {{ old('is_public', true) ? 'checked' : '' }}>
                                <span class="ms-2 text-sm text-gray-600">{{ __('Public Program (Visible to all Hunters)') }}</span>
                            </label>
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Create Program') }}</x-primary-button>
                            <a href="{{ route('company.programs.index') }}" class="text-gray-600 hover:text-gray-900">{{ __('Cancel') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>