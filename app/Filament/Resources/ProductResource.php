<?php

namespace App\Filament\Resources;

use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductResource extends Resource
{
    protected static ?string $model = Product::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('category_id')
                ->relationship('category', 'name')
                ->required(),
            Forms\Components\Textarea::make('description')->nullable(),
            Forms\Components\TextInput::make('price')->required()->numeric(),
            Forms\Components\DatePicker::make('date')->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('photo')
    ->label('Foto Produk')
    ->disk('public') // Pastikan disk yang digunakan adalah 'public'
    ->url(fn ($record) => $record->photo ? asset('storage/' . $record->photo) : null),
                Tables\Columns\TextColumn::make('category.name')->label('Nama Kategori'),
                Tables\Columns\TextColumn::make('description')->label('Deskripsi'),
                Tables\Columns\TextColumn::make('price')
                ->label('Harga')
                ->formatStateUsing(fn ($record) => 'Rp ' . number_format($record->price, 0, ',', '.')),
                Tables\Columns\TextColumn::make('date')->label('Tanggal'),
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
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
