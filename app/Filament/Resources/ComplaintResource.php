<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ComplaintResource\Pages;
use App\Models\Complaint;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Filament\Infolists;
use Filament\Infolists\Infolist;
use Illuminate\Database\Eloquent\Builder;

class ComplaintResource extends Resource
{
    protected static ?string $model = Complaint::class;

    protected static ?string $navigationIcon = 'heroicon-o-chat-bubble-left-right';
    protected static ?string $navigationLabel = 'Pengaduan Masyarakat';
    protected static ?string $modelLabel = 'Pengaduan';
    protected static ?string $pluralModelLabel = 'Pengaduan';

    public static function form(Form $form): Form
    {
        // Tetap menyisakan form status agar Admin bisa mengubah status aduan saat edit
        return $form
            ->schema([
                Forms\Components\Section::make('Ubah Status Aduan')
                    ->schema([
                        Forms\Components\Select::make('status')
                            ->options([
                                'pending' => 'Pending',
                                'processed' => 'Diproses',
                                'completed' => 'Selesai',
                            ])
                            ->required(),
                    ])
            ]);
    }

    public static function infolist(Infolist $infolist): Infolist
    {
        return $infolist
            ->schema([
                Infolists\Components\Section::make('A. Data Pelapor')
                    ->schema([
                        Infolists\Components\TextEntry::make('sender_name')->label('Nama Lengkap'),
                        Infolists\Components\TextEntry::make('sender_phone')->label('Nomor HP/WhatsApp'),
                        Infolists\Components\TextEntry::make('sender_email')->label('Email')->default('-'),
                    ])->columns(3),

                Infolists\Components\Section::make('B. Informasi Aduan')
                    ->schema([
                        Infolists\Components\TextEntry::make('report_date')->label('Tanggal Pengaduan')->date('d F Y'),
                        Infolists\Components\TextEntry::make('complaint_type')->label('Jenis Aduan')->badge()->color('warning'),
                        Infolists\Components\Grid::make(3)
                            ->schema([
                                Infolists\Components\TextEntry::make('street')->label('Jalan/Kelurahan')->default('-'),
                                Infolists\Components\TextEntry::make('district')->label('Kecamatan')->default('-'),
                                Infolists\Components\TextEntry::make('city')->label('Kabupaten/Kota')->default('-'),
                            ]),
                    ]),

                Infolists\Components\Section::make('C. Uraian Aduan')
                    ->schema([
                        Infolists\Components\TextEntry::make('content')->label('Permasalahan')->columnSpanFull(),
                    ]),

                Infolists\Components\Section::make('D. Lampiran')
                    ->schema([
                        Infolists\Components\ImageEntry::make('photo_path')->label('Foto Lokasi'),
                        Infolists\Components\TextEntry::make('video_path')
                            ->label('Video')
                            ->formatStateUsing(fn ($state) => $state ? 'Lihat Video' : 'Tidak ada')
                            ->url(fn ($record) => $record->video_path ? url('storage/'.$record->video_path) : null)
                            ->openUrlInNewTab(),
                        Infolists\Components\TextEntry::make('document_path')
                            ->label('Dokumen Pendukung')
                            ->formatStateUsing(fn ($state) => $state ? 'Unduh Dokumen' : 'Tidak ada')
                            ->url(fn ($record) => $record->document_path ? url('storage/'.$record->document_path) : null)
                            ->openUrlInNewTab(),
                    ])->columns(3),

                Infolists\Components\Section::make('E. Harapan/Tindak Lanjut')
                    ->schema([
                        Infolists\Components\TextEntry::make('expectation')->label('Tindak Lanjut yang Diminta')->columnSpanFull()->default('-'),
                    ]),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('sender_name')
                    ->label('Pelapor')
                    ->searchable(),
                Tables\Columns\TextColumn::make('complaint_type')
                    ->label('Jenis Aduan')
                    ->badge()
                    ->searchable(),
                Tables\Columns\SelectColumn::make('status')
                    ->options([
                        'pending' => 'Pending',
                        'processed' => 'Diproses',
                        'completed' => 'Selesai',
                    ])
                    ->searchable(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\ViewAction::make(),
                Tables\Actions\EditAction::make()->label('Ubah Status'),
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
            'index' => Pages\ListComplaints::route('/'),
            'create' => Pages\CreateComplaint::route('/create'),
            'view' => Pages\ViewComplaint::route('/{record}'),
            'edit' => Pages\EditComplaint::route('/{record}/edit'),
        ];
    }
}
