<?php

namespace App\Filament\Resources;

use App\Filament\Resources\BlogManagementResource\Pages;
use App\Models\BlogManagement;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;

class BlogManagementResource extends Resource
{
    protected static ?string $model = BlogManagement::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Blog Management';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Content')
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->maxLength(255)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\Textarea::make('excerpt')
                                    ->rows(1),

                                Forms\Components\MarkdownEditor::make('content')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('blog-content')
                                    ->fileAttachmentsVisibility('public'),
                            ])
                            ->columns(1),
                    ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\DatePicker::make('published_at'),

                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Frontend' => 'Frontend',
                                        'Backend' => 'Backend',
                                        'Devops' => 'Devops',
                                        'Android' => 'Android',
                                        'IOS' => 'IOS',
                                        'Others' => 'Others',
                                    ])
                                    ->default('Others'),
                            ]),

                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->disk('public')
                                    ->preserveFilenames() // keep original name
                                    ->visibility('public')
                                    ->imageEditor(),
                            ]),
                    ])
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\ImageColumn::make('featured_image')
                    ->disk('public')
                    ->height(50)
                    ->width(50),

                Tables\Columns\TextColumn::make('title')
                    ->searchable()
                    ->sortable(),

                Tables\Columns\TextColumn::make('published_at')
                    ->date()
                    ->sortable(),

                Tables\Columns\TextColumn::make('category')
                    ->searchable()
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

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListBlogManagement::route('/'),
            'create' => Pages\CreateBlogManagement::route('/create'),
            'edit' => Pages\EditBlogManagement::route('/{record}/edit'),
        ];
    }
}
