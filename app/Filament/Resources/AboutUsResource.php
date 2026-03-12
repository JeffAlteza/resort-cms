<?php

namespace App\Filament\Resources;

use BackedEnum;
use UnitEnum;

use App\Filament\Resources\AboutUsResource\Pages;
use App\Filament\Resources\AboutUsResource\RelationManagers;
use App\Models\AboutUs;
use Filament\Actions\ActionGroup;
use Filament\Forms;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AboutUsResource extends Resource
{
    protected static ?string $model = AboutUs::class;

    protected static ?string $navigationLabel = 'About Us';

    protected static string | UnitEnum | null $navigationGroup = 'Site Management';

    protected static ?int $navigationSort = 4;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-question-mark-circle';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Forms\Components\TextInput::make('title')
                    ->maxLength(255),
                Forms\Components\Select::make('type')
                    ->options([
                        "about us" => "About Us",
                        "timeline" => "Timeline",
                    ])
                    ->reactive()
                    ->default('timeline')
                    ->native(false)
                    ->required(),
                Forms\Components\Textarea::make('description')
                    ->maxLength(65535)
                    ->columnSpanFull(),
                Forms\Components\DatePicker::make('date')
                    ->hidden(fn (Get $get) => $get('type') != 'timeline')
                    ->columnSpanFull(),
                Forms\Components\FileUpload::make('image')
                    ->image()
                    ->columnSpanFull(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('title'),
                Tables\Columns\ImageColumn::make('image'),
                Tables\Columns\TextColumn::make('type')->badge(),
                Tables\Columns\TextColumn::make('date')
                    ->date(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Tables\Filters\TrashedFilter::make()->native(false),
            ])
            ->actions([
                ActionGroup::make([
                    Actions\ViewAction::make()->color('success'),
                    Actions\EditAction::make()->color('primary'),
                    Actions\DeleteAction::make()->color('danger')->hidden(fn (AboutUs $record) => ($record->type != 'timeline')),
                    Actions\RestoreAction::make(),
                ])->icon('heroicon-m-ellipsis-horizontal')
            ])
            ->bulkActions([
                Actions\BulkActionGroup::make([
                    Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ManageAboutUs::route('/'),
        ];
    }
}
