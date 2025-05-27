<?php

namespace App\Providers\Filament;

use Filament\Pages;
use Filament\Panel;
use Filament\Widgets;
use Filament\PanelProvider;
use Filament\Http\Middleware\Authenticate;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Filament\Http\Middleware\AuthenticateSession;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Joaopaulolndev\FilamentEditProfile\FilamentEditProfilePlugin;

class OwnerPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->id('owner')
            ->path('owner')
            ->brandName('DASHBOARD MITRA')
            // ->profile()
            ->plugins([
                FilamentEditProfilePlugin::make()
                    ->setIcon('heroicon-o-user')
                    ->shouldShowBrowserSessionsForm(false)
                    ->shouldShowSanctumTokens(false)
                    ->shouldShowDeleteAccountForm(false)
                    // ->shouldShowAvatarForm(true)
                    ->shouldShowAvatarForm(true, 'avatar')
            ])
            // ->login()
            ->colors([
                'primary' => [
                    50 => '#E6F7F2',
                    100 => '#CCEFE5',
                    200 => '#99DFCB',
                    300 => '#66CFB1',
                    400 => '#33BF97',
                    500 => '#00B98E', // Primary color from login
                    600 => '#008C6D', // Primary dark from login
                    700 => '#006F56',
                    800 => '#00523F',
                    900 => '#003527',
                    950 => '#001B14',
                ],
                'secondary' => [
                    50 => '#EEF0FF',
                    100 => '#DDE1FF',
                    200 => '#BBC3FF',
                    300 => '#99A5FF',
                    400 => '#7787FF',
                    500 => '#6C7BFF', // Secondary color from login
                    600 => '#4A5CFF',
                    700 => '#283DFF',
                    800 => '#061EFF',
                    900 => '#0015CC',
                    950 => '#000B99',
                ],
            ])
            ->discoverResources(in: app_path('Filament/Owner/Resources'), for: 'App\\Filament\\Owner\\Resources')
            ->discoverPages(in: app_path('Filament/Owner/Pages'), for: 'App\\Filament\\Owner\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Owner/Widgets'), for: 'App\\Filament\\Owner\\Widgets')
            ->widgets([
                \App\Filament\Owner\Widgets\StatsOverview::class,
            ])
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                VerifyCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
                \App\Http\Middleware\EnsureUserRole::class . ':owner',
            ]);
    }
}
