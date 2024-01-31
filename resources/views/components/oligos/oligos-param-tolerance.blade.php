<div class="p-4 my-3 bg-gray-300 shadow shadow-gray-800">

    <label class="block">

        <span class="text-gray-700">Tolerance</span>

        <input
            class="block px-0.5 mt-0 w-full text-center border-0 border-b-2 border-gray-200 focus:ring-0 focus:border-black"
            type="number" step="0.1" min="0" wire:model="tolerance"
            wire:change.debounce="setParametre('tolerance')">

    </label>

</div>
