<div class="flex flex-col p-4 my-3 bg-gray-300 shadow shadow-gray-800">

    <p class="px-1 font-bold">{{ $updateOrCreateTitre }}</p>

    <div class="-mt-4">

        <div>

            <x-forms.input-text-save id="name" name="" placeholder="{{ $placeholder}}"
                :model="'name'" />

            <x-toggle-liste :items="$items" :liste="$liste"
                titre="{{ $titre }}" />

            <div wire:click.prevent = "{{ $updateOrCreateMethod }}">

                <x-buttons.success-button>

                    <i class="fa-solid {{ $fa }} "></i> {{ $bouton }}

                </x-buttons.success-button>

            </div>

        </div>

    </div>
