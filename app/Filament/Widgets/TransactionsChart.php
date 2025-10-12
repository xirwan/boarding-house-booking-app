<?php

namespace App\Filament\Widgets;

use Flowframe\Trend\Trend;
use Flowframe\Trend\TrendValue;
use Filament\Widgets\ChartWidget;
use Illuminate\Database\Eloquent\Model;
use App\Models\Transaction;

class TransactionsChart extends ChartWidget
{
    protected ?string $heading = 'Transactions Chart';

    protected int | string | array $columnSpan = 'full';

    protected function getData(): array
    {
        $data = Trend::model(Transaction::class)
            ->between(
                start: now()->startOfYear(),
                end: now()->endOfYear(),
            )
            ->perMonth()
            ->sum('total_amount');

            return [
                'datasets' => [
                    [
                        'label' => 'Total amount over time',
                        'data' => $data->map(fn (TrendValue $value) => $value->aggregate),
                    ],
                ],
                'labels' => $data->map(fn (TrendValue $value) => $value->date),
            ];
    }

    protected function getType(): string
    {
        return 'bar';
    }
}
