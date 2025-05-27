<?php

namespace App\Filament\Owner\Resources;

use Filament\Forms;
use App\Models\Room;
use Filament\Tables;
use Filament\Forms\Form;
use Filament\Tables\Table;
use Filament\Resources\Resource;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Filament\Owner\Resources\RoomResource\Pages;
use App\Filament\Owner\Resources\RoomResource\RelationManagers;
use App\Models\BoardingHouse;

class RoomResource extends Resource
{
    protected static ?string $model = Room::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationGroup = 'My Boarding Houses';

    public static function getEloquentQuery(): Builder
    {
        return parent::getEloquentQuery()
            ->whereHas('boardingHouse', function ($query) {
                $query->where('user_id', Auth::id());
            });
    }

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('boarding_house_id')
                    ->label('Boarding House')
                    ->relationship(
                        name: 'boardingHouse',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn(Builder $query) => $query->where('user_id', Auth::id()),
                    )
                    ->required()
                    ->preload()
                    ->searchable(),

                Forms\Components\TextInput::make('name')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('room_type')
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('square_feet')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('capacity')
                    ->numeric()
                    ->required()
                    ->maxLength(255),
                Forms\Components\TextInput::make('price_per_month')
                    ->numeric()
                    ->prefix('IDR')
                    ->required()
                    ->maxLength(255),
                Forms\Components\Toggle::make('is_available')
                    ->required(),
                Forms\Components\Repeater::make('images')
                    ->relationship('images')
                    ->schema([
                        Forms\Components\FileUpload::make('image')
                            ->image()
                            ->directory('rooms')
                            ->required()
                    ])
            ])->columns(2);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('boardingHouse.name')
                    ->label('Boarding House')
                    ->sortable()
                    ->searchable(),

                Tables\Columns\TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                Tables\Columns\TextColumn::make('room_type')
                    ->searchable(),
                Tables\Columns\TextColumn::make('capacity'),
                Tables\Columns\TextColumn::make('price_per_month')
                    ->money('IDR')
                    ->sortable(),
                Tables\Columns\IconColumn::make('is_available')
                    ->boolean(),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('boardingHouse')
                    ->relationship('boardingHouse', 'name', fn(Builder $query) => $query->where('user_id', Auth::id())),
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
            // We might add relations here later if needed, e.g., RoomImagesRelationManager
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListRooms::route('/'),
            'create' => Pages\CreateRoom::route('/create'),
            'edit' => Pages\EditRoom::route('/{record}/edit'),
        ];
    }

    protected static function mutateFormDataBeforeCreate(array $data): array
    {
        // The boarding_house_id is already in $data from the form selection
        return $data;
    }

    public static function beforeSave(array $data): array
    {
        // The boarding_house_id is already in $data from the form selection
        return $data;
    }
}
