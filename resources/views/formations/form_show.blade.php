<x-app-layout>

    @include('formations.form_show_detail')

    <div class="m-2 sm:mx-6 lg:mx-12 xl:mx-20 2xl:mx-36">


        <a href="{{ route('formations.edit', $formation) }}">
            <x-buttons.success-button>Modifier</x-buttons.success-button>
        </a>
        <x-buttons.cancel-button>Retour à la liste</x-buttons.cancel-button>


    </div>


</x-app-layout>
