<?php
namespace App\Livewire\Pages;

use App\Livewire\Page\ListPage;

class ListRecords extends ListPage
{
    public function getNavigationIcon(): ?string
    {
        return 'arrow-path';
    }

    public function getNavigationBadge(): ?string
    {
        return 'YAY';
    }

    public function getTitle(): string
    {
        return 'HAllo';
    }

    public function getSubHeading(): ?string
    {
        return 'asdasd';
    }

    public function getNavigationGroup(): ?string
    {
        return 'null';
    }
}
