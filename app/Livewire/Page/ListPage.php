<?php
namespace App\Livewire\Page;

use Livewire\WithPagination;

abstract class ListPage extends BasePage
{
    use WithPagination;

    public string $view = 'livewire.page.list-model';

    public $sortBy = 'name';
    public $sortDirection = 'desc';

    public function sort($column) {
        if ($this->sortBy === $name) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function getColumns(array $columns): array
    {
        return [
            'name' => fluent([
                'label' => 'Name',
            ]),
            'created_at' => fluent([
                'label' => 'Created',
            ]),
        ];
    }
}
