<?php

namespace App\Filament\Widgets;

use App\Models\BlogManagement;
use App\Models\User;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class DashboardOverview extends BaseWidget
{
    // Make this non-static to avoid PHP 8.2 redeclaration error
    protected ?string $heading = 'Overview';

    protected function getStats(): array
    {
        return [
            Stat::make('Total Blogs', BlogManagement::count()),
            Stat::make('Total Admin', User::count()),
        ];
    }
}
