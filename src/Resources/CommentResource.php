<?php
namespace Kseven\FilamentMultiBlog\Resources;

use Filament\Resources\Resource;
use Filament\Forms;
use Filament\Tables;
use Kseven\FilamentMultiBlog\Models\Comment;

class CommentResource extends Resource
{
    protected static string $model = Comment::class;

    public static function form(Forms\Form $form): Forms\Form
    {
        return $form->schema([
            Forms\Components\TextInput::make('author_name')->required(),
            Forms\Components\Textarea::make('content')->required(),
            Forms\Components\Hidden::make('post_id'),
            Forms\Components\Hidden::make('site_id')->default(fn () => app('currentSiteId')),
        ]);
    }

    public static function table(Tables\Table $table): Tables\Table
    {
        return $table->columns([
            Tables\Columns\TextColumn::make('author_name'),
            Tables\Columns\TextColumn::make('content')->limit(50),
        ]);
    }
}
