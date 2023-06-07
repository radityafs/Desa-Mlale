<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AgendaResource\Pages;
use App\Filament\Resources\AgendaResource\RelationManagers;
use App\Models\Agenda;
use Filament\Forms;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\TextInput;
use Filament\Resources\Form;
use Filament\Resources\Resource;
use Filament\Resources\Table;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AgendaResource extends Resource
{
    protected static ?string $model = Agenda::class;

    protected static ?string $navigationIcon = 'heroicon-o-collection';
    protected static ?string $navigationLabel = 'Agenda';
    protected static ?string $pluralLabel = 'Agenda';
    protected static ?string $navigationGroup = 'Data Master';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Card::make([
                    FileUpload::make('photo')
                        ->image()
                        ->imagePreviewHeight('250')
                        ->imageResizeMode('cover')
                        ->imageCropAspectRatio('16:9')
                        ->imageResizeTargetWidth('1920')
                        ->imageResizeTargetHeight('1080')
                        ->extraAttributes(['class' => 'h-48 w-full']),
                ]),
                Card::make([
                    TextInput::make('judul')
                        ->required()
                        ->placeholder('Judul'),
                    TextInput::make('tempat')
                        ->required()
                        ->placeholder('Tempat'),
                        DateTimePicker::make('waktu')
                        ->required()
                        ->placeholder('Waktu'),

                ]),
                Card::make([
                    RichEditor::make('deskripsi')
                        ->required()
                        ->placeholder('Deskripsi')
                ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('photo')
                    ->width(150)
                    ->height(75)
                    ->label('Photo')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('judul')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('tempat')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('waktu')
                    ->sortable()
                    ->searchable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAgendas::route('/'),
            'create' => Pages\CreateAgenda::route('/create'),
            'edit' => Pages\EditAgenda::route('/{record}/edit'),
        ];
    }    
}
