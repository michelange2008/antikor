<button {{ $attributes }}
    type="button"
    class=" btn
    bg-{{ $color }}-800 hover:bg-{{ $color }}-600 focus:ring-{{ $color }}-600 active:bg-{{ $color }}-900  active:ring-{{ $color }}-900

    ">

    {{ $slot }}

</button>
