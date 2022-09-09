<?php

namespace Shahdah\Sadded\Providers;

abstract class Provider
{
    abstract public function customer(array $customerData): object;
    abstract public function setCredentials(array $credentials): void;
    abstract public function setCallbackUrl(string $callbackUrl): void;
    abstract public function charge(float $amount, string $currency): ?object;
    abstract public function setResponse(array $response): void;
    abstract public function getResponse(): ?array;
    abstract public function setPaymentUrl(string $url): void;
    abstract public function getPaymentUrl(): ?string;
    abstract public function getChargeResponse(mixed $tap_id): ?array;
}
