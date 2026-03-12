<?php

namespace App\Filament\Resources;

use BackedEnum;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Filament\Resources\BookingResource\Widgets\CalendarBookingWidget;
use App\Filament\Widgets\CalendarWidget;
use App\Filament\Widgets\InquiryOverview;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Resources\Resource;
use Filament\Schemas\Components\Group;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Schema;
use Filament\Actions;
use Filament\Tables;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static string | BackedEnum | null $navigationIcon = 'heroicon-o-book-open';

    public static function form(Schema $schema): Schema
    {
        return $schema
            ->schema([
                Group::make()->schema([
                    Section::make('Details')->schema([
                        Forms\Components\TextInput::make('name')->columnSpanFull(),
                        Forms\Components\TextInput::make('email')
                            ->email(),
                        Forms\Components\TextInput::make('cellphone'),
                        Forms\Components\DatePicker::make('checkin')
                            ->required(),
                        Forms\Components\DatePicker::make('checkout')
                            ->required(),
                        Forms\Components\Textarea::make('message')
                            ->maxLength(65535)
                            ->columnSpanFull(),
                    ])->columns(2)
                ])->columnSpan(2),
                Group::make()->schema([
                    Section::make('Booking Status')->schema([
                        Forms\Components\Radio::make('status')
                            ->options([
                                "new" => "New",
                                "accept" => "Accept",
                                "decline" => "Decline",
                            ])
                            ->required(),
                    ])->columnSpan(1),
                ])
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('name'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('cellphone'),
                Tables\Columns\TextColumn::make('checkin')
                    ->date(),
                Tables\Columns\TextColumn::make('checkout')
                    ->date(),
                Tables\Columns\TextColumn::make('status')
                    ->colors([
                        'warning' => 'new',
                        'success' => 'accept',
                        'danger' => 'decline',
                    ])
                    ->badge(),
                Tables\Columns\TextColumn::make('created_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
                Tables\Columns\TextColumn::make('updated_at')
                    ->dateTime()
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->filters([
                Filter::make('created_at')
                    ->form([
                        DatePicker::make('created_from'),
                        DatePicker::make('created_until'),
                    ])
                    ->query(function (Builder $query, array $data): Builder {
                        return $query
                            ->when(
                                $data['created_from'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '>=', $date),
                            )
                            ->when(
                                $data['created_until'],
                                fn (Builder $query, $date): Builder => $query->whereDate('created_at', '<=', $date),
                            );
                    }),
            ])
            ->actions([
                Actions\EditAction::make(),
            ])
            ->bulkActions([
                // Actions\BulkActionGroup::make([
                //     Actions\DeleteBulkAction::make(),
                // ]),
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
