<?php
namespace App\Livewire\Pages;

use App\Livewire\Page\ListPage;

class ListUsers extends ListPage
{
    public function getNavigationIcon(): ?string
    {
        return 'users';
    }
}
