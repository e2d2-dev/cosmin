<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\Actions\Action;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('name')
                ->inlineLabel(),
                Toggle::make('is_admin')
                    ->offIcon('heroicon-o-x-mark')
                    ->onColor('success')
                    ->onIcon('heroicon-o-check'),
                Select::make('user')
                    ->prefixIcon('heroicon-o-key')
                    ->suffixIcon('heroicon-o-key')
                    ->hint('bobs')
                    ->required()
                    ->markAsRequired(false)
                    ->multiple()
                    ->hintAction(
                        Action::make('hallo')
                        ->modalWidth('md')
                        ->slideover()
                        ->icon('heroicon-o-user')
                        ->form([
                            TextInput::make('name'),
                        ]),
                    )
                    ->prefixActions([
                        Action::make('hallo')
                            ->modalWidth('md')
                            ->slideover()
                            ->icon('heroicon-o-user')
                            ->form([
                                TextInput::make('name'),
                            ]),
                    ])
                    ->options(User::all()->pluck('name', 'id'))
                    ->searchable(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
