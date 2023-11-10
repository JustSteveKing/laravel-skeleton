<?php

declare(strict_types=1);

namespace App\Filament\Resources;

use App\Enums\Identity\Role;
use App\Filament\Resources\UserResource\Pages;
use App\Models\User;
use Filament\Forms\Components\DateTimePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

final class UserResource extends Resource
{
    protected static ?string $model = User::class;

    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form->schema([
            self::getNameFormField(),
            self::getEmailFormField(),
            self::getRoleFormField(),
            self::getPasswordFormField(),
            self::getEmailVerifiedAtFormField(),
        ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->searchable(),
                TextColumn::make('email')
                    ->searchable(),
                TextColumn::make('role')
                    ->searchable(),
                ImageColumn::make('avatar'),
                TextColumn::make('email_verified_at')
                    ->dateTime()
                    ->sortable(),
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

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }

    public static function getNameFormField(): TextInput
    {
        return TextInput::make('name')
            ->required()
            ->maxLength(255);
    }

    public static function getEmailFormField(): TextInput
    {
        return TextInput::make('email')
            ->email()
            ->required()
            ->maxLength(255);
    }

    public static function getRoleFormField(): Select
    {
        return Select::make('role')
            ->options(Role::class)
            ->enum(Role::class)
            ->default(Role::USER)
            ->required();
    }

    public static function getPasswordFormField(): TextInput
    {
        return TextInput::make('password')
            ->password()
            ->required()
            ->maxLength(255);
    }

    public static function getEmailVerifiedAtFormField(): DateTimePicker
    {
        return DateTimePicker::make('email_verified_at');
    }
}
