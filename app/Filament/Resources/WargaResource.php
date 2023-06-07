<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WargaResource\Pages;
use App\Filament\Resources\WargaResource\RelationManagers;
use App\Models\Warga;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TagsInput;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class WargaResource extends Resource
{
    protected static ?string $model = Warga::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Warga';
    protected static ?string $pluralLabel = 'Warga';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    TextInput::make('nama_lengkap')
                        ->required()
                        ->placeholder('Nama Lengkap'),
                    TextInput::make('nik')
                        ->required()
                        ->unique()
                        ->minLength(16)
                        ->maxLength(16)
                        ->placeholder('NIK'),
                    TextInput::make('no_kk')
                        ->required()
                        ->required()
                        ->minLength(16)
                        ->maxLength(16)
                        ->placeholder('No KK'),
                    Select::make('jenis_kelamin')
                        ->options([
                            'L' => 'Laki-laki',
                            'P' => 'Perempuan',
                        ])
                        ->placeholder('Jenis Kelamin'),
                    TextInput::make('tempat_lahir')
                        ->required()
                        ->placeholder('Tempat Lahir'),
                    DatePicker::make('tanggal_lahir')
                        ->required()
                        ->placeholder('Tanggal Lahir'),
                    Select::make("pendidikan")
                        ->options([
                            'Tidak Sekolah' => 'Tidak Sekolah',
                            'SD' => 'SD',
                            'SMP' => 'SMP',
                            'SMA' => 'SMA',
                            'Diploma I' => 'Diploma I',
                            'Diploma II' => 'Diploma II',
                            'Diploma III' => 'Diploma III',
                            'Diploma IV' => 'Diploma IV',
                            'S1' => 'S1',
                            'S2' => 'S2',
                            'S3' => 'S3',
                        ])
                        ->placeholder('Pendidikan'),
                    Select::make("pekerjaan")
                        ->options([
                            'Tidak Bekerja' => 'Tidak Bekerja',
                            'PNS' => 'PNS',
                            'TNI' => 'TNI',
                            'POLRI' => 'POLRI',
                            'Swasta' => 'Swasta',
                            'Wiraswasta' => 'Wiraswasta',
                            'Petani' => 'Petani',
                            'Nelayan' => 'Nelayan',
                            'Buruh' => 'Buruh',
                            'Ibu Rumah Tangga' => 'Ibu Rumah Tangga',
                            'Pelajar/Mahasiswa' => 'Pelajar/Mahasiswa',
                            'Lainnya' => 'Lainnya',
                        ])
                        ->placeholder('Pekerjaan'),
                        Select::make("status")->options([
                            'Hidup' => 'Hidup',
                            'Meninggal' => 'Meninggal',
                        ])
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nama_lengkap')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('jenis_kelamin')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tempat_lahir')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('tanggal_lahir')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pendidikan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('pekerjaan')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('status')
                    ->searchable()
                    ->sortable(),
            ])
            ->filters([
                SelectFilter::make('pendidikan')
                    ->multiple()
                    ->options([
                        'Tidak Sekolah' => 'Tidak Sekolah',
                        'SD' => 'SD',
                        'SMP' => 'SMP',
                        'SMA' => 'SMA',
                        'Diploma I' => 'Diploma I',
                        'Diploma II' => 'Diploma II',
                        'Diploma III' => 'Diploma III',
                        'Diploma IV' => 'Diploma IV',
                        'S1' => 'S1',
                        'S2' => 'S2',
                        'S3' => 'S3',
                    ])
                    ->label('Pendidikan'),
                SelectFilter::make('jenis_kelamin')
                    ->options([
                        'L' => 'Laki-laki',
                        'P' => 'Perempuan',
                    ])
                    ->label('Jenis Kelamin'),
                    SelectFilter::make('status')
                    ->options([
                        'Hidup' => 'Hidup',
                        'Meninggal' => 'Meninggal',
                    ])
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\DeleteBulkAction::make(),
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
            'index' => Pages\ListWargas::route('/'),
            'create' => Pages\CreateWarga::route('/create'),
            'edit' => Pages\EditWarga::route('/{record}/edit'),
        ];
    }    
}
