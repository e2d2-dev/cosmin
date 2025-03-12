<?php
namespace App\Livewire\Page;

use App\Form;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

abstract class EditRecord extends BasePage
{
    public static string $route = '/{record}';

    public string $view = 'livewire.page.edit-record';

    public $record;

    public array $data = [];

    protected static $model = User::class;

    public function mount(string | int $record): void
    {
        $this->record = static::$model::find($record);
        $this->data = $this->record->toArray();
    }

    public function getShouldRegisterNavigation(): bool
    {
        return false;
    }

    public function form(): Form
    {
        return Form::make()
            ->schema([
                [
                    'type' => 'TextInput',
                    'label' => 'Name',
                    'value' => 'Cosmin',
                    'statePath' => 'name',
                ]
            ]);
    }
}
