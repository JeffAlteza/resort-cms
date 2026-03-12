<?php

namespace App\Filament\Resources;

use BackedEnum;
use UnitEnum;

use App\Filament\Resources\ContactResource\Pages;
use App\Filament\Resources\ContactResource\RelationManagers;
use App\Models\Contact;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ContactResource extends Resource
{
    protected static ?string $model = Contact::class;

    protected static string | UnitEnum | null $navigationGroup = 'Site Management';

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-device-phone-mobile';

    protected static ?int $navigationSort = 5;

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->disabled()
                    ->dehydrated()
                    ->columnSpanFull(),
                Forms\Components\Textarea::make('description')
                    // ->hidden(Contact::where('type', 'link'))
                    ->columnSpanFull(),
                // Forms\Components\Select::make('visibility')
                //     ->options([
                //         "true" => "True",
                //         "false" => "False",
                //     ])
                //     ->boolean()
                //     ->default(true)
                //     ->native(false)
                //     ->required(),
                Forms\Components\TextInput::make('type')
                    ->disabled()
                    ->dehydrated(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\TextColumn::make('description'),
                Tables\Columns\TextColumn::make('type')
                ->badge(),
                // Tables\Columns\IconColumn::make('visibility')
                //     ->alignCenter()
                //     ->boolean(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                //
            ])
            ->actions([
                Actions\EditAction::make(),
                // Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                // Actions\BulkActionGroup::make([
                //     Actions\DeleteBulkAction::make(),
                // ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageContacts::route('/'),
        ];
    }
}
