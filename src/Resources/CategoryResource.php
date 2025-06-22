<?php
namespace Kseven\FilamentMultiBlog\Resources;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Kseven\FilamentMultiBlog\Models\Category;

class CategoryResource extends Resource
{
    protected static string $model = Category::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('name')->required(),
            Forms\Components\TextInput::make('slug')->required(),
            Forms\Components\Hidden::make('site_id')->default(fn () => app('currentSiteId')),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('name'),
            Tables\Columns\TextColumn::make('slug'),
        ]);
    }
}
