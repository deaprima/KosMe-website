<?php

namespace App\Filament\Widgets;

use App\Models\User;
use App\Models\BoardingHouse;
use App\Models\Room;
use App\Models\Transaction;
use App\Models\Category;
use App\Models\City;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Carbon;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        $totalOwners = User::where('role', 'owner')->count();
        $totalUsers = User::where('role', 'user')->count();
        $totalBoardingHouses = BoardingHouse::count();
        $totalRooms = Room::count();
        $totalTransactions = Transaction::count();
        $totalCategories = Category::count();
        $totalCities = City::count();

        // Calculate monthly growth
        $lastMonthOwners = User::where('role', 'owner')
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->count();
        $lastMonthUsers = User::where('role', 'user')
            ->where('created_at', '>=', Carbon::now()->subMonth())
            ->count();
        $lastMonthTransactions = Transaction::where('created_at', '>=', Carbon::now()->subMonth())
            ->count();

        return [
            Stat::make('Total Mitra', $totalOwners)
                ->description('Total akun mitra')
                ->descriptionIcon('heroicon-m-users')
                ->color('success')
                ->chart([7, 3, 4, 5, 6, 3, 5, 3])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/users?tableFilters[role][value]=owner"',
                ]),

            Stat::make('Total User', $totalUsers)
                ->description('Total akun pengguna')
                ->descriptionIcon('heroicon-m-user')
                ->color('primary')
                ->chart([3, 5, 4, 6, 7, 5, 4, 6])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/users?tableFilters[role][value]=user"',
                ]),

            Stat::make('Total Kost', $totalBoardingHouses)
                ->description('Total kost terdaftar')
                ->descriptionIcon('heroicon-m-home')
                ->color('warning')
                ->chart([4, 6, 5, 7, 8, 6, 5, 7])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/boarding-houses"',
                ]),

            Stat::make('Total Kamar', $totalRooms)
                ->description('Total kamar tersedia')
                ->descriptionIcon('heroicon-m-home-modern')
                ->color('info')
                ->chart([5, 7, 6, 8, 9, 7, 6, 8])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/rooms"',
                ]),

            Stat::make('Total Transaksi', $totalTransactions)
                ->description('Total transaksi')
                ->descriptionIcon('heroicon-m-currency-dollar')
                ->color('success')
                ->chart([6, 8, 7, 9, 10, 8, 7, 9])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/transactions"',
                ]),

            Stat::make('Total Kategori', $totalCategories)
                ->description('Total kategori kost')
                ->descriptionIcon('heroicon-m-tag')
                ->color('warning')
                ->chart([3, 5, 4, 6, 7, 5, 4, 6])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/categories"',
                ]),

            Stat::make('Total Kota', $totalCities)
                ->description('Total kota')
                ->descriptionIcon('heroicon-m-map-pin')
                ->color('info')
                ->chart([4, 6, 5, 7, 8, 6, 5, 7])
                ->extraAttributes([
                    'class' => 'cursor-pointer',
                ])
                ->extraAttributes([
                    'x-data' => '{}',
                    'x-on:click' => 'window.location.href = "/admin/cities"',
                ]),
        ];
    }
}
