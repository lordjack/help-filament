<?php

namespace App\Providers;

use Filament\Tables\Table;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\ServiceProvider;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Model::unguard();
        //formata todas as datas das tables
        Table::$defaultDateTimeDisplayFormat = 'd/m/Y H:i:s';
        Table::$defaultDateDisplayFormat = 'd/m/Y';

        /**
         * Override the Filament sidebar start.blade.php view to inject our "Laravel Echo" global
         * JavaScript before Livewire loads its LaravelEcho component.
         */
        View::creator( 'filament-panels::page.sub-navigation.sidebar', static function ( \Illuminate\View\View $view ) {
           // dd(Storage::exists("views/vendor/filament/components/page/sub-navigation/sidebar.blade.php"));
            $view->setPath( resource_path( 'views/vendor/filament/components/page/sub-navigation/sidebar.blade.php' ) );
        } );
    }
}
