<?php
namespace App;

use Illuminate\Support\Facades\File;

final class Panel
{
    public $pages = [];

    public $name = 'Cosmin Starter Kit';

    public function getName(): string
    {
        return $this->name;
    }

    public function getMenu()
    {
        return Menu::make($this);
    }

    public static function make()
    {
        return app()->singleton(static::class);
    }

    public function __construct()
    {
        $this->discoverDirectory();
    }

    public function getPages(): array
    {
        return $this->pages;
    }

    protected function discoverDirectory()
    {
        $relative = 'App'.DIRECTORY_SEPARATOR.'Livewire'.DIRECTORY_SEPARATOR.'Pages';

        foreach (File::files(base_path($relative)) as $page) {
            $name = $page->getFilenameWithoutExtension();
            $this->pages[] = str($relative)->replace(DIRECTORY_SEPARATOR, '\\')->append("\\$name")->toString();
        }
    }

    public static function get(): static
    {
        return app(static::class);
    }
}
