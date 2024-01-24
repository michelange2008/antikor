<?php
namespace App\Traits;

use Illuminate\Support\Collection;

trait Oligoelement 
{
    protected string $name;
    protected float $value;

    function __construct__(string $name, float $value)
    {
        $this->name = $name;
        $this->value = $value;
    }

    function set(string $name, float $value) : Collection 
    {
        $oligoelement = collect();
        $oligoelement->name = $name;
        $oligoelement->value = $value;

        return $oligoelement;
    }

    function get () : Collection
    {
        return collect([$this->name, $this->value]);
    }
}
