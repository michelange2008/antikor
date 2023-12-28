<div class="md:flex">
    <div class="basis-11/12">
        <x-forms.input-text name="Sous-titre" id="nom" model="programmesoustitre"
        wire:keydown.enter="update"></x-forms.input-text>
    </div>
    <div class="basis-1/12 md:ml-2">
        <x-forms.input-text name="Ordre" id="ordre" model="programmesoustitre"
            wire:keydown.enter="update"></x-forms.input-text>
    </div>
</div>
