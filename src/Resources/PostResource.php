<?php
namespace Kseven\FilamentMultiBlog\Resources;

use Filament\Forms;
use Filament\Tables;
use Kseven\FilamentMultiBlog\Models\Post;
use Filament\Resources\Resource;
use Filament\Resources\Form;
use Filament\Resources\Table;

class PostResource extends Resource
{
    protected static string $model = Post::class;

    public static function form(Form $form): Form
    {
        return $form->schema([
            Forms\Components\Hidden::make('site_id')->default(fn () => app('currentSiteId')),
            Forms\Components\TextInput::make('title')->required(),
            Forms\Components\Textarea::make('content')->required(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('title'),
            Tables\Columns\TextColumn::make('site.name')->label('Site'),
            Tables\Columns\TextColumn::make('created_at')->dateTime(),
        ]);
    }
}
