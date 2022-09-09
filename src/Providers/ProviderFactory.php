<?php

namespace Shahdah\Sadded\Providers;

class ProviderFactory
{
    public function create(string $provider = 'tap'): Provider
    {
        $className = "Shahdah\Sadded\Providers\\" . ucfirst($provider) . "\\Provider";
        if (!class_exists($className)) throw new \Exception("class could be not found");
        return new $className();
    }
}
