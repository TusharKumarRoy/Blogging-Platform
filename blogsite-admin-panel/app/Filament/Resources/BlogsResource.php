<?php

namespace App\Filament\Resources;

use App\Enum\NewsCategoryEnum;
use App\Enums\BlogTypeEnum;
use App\Filament\Resources\BlogsResource\Pages;
use App\Models\Blogs;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Support\Str;

class BlogsResource extends Resource
{
    protected static ?string $model = Blogs::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationLabel = 'Blogs';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make()
                            ->schema([
                                Forms\Components\TextInput::make('title')
                                    ->required()
                                    ->live(onBlur: true)
                                    ->unique(ignoreRecord: true),

                                Forms\Components\TextInput::make('excerpt')
                                    ->columnSpan('2'),

                                Forms\Components\MarkdownEditor::make('content')
                                    ->fileAttachmentsDisk('public')
                                    ->fileAttachmentsDirectory('body-image')
                                    ->fileAttachmentsVisibility('public')
                                    ->columnSpan('2'),
                            ])->columns('2'),
                    ]),

                Forms\Components\Group::make()
                    ->schema([
                        Forms\Components\Section::make('Status')
                            ->schema([
                                Forms\Components\DatePicker::make('published_at'),

                                Forms\Components\Select::make('category')
                                    ->options([
                                        'Frontend' => BlogTypeEnum::FRONTEND->value,
                                        'Backend' => BlogTypeEnum::BACKEND->value,
                                        'Devops' => BlogTypeEnum::DEVOPS->value,
                                        'Android' => BlogTypeEnum::ANDROID->value,
                                        'IOS' => BlogTypeEnum::IOS->value,
                                        'Others' => BlogTypeEnum::OTHERS->value,
                                    ]),
                            ]),

                        Forms\Components\Section::make('Image')
                            ->schema([
                                Forms\Components\FileUpload::make('featured_image')
                                    ->image()
                                    ->disk('public')
                                    ->preserveFilenames()  // Keep the original file name
                                    ->visibility('public')
                                    ->imageEditor()

                            ])
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
            'index' => Pages\ListBlogs::route('/'),
            'create' => Pages\CreateBlogs::route('/create'),
            'edit' => Pages\EditBlogs::route('/{record}/edit'),
        ];
    }
}
