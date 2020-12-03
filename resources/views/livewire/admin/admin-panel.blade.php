<div>
    <div class="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
        <div>
            <!-- Add Team Member -->
            <div class="mt-10 sm:mt-0">
                <div class="md:grid md:grid-cols-3 md:gap-6">
                    <x-jet-section-title>
                        <x-slot name="title">{{ __('Gestionar administradores') }}</x-slot>
                        <x-slot name="description">
                            {{ __('Otorga permisos de administrador a una cuenta para que colabore con la administración de la página.') }}
                        </x-slot>
                    </x-jet-section-title>

                    <div class="mt-5 md:mt-0 md:col-span-2">
                        <div class="shadow overflow-hidden sm:rounded-md">
                            <form wire:submit.prevent="addAdmin">
                                <div class="px-4 py-5 bg-white sm:p-6">
                                    <div class="grid grid-cols-6 gap-6">
                                        <div class="col-span-6">
                                            <div class="max-w-xl text-sm text-gray-600">
                                                {{ __('Ingresa el correo de la persona que te gustaría añadir como administrador. Este correo debe estar asociado a una cuenta existente.') }}
                                            </div>
                                        </div>

                                        <!-- Member Email -->
                                        <div class="col-span-6 sm:col-span-4">
                                            <x-jet-label for="email" value="{{ __('Correo') }}" />
                                            <input name="email" type="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                                wire:model="email">
                                            <x-jet-input-error for="email" class="mt-2" />
                                            @if (session()->has('failed'))
                                                <p class="text-sm text-red-600 mt-2">{{ session('failed') }}</p>
                                            @endif
                                            @if (session()->has('repeated'))
                                                <p class="text-sm text-red-600 mt-2">{{ session('repeated') }}</p>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                                    @if (session()->has('success'))
                                        <div class="bg-green-200 mr-4 rounded px-4 py-1" x-data="{ show: true }"
                                            x-show="show" x-init="setTimeout(() => show = false, 4000)">
                                            <p class="text-green-600 font-semibold">{{ session('success') }}</p>
                                        </div>
                                    @endif

                                    <button
                                        class="bg-cm-main-pink inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Añadir') }}
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if ($admins->isNotEmpty())
            <x-jet-section-border />

            <!-- Manage Team Members -->
            <div class="mt-10 sm:mt-0">
                <x-jet-action-section>
                    <x-slot name="title">
                        {{ __('Administradores') }}
                    </x-slot>

                    <x-slot name="description">
                        {{ __('Estas son todas las personas que administran esta página.') }}
                    </x-slot>

                    <!-- Team Member List -->
                    <x-slot name="content">
                        <div class="space-y-6">
                            @foreach ($admins->sortBy('name') as $admin)
                                @if (Auth::user()->id != $admin->id)
                                    <div class="flex items-center justify-between">
                                        <div class="flex items-center">
                                            <img class="w-8 h-8 rounded-full" src="{{ $admin->profile_photo_url }}"
                                                alt="{{ $admin->name }}">
                                            <div class="ml-4">{{ $admin->name }}</div>
                                        </div>

                                        <div class="flex items-center">
                                            <button class="cursor-pointer ml-6 text-sm text-red-500 focus:outline-none"
                                                wire:click="confirmTeamMemberRemoval('{{ $admin->id }}')">
                                                {{ __('Remover') }}
                                            </button>
                                        </div>
                                    </div>
                                @endif
                            @endforeach
                        </div>
                    </x-slot>
                </x-jet-action-section>
            </div>
        @endif
    </div>

    <!-- Remove Team Member Confirmation Modal -->
    <x-jet-confirmation-modal wire:model="confirmingTeamMemberRemoval">
        <x-slot name="title">
            {{ __('Remover administrador') }}
        </x-slot>

        <x-slot name="content">
            {{ __('¿Estás seguro que deseas remover esta persona de su puesto de administrador?') }}
        </x-slot>

        <x-slot name="footer">
            <x-jet-secondary-button wire:click="$toggle('confirmingTeamMemberRemoval')" wire:loading.attr="disabled">
                {{ __('Cancelar') }}
            </x-jet-secondary-button>

            <x-jet-danger-button class="ml-2" wire:click="removeTeamMember" wire:loading.attr="disabled">
                {{ __('Remover') }}
            </x-jet-danger-button>
        </x-slot>
    </x-jet-confirmation-modal>
</div>
