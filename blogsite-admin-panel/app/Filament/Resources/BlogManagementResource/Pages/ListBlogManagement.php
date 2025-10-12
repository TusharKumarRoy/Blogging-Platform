<?php

namespace App\Filament\Resources\BlogManagementResource\Pages;

use App\Filament\Resources\BlogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListBlogManagement extends ListRecords
{
    protected static string $resource = BlogManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
