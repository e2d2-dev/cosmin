<?php
namespace App;

use Filament\View\PanelsRenderHook;

class Menu
{
    protected $pages = [];

    public $groups = [];

    public $items = [];

    public $subItems = [
        [
            'label' => 'Filament',
            'url' => '/admin',
            'icon' => 'heart',
            'badge' => 'null',
            'badgeColor' => 'yellow',
        ],
        [
            'label' => 'Lala',
            'url' => 'https://google.com',
            'icon' => 'heart',
            'badge' => null,
            'badgeColor' => null,
        ],
    ];

    public static function make(Panel $panel): static
    {
        return app(static::class, ['panel' => $panel]);
    }

    public function __construct(private Panel $panel)
    {
        $this->build();
    }

    protected function build()
    {
        foreach ($this->panel->getPages() as $class) {
            $page = app($class);

            if($page->getShouldRegisterNavigation()){
                $group = $page->getNavigationGroup() ?? false;

                $item = [
                    'label' => $page->getNavigationLabel(),
                    'route' => $page->getRouteName(),
                    'icon' => $page->getNavigationIcon() ?? null,
                    'badge' => $page->getNavigationBadge() ?? null,
                    'badgeColor' => $page->getNavigationBadgeColor() ?? null,
                ];

                $group ? $this->groups[$group][] = $item : $this->items[] = $item;
            }
        }
    }

    public function getName(): ?string
    {
        return 'Cosmin Starter Kit';
    }

    public function pages(array $pages = []): void
    {
        $this->pages = array_merge($this->pages, $pages);
    }

    public function getItems(): array
    {
        return $this->items;
    }

    public function getGroups(): array
    {
        return array_keys($this->groups);
    }

    public function getGroup(string $group): array
    {
        return $this->groups[$group];
    }

    public function getSubItems(): array
    {
        return $this->subItems;
    }
}
