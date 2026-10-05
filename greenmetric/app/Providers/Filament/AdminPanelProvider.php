<?php

namespace App\Providers\Filament;

use App\Filament\Pages\Dashboard;
use App\Filament\Pages\ED\IndicatorED;
use App\Filament\Pages\EC\IndicatorEC;
use App\Filament\Pages\SI\IndicatorSI;
use App\Filament\Pages\TR\IndicatorTR;
use App\Filament\Pages\WR\IndicatorWR;
use App\Filament\Pages\WS\IndicatorWS;
use App\Filament\Widgets\CategoryProgressChart;
use App\Filament\Widgets\GreenMetricKPI;
use App\Filament\Widgets\RecentActivityTable;
use App\Filament\Widgets\TopUniversitiesTable;
use Filament\Http\Middleware\Authenticate;
use Filament\Http\Middleware\AuthenticateSession;
use Filament\Http\Middleware\DisableBladeIconComponents;
use Filament\Http\Middleware\DispatchServingFilamentEvent;
use Filament\Navigation\NavigationGroup;
use Filament\Panel;
use Filament\PanelProvider;
use Filament\Support\Colors\Color;
use Filament\View\PanelsRenderHook;
use Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse;
use Illuminate\Cookie\Middleware\EncryptCookies;
use Illuminate\Foundation\Http\Middleware\ValidateCsrfToken;
use Illuminate\Routing\Middleware\SubstituteBindings;
use Illuminate\Session\Middleware\StartSession;
use Illuminate\View\Middleware\ShareErrorsFromSession;
use Illuminate\Support\Facades\Blade;

class AdminPanelProvider extends PanelProvider
{
    public function panel(Panel $panel): Panel
    {
        return $panel
            ->default()
            ->id('admin')
            ->path('admin')
            ->login()
            ->brandName('')
            ->brandLogo(Blade::render('
                <div style="display:flex;align-items:center;gap:12px;">
                    <img src="{{ asset(\'images/logo_greenmetric.png\') }}"
                         style="height:3rem;width:auto;object-fit:contain;"
                         alt="UI GreenMetric">
                    <div style="width:1px;height:2.5rem;background:rgba(255,215,0,0.3);"></div>
                    <img src="{{ asset(\'images/logo_unila.png\') }}"
                         style="height:3rem;width:auto;object-fit:contain;"
                         alt="Universitas Lampung">
                    <div style="display:flex;flex-direction:column;line-height:1.3;margin-left:4px;">
                        <span style="font-size:15px;font-weight:700;color:#FFD700;font-family:Poppins,sans-serif;">
                            UI GreenMetric
                        </span>
                        <span style="font-size:11px;font-weight:500;color:rgba(255,215,0,0.65);font-family:Poppins,sans-serif;">
                            Universitas Lampung
                        </span>
                    </div>
                </div>
            '))
            ->brandLogoHeight('3rem')
            ->favicon(asset('images/logo_greenmetric.png'))
            ->colors([
                'primary' => Color::hex('#FFD700'),
                'gray'    => Color::Zinc,
                'info'    => Color::hex('#008000'),
                'success' => Color::hex('#008000'),
                'warning' => Color::hex('#FF0000'),
                'danger'  => Color::hex('#FF0000'),
            ])
            ->font('Poppins')
            ->pages([
                Dashboard::class,
                IndicatorSI::class,
                IndicatorEC::class,
                IndicatorWS::class,
                IndicatorWR::class,
                IndicatorTR::class,
                IndicatorED::class,
            ])
            ->discoverResources(in: app_path('Filament/Resources'), for: 'App\\Filament\\Resources')
            ->discoverWidgets(in: app_path('Filament/Widgets'), for: 'App\\Filament\\Widgets')
            ->widgets([
                GreenMetricKPI::class,
                CategoryProgressChart::class,
                TopUniversitiesTable::class,
                RecentActivityTable::class,
            ])
            ->navigationGroups([
                NavigationGroup::make('Master Data'),
                NavigationGroup::make('Indikator GreenMetric')->collapsible(),
                NavigationGroup::make('Submissions'),
            ])
            ->renderHook(
                PanelsRenderHook::HEAD_END,
                fn(): string => '<link rel="stylesheet" href="' . asset('css/greenmetric-theme.css') . '">' 
            )
            ->renderHook(
                PanelsRenderHook::TOPBAR_START,
                fn(): string => '<div style="display:flex;align-items:center;gap:8px;padding:0 1rem"><span style="font-size:11px;background:rgba(255,215,0,0.15);color:#FFD700;border:1px solid rgba(255,215,0,0.3);padding:3px 10px;border-radius:20px;font-weight:600;letter-spacing:1px">&#127807; KAMPUS HIJAU 2026</span></div>'
            )
            ->middleware([
                EncryptCookies::class,
                AddQueuedCookiesToResponse::class,
                StartSession::class,
                AuthenticateSession::class,
                ShareErrorsFromSession::class,
                ValidateCsrfToken::class,
                SubstituteBindings::class,
                DisableBladeIconComponents::class,
                DispatchServingFilamentEvent::class,
            ])
            ->authMiddleware([
                Authenticate::class,
            ]);
    }
};