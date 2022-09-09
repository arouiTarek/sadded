<?php

namespace Shahdah\Sadded;

use Shahdah\Sadded\Providers\ProviderFactory;

/**
 * Class Sadded
 * @package Shahdah\Sadded
 */
class Sadded
{

    public function __construct(
        public readonly string $provider
    ) {
    }

    public  function getway()
    {
        $factory = new ProviderFactory();
        $getway = $factory->create($this->provider);
        return $getway;
    }
}
