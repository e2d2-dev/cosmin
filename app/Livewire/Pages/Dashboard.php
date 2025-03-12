<?php
namespace App\Livewire\Pages;

use App\Livewire\Page\BasePage;

class Dashboard extends BasePage
{
    public string $view = 'livewire.page.dashboard';

    public function getNavigationIcon(): ?string
    {
        return 'rocket-launch';
    }
}
