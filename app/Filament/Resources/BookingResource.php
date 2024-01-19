<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BookingResource\Pages;
use App\Filament\Resources\BookingResource\RelationManagers;
use App\Filament\Resources\BookingResource\Widgets\CalendarBookingWidget;
use App\Filament\Widgets\CalendarWidget;
use App\Filament\Widgets\InquiryOverview;
use App\Models\Booking;
use Filament\Forms;
use Filament\Forms\Components\Group;
use Filament\Forms\Components\Section;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class BookingResource extends Resource
{
    protected static ?string $model = Booking::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
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
            'index' => Pages\ListBookings::route('/'),
            'create' => Pages\CreateBooking::route('/create'),
            'edit' => Pages\EditBooking::route('/{record}/edit'),
        ];
    }
}
