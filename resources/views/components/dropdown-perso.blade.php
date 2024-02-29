            <!-- Settings Dropdown -->
            <div class="hidden sm:flex sm:items-center sm:ml-6 hover:border-b-2 hover:border-gray-300">
                <x-dropdown align="right" width="48">
                    <x-slot name="trigger">
                        <button
                            class="inline-flex items-center px-3 py-2 text-sm font-medium leading-4 text-gray-500 bg-white rounded-md transition duration-150 ease-in-out dark:text-gray-400 dark:bg-gray-800 hover:text-gray-700 dark:hover:text-gray-300 focus:outline-none">
                            <div>{{ ucfirst(__('menu.' . $haut)) }}</div>

                            <div class="ml-1">
                                <svg class="w-4 h-4 fill-current" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd"
                                        d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                                        clip-rule="evenodd" />
                                </svg>
                            </div>
                        </button>
                    </x-slot>

                    <x-slot name="content">
                        @foreach ($bas as $item)
                            <x-dropdown-link :href="route($item['route'])" wire:navigate>
                                {{ ucfirst(__('menu.' . $item['name'])) }}
                            </x-dropdown-link>
                        @endforeach


                    </x-slot>
                </x-dropdown>
            </div>
