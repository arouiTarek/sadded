<?php

namespace Shahdah\Sadded;

class Sadded
{

    public function __construct(
        public readonly string $provider,
    ) {
    }

    public function getway()
    {
        $getway = 'Shahdah\\Sadded\\providers\\' . $this->provider;
        return  new $getway();
    }
}
