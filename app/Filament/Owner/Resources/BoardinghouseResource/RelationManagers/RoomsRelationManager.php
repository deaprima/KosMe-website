<?php

namespace App\Filament\Owner\Resources\BoardingHouseResource\RelationManagers;

use Filament\Forms;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\RelationManagers\RelationManager;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RoomsRelationManager extends RelationManager
{
    protected static string $relationship = 'rooms';

    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('room_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('square_feet')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('capacity')
                    ->numeric()
                    ->required(),
                Forms\Components\TextInput::make('price_per_month')
                    ->numeric()
                    ->prefix('IDR')
                    ->required(),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
            ])->columns(2);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('room_type'),
                Tables\Columns\TextColumn::make('square_feet'),
                Tables\Columns\TextColumn::make('price_per_month')->money('IDR'),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}
