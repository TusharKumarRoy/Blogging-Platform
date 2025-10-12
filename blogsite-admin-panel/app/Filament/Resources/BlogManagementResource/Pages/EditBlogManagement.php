<?php

namespace App\Filament\Resources\BlogManagementResource\Pages;

use App\Filament\Resources\BlogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditBlogManagement extends EditRecord
{
    protected static string $resource = BlogManagementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
