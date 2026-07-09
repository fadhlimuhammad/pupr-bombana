<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PejabatResource\Pages;
use App\Filament\Resources\PejabatResource\RelationManagers;
use App\Models\Pejabat;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PejabatResource extends Resource
{
    protected static ?string $model = Pejabat::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';
    
    protected static ?string $navigationGroup = 'Profil & Pengaturan';
    
    protected static ?string $modelLabel = 'Struktur Organisasi';
    protected static ?string $pluralModelLabel = 'Struktur Organisasi';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Section::make('Informasi Pejabat')
                    ->schema([
                        Forms\Components\TextInput::make('nama')
                            ->required()
                            ->maxLength(255),
                        Forms\Components\TextInput::make('jabatan')
                            ->required()
                            ->maxLength(255)
                            ->placeholder('Contoh: Kepala Dinas PUPR'),
                        Forms\Components\Select::make('level')
                            ->options([
                                1 => '1 - Kepala Dinas',
                                2 => '2 - Sekretaris',
                                3 => '3 - Kepala Bidang / Lainnya',
                            ])
                            ->required()
                            ->default(3)
                            ->helperText('Level 1 akan muncul paling atas (sendiri), level 2 di bawahnya, level 3 berjejer di bawah.'),
                        Forms\Components\TextInput::make('urutan')
                            ->required()
                            ->numeric()
                            ->default(0)
                            ->helperText('Angka lebih kecil akan muncul lebih dulu (kiri ke kanan).'),
                    ])->columns(2),
                    
                Forms\Components\Section::make('Foto')
                    ->schema([
                        Forms\Components\FileUpload::make('foto')
                            ->image()
                            ->directory('pejabat')
                            ->maxSize(2048)
                            ->helperText('Gunakan rasio 1:1 (persegi) atau foto portrait transparan/HD untuk hasil terbaik.')
                            ->columnSpanFull(),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('foto')
                    ->circular()
                    ->defaultImageUrl('https://placehold.co/150x150/0b3b60/FFF?text=Foto'),
                Tables\Columns\TextColumn::make('nama')
                    ->searchable()
                    ->weight('bold'),
                Tables\Columns\TextColumn::make('jabatan')
                    ->searchable(),
                Tables\Columns\TextColumn::make('level')
                    ->badge()
                    ->color(fn (string $state): string => match ($state) {
                        '1' => 'danger',
                        '2' => 'warning',
                        default => 'success',
                    })
                    ->formatStateUsing(fn (string $state): string => match ($state) {
                        '1' => 'Kepala Dinas (1)',
                        '2' => 'Sekretaris (2)',
                        default => 'Bidang (3)',
                    })
                    ->sortable(),
                Tables\Columns\TextColumn::make('urutan')
                    ->numeric()
                    ->sortable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('level', 'asc')
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
            'index' => Pages\ListPejabats::route('/'),
            'create' => Pages\CreatePejabat::route('/create'),
            'edit' => Pages\EditPejabat::route('/{record}/edit'),
        ];
    }
}
