<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Auth\EditProfile;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\MenuItem;
use Filament\Navigation\NavigationItem;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Support\Enums\MaxWidth;
use Filament\Widgets;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\AuthenticateSession;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->registration()
            ->profile(EditProfile::class)
            ->colors([
                'primary' => Color::Sky,
            ])
            ->font('Poppins')
            ->favicon('images/favicon.png')
            ->globalSearchKeyBindings(['ctrl+p','command+p'])
            ->sidebarCollapsibleOnDesktop()
            ->sidebarWidth('17rem')
            ->collapsedSidebarWidth('3.5rem')
           // ->maxContentWidth(MaxWidth::ScreenTwoExtraLarge)
            ->maxContentWidth(MaxWidth::Full)
           // ->collapsedSidebarWidth(2200)
           // ->sidebarFullyCollapsibleOnDesktop()
            /*
            ->navigationItems([
                NavigationItem::make('Google')->url('http://www.google.com')
                ->icon('heroicon-o-pencil-square')
                ->group('External Link')
                ->sort(2)
               // ->visible(fn():bool =>auth()->user()->can('view'))
            ])*/
            ->userMenuItems([
                MenuItem::make()
                    ->label('Configurações')
                ->url('')
                ->icon('heroicon-o-cog-6-tooth'),
                'logout'=>MenuItem::make()->label('Sair')
            ])
           // ->breadcrumbs(false)
            //->darkMode(false)
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
              //  Widgets\AccountWidget::class,
             //   Widgets\FilamentInfoWidget::class,
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
            ])->plugins([
                \BezhanSalleh\FilamentShield\FilamentShieldPlugin::make()
            ]);
    }
}
