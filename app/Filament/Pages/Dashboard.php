<?php

namespace App\Filament\Pages;

use App\Filament\Widgets\TransactionsChart;
use Filament\Pages\Dashboard as BaseDashboard;
use Filament\Widgets\AccountWidget;

class Dashboard extends BaseDashboard
{
    public function getColumns(): int | array
    {
        return 2;
    }

    public function getWidgets(): array
    {
        return [
            TransactionsChart::class,
            // AccountWidget::class,
        ];
    }
}