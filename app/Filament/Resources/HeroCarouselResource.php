<?php

namespace App\Filament\Resources;

use App\Filament\Resources\HeroCarouselResource\Pages;
use App\Filament\Resources\HeroCarouselResource\RelationManagers;
use App\Models\HeroCarousel;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class HeroCarouselResource extends Resource
{
    protected static ?string $model = HeroCarousel::class;

    protected static ?string $navigationIcon = 'heroicon-o-photo';
    protected static ?string $navigationLabel = 'Hero Carousel';
    protected static ?string $pluralModelLabel = 'Hero Carousel';
    protected static ?string $modelLabel = 'Hero Carousel';
    protected static ?string $navigationGroup = 'Profil & Pengaturan';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Detail Carousel')
                    ->schema([
                        Forms\Components\TextInput::make('title')
                            ->label('Judul (Opsional)')
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\FileUpload::make('image')
                            ->label('Gambar Carousel')
                            ->image()
                            ->directory('hero-carousels')
                            ->required()
                            ->columnSpanFull()
                            ->helperText('Gunakan resolusi HD (misal: 1920x1080) untuk hasil terbaik.'),
                        Forms\Components\TextInput::make('link')
                            ->label('Tautan (Opsional)')
                            ->url()
                            ->maxLength(255)
                            ->columnSpanFull(),
                        Forms\Components\TextInput::make('order')
                            ->label('Urutan')
                            ->numeric()
                            ->default(0)
                            ->required(),
                        Forms\Components\Toggle::make('is_active')
                            ->label('Aktif')
                            ->default(true),
                    ])->columns(2)
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(100),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable(),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_active')
                    ->label('Status Aktif')
                    ->boolean(),
            ])
            ->defaultSort('order')
            ->reorderable('order')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
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
            'index' => Pages\ListHeroCarousels::route('/'),
            'create' => Pages\CreateHeroCarousel::route('/create'),
            'edit' => Pages\EditHeroCarousel::route('/{record}/edit'),
        ];
    }
}
