<?php

namespace App\Providers\Filament;

use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Pages;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\Widgets;
use Filament\View\PanelsRenderHook;
use Illuminate\Support\HtmlString;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
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
            ->sidebarCollapsibleOnDesktop()
            ->brandName('Portal Admin CMS PUPR Bombana')
            ->brandLogo(fn () => view('filament.admin.logo'))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/logo.jpg'))
            ->colors([
                'primary' => Color::hex('#0b3b60'), // PUPR Blue
                'secondary' => Color::hex('#f1c40f'), // PUPR Yellow
                'success' => Color::Emerald,
                'warning' => Color::Amber,
                'danger' => Color::Rose,
                'info' => Color::Blue,
                'gray' => Color::Slate,
            ])
            ->font('Poppins')
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn (): string => new HtmlString('
                    <style>
                        /* Custom Background with subtle pattern */
                        main {
                            background-color: #eaf1f8 !important; /* Soft PUPR Blue */
                            background-image: radial-gradient(#0b3b6025 2px, transparent 2px) !important;
                            background-size: 30px 30px !important;
                        }
                        .dark main {
                            background-color: #071626 !important; /* Dark PUPR Blue */
                            background-image: radial-gradient(#f1c40f20 2px, transparent 2px) !important;
                            background-size: 30px 30px !important;
                        }
                        
                        /* Sidebar Separator & Brand Color */
                        aside.fi-sidebar {
                            background-color: #ffffff !important;
                            border-right: 5px solid #f1c40f !important; /* PUPR Yellow */
                            box-shadow: 5px 0 25px rgba(11, 59, 96, 0.1) !important; /* PUPR Blue Shadow */
                        }
                        .dark aside.fi-sidebar {
                            background-color: #0b3b60 !important; /* PUPR Blue in Dark Mode */
                            border-right: 5px solid #f1c40f !important;
                            box-shadow: 5px 0 25px rgba(0,0,0,0.5) !important;
                        }
                        
                        /* Fix header to not blend with the custom background */
                        header.fi-topbar {
                            background-color: rgba(255, 255, 255, 0.8) !important;
                            backdrop-filter: blur(10px);
                            border-bottom: 2px solid rgba(11, 59, 96, 0.1) !important;
                            box-shadow: 0 4px 15px -1px rgba(11, 59, 96, 0.05) !important;
                        }
                        .dark header.fi-topbar {
                            background-color: rgba(11, 59, 96, 0.8) !important;
                            border-bottom: 2px solid rgba(241, 196, 15, 0.2) !important;
                        }
                    </style>
                '),
            )
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverPages(in: app_path('Filament/Pages'), for: 'App\\Filament\\Pages')
            ->pages([
                Pages\Dashboard::class,
            ])
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                // Widgets\AccountWidget::class,
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
            ]);
    }
}
