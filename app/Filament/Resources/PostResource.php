<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PostResource\Pages;
use App\Filament\Resources\PostResource\RelationManagers;
use App\Models\Post;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use Filament\Forms\Set;

class PostResource extends Resource
{
    protected static ?string $model = Post::class;

    protected static ?string $navigationIcon = 'heroicon-o-newspaper';
    protected static ?string $modelLabel = 'Berita';
    protected static ?string $pluralModelLabel = 'Berita';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->required()
                    ->live(onBlur: true)
                    ->afterStateUpdated(fn (Set $set, ?string $state) => $set('slug', Str::slug($state))),
                Forms\Components\TextInput::make('slug')
                    ->required(),
                Forms\Components\Select::make('category')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                        'agenda' => 'Agenda',
                        'press_release' => 'Press Release',
                        'program' => 'Program',
                        'kegiatan' => 'Kegiatan',
                    ])
                    ->required(),
                Forms\Components\Select::make('divisi')
                    ->options([
                        'bina-marga' => 'Bina Marga',
                        'cipta-karya' => 'Cipta Karya',
                        'sda' => 'SDA',
                        'tata-ruang' => 'Tata Ruang',
                    ])
                    ->nullable(),
                Forms\Components\RichEditor::make('content')
                    ->required()
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->disk('public')
                    ->directory('berita'),
                Forms\Components\Toggle::make('is_headline')
                    ->required(),
                Forms\Components\Toggle::make('is_highlight')
                    ->required(),
                Forms\Components\DatePicker::make('published_at'),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title')
                    ->searchable(),
                Tables\Columns\TextColumn::make('slug')
                    ->searchable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('category')
                    ->badge()
                    ->searchable(),
                Tables\Columns\TextColumn::make('divisi')
                    ->badge()
                    ->searchable(),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\IconColumn::make('is_headline')
                    ->boolean(),
                Tables\Columns\IconColumn::make('is_highlight')
                    ->boolean(),
                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('category')
                    ->options([
                        'berita' => 'Berita',
                        'pengumuman' => 'Pengumuman',
                        'agenda' => 'Agenda',
                        'press_release' => 'Press Release',
                        'program' => 'Program',
                        'kegiatan' => 'Kegiatan',
                    ]),
                Tables\Filters\SelectFilter::make('divisi')
                    ->options([
                        'bina-marga' => 'Bina Marga',
                        'cipta-karya' => 'Cipta Karya',
                        'sda' => 'SDA',
                        'tata-ruang' => 'Tata Ruang',
                    ]),
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
            'index' => Pages\ListPosts::route('/'),
            'create' => Pages\CreatePost::route('/create'),
            'edit' => Pages\EditPost::route('/{record}/edit'),
        ];
    }
}
