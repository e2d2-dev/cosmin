<?php
namespace App\Livewire\Pages;

use App\Livewire\Page\EditRecord;

class EditUser extends EditRecord
{
    public function getNavigationIcon(): ?string
    {
        return 'users';
    }

    public function getShouldRegisterNavigation(): bool
    {
        return false;
    }
}
