<button wire:click="Store" 
        wire:loading.attr="disabled" 
        {{ $attributes->merge(['class' => 'btn btn-primary']) }}
        >

    <span wire:loading.remove wire:target="Store">
        Guardar
    </span>

    <span wire:loading wire:target="Store">
        Procesando
    </span>

</button>