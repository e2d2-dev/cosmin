<?php
namespace App\Livewire\Page;

use Livewire\Component;
use Livewire\WithPagination;

abstract class BasePage extends Component
{
    use WithPagination;

    public string $view = '';

    public function getHeading(): string
    {
        return $this->getTitle();
    }

    public function getSubHeading(): ?string
    {
        return null;
    }

    public function getHeaderBadge(): ?string
    {
        return null;
    }

    public function getNavigationBadge(): ?string
    {
        return null;
    }

    public function render()
    {
        return view($this->view, [
            'headerBadge' => $this->getHeaderBadge(),
        ]);
    }

    protected static function getBaseName(): string
    {
        return str(class_basename(static::class))->snake()->afterLast('_');
    }

    public function getTitle(): string
    {
        return str(str(class_basename(static::class)))->snake(' ')->ucfirst()->toString();
    }

    public function getNavigationLabel(): string
    {
        return static::getTitle();
    }

    protected static function getSlug(): string
    {
        return static::getBaseName();
    }

    protected static function getPluralSlug(): string
    {
        return str(static::getSlug())->plural()->toString();
    }

    public function getNavigationIcon(): ?string
    {
        return null;
    }

    public function getNavigationBadgeColor(): ?string
    {
        return null;
    }

    public function getNavigationGroup(): ?string
    {
        return null;
    }

    public static function getRoute(): string
    {
        $suffix = filled(static::$route)
            ? '/'.static::getAction()
            : '';
        return '/'.static::route(static::$route).$suffix;
    }

    protected static string $route = '';

    public static function getAction(): string
    {
        if(str(class_basename(static::class))->startsWith('Edit')){
            return 'edit';
        }
        if(str(class_basename(static::class))->startsWith('List')){
            return 'index';
        }
        return 'page';
    }

    protected static function route(string $route): string
    {
        return static::getSlug().$route;
    }

    public static function getRouteName(): string
    {
        return static::getSlug().'.'.static::getAction();
    }

    public function getShouldRegisterNavigation(): bool
    {
        return true;
    }
}
