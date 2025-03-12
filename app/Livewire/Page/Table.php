<?php
namespace App\Livewire\Page;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;
use Livewire\Component;
use Livewire\WithPagination;

class Table extends Component
{
    use WithPagination;

    protected $model = \App\Models\User::class;

    public $search = '';
    public bool $isEmpty = true;

    public $sortBy = 'name';
    public $sortDirection = 'desc';

    public function mount(): void
    {
        //
    }

    public function sort($column) {
        if ($this->sortBy === $name) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $column;
            $this->sortDirection = 'asc';
        }
    }

    public function getColumns(): array
    {
        return [
            'name' => fluent([
                'label' => 'Name',
                'align' => 'text-left'
            ]),
            'email' => fluent([
                'label' => 'Email',
                'align' => 'text-right'
            ]),
            'created_at' => fluent([
                'label' => 'Created',
            ]),
        ];
    }

    protected function getAlign(string $column): string
    {
        return $this->getColumns()[$column]->align ?? '';
    }

    protected function getKeys(): array
    {
        return ['id', ...array_values($this->getColumnKeys())];
    }

    protected function getColumnKeys(): array
    {
        return array_keys($this->getColumns());
    }

    public function getQuery(): LengthAwarePaginator
    {
        return $this->query()
            ->when(filled($this->search), function(Builder $query){
                return $query->whereLike('name', '%'.$this->search.'%');
            })
            ->select($this->getKeys())
            //->tap(fn ($query) => $this->sortBy ? $query->orderBy($this->sortBy, $this->sortDirection) : $query)
            ->paginate(10);
    }

    protected function query(): Builder
    {
        return app($this->model)->query();
    }

    public function render()
    {
        return view('livewire.page.table', [
            'items' => $this->getQuery(),
        ]);
    }

    public function getRecordUrl($id): string
    {
        return '/user/'.$id.'/edit';
    }
}
