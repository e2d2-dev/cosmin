<?php

namespace App;

class Form
{
    protected array $schema = [];
    public static function make(): static
    {
        return app(static::class);
    }

    public function schema(array $components = []): static
    {
        $this->schema = $components;
        return $this;
    }
}
