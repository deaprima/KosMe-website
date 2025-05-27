<?php

namespace App\Filament\Owner\Widgets;

use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use App\Models\BoardingHouse;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class StatsOverview extends BaseWidget
{
    protected int|string|array $columnSpan = 'full';

    protected function getStats(): array
    {
        $user = Auth::user();

        // Get total transactions amount
        $totalTransactions = Transaction::whereHas('room.boardingHouse', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->sum('total_amount');

        // Get total customers (unique users who have transactions)
        $totalCustomers = Transaction::whereHas('room.boardingHouse', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->distinct('user_id')->count('user_id');

        // Get total rooms
        $totalRooms = Room::whereHas('boardingHouse', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->count();

        return [
            Stat::make('Total Pelanggan', $totalCustomers)
                ->description('Jumlah pelanggan')
                ->descriptionIcon('heroicon-m-users')
                ->color('primary')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Total Transaksi', 'Rp ' . number_format($totalTransactions, 0, ',', '.'))
                ->description('Total pendapatan')
                ->descriptionIcon('heroicon-m-banknotes')
                ->color('primary')
                ->chart([3, 5, 3, 4, 5, 6, 3, 5])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Total Kost', $user->boardingHouses()->count())
                ->description('Jumlah Kost')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('primary')
                ->chart([5, 3, 4, 5, 6, 3, 5, 3])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),

            Stat::make('Total Kamar', $totalRooms)
                ->description('Jumlah kamar')
                ->descriptionIcon('heroicon-m-home')
                ->color('primary')
                ->chart([3, 5, 3, 4, 5, 6, 3, 5])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ]),
        ];
    }
}
