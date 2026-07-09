<?php

namespace App\Filament\Widgets;

use Filament\Tables;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use App\Models\HeroCarousel;

class ActiveHeroCarousels extends BaseWidget
{
    protected static ?int $sort = 3;
    
    protected int | string | array $columnSpan = 'full';

    public function table(Table $table): Table
    {
        return $table
            ->query(
                HeroCarousel::query()->where('is_active', true)->orderBy('order')
            )
            ->heading('Hero Carousel Aktif')
            ->columns([
                Tables\Columns\ImageColumn::make('image')
                    ->label('Gambar')
                    ->size(80),
                Tables\Columns\TextColumn::make('title')
                    ->label('Judul')
                    ->searchable()
                    ->placeholder('Tanpa Judul'),
                Tables\Columns\TextColumn::make('order')
                    ->label('Urutan')
                    ->sortable(),
            ])
            ->actions([
                Tables\Actions\Action::make('Lihat')
                    ->url(fn (HeroCarousel $record): string => route('filament.admin.resources.hero-carousels.edit', ['record' => $record]))
                    ->icon('heroicon-m-pencil-square'),
            ]);
    }
}
