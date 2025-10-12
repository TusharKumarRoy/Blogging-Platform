<?php

namespace App\Filament\Resources\BlogManagementResource\Pages;

use App\Filament\Resources\BlogManagementResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateBlogManagement extends CreateRecord
{
    protected static string $resource = BlogManagementResource::class;
}
