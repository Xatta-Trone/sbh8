<?php

namespace App\Providers;

use App\Models\Admin\SiteSetting;
use Illuminate\Support\Facades\URL;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Cache;
use Artesaos\SEOTools\Facades\SEOMeta;
use Artesaos\SEOTools\Facades\SEOTools;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\ServiceProvider;
use Artesaos\SEOTools\Facades\OpenGraph;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        if ($this->app->environment('production')) {
            URL::forceScheme('https');
        }

        Model::unguard();
        // Paginator::useBootstrap();
        Paginator::defaultView('shared.pagination');
        Paginator::defaultSimpleView('shared.pagination');



        // sharing site settings data to all views
        $settings  = Cache::remember('site_settings', 24 * 60 * 60, function () {
            return SiteSetting::where('status', 1)->get();
        });

        View::share('logo', url('uploads/' . $settings->where('key', 'logo')->first()->value));
        View::share('og_image', url('uploads/' . $settings->where('key', 'og_image')->first()->value));
        View::share('site_name', $settings->where('key', 'name')->first()->value);
        View::share('name_short', $settings->where('key', 'name_short')->first()->value);
        View::share('keywords', $settings->where('key', 'keywords')->first()->value);
        View::share('description', $settings->where('key', 'description')->first()->value);
        View::share('address', $settings->where('key', 'address')->first()->value);
        View::share('phone', $settings->where('key', 'phone')->first()->value);
        View::share('email', $settings->where('key', 'email')->first()->value);
        View::share('description_short', $settings->where('key', 'description_short')->first()->value);
        View::share('scripts', $settings->where('key', 'scripts')->first()->value);
        View::share('links', $settings->where('key', 'links')->first()->value);

        SEOTools::setTitle($settings->where('key', 'name')->first()->value);
        SEOTools::setDescription($settings->where('key', 'description')->first()->value);
        SEOTools::opengraph()->setUrl(url(''));
        SEOTools::setCanonical(url(''));
        OpenGraph::setUrl(url(''));
        SEOMeta::addKeyword($settings->where('key', 'keywords')->first()->value);
        OpenGraph::addImage(url('uploads/' . $settings->where('key', 'og_image')->first()->value));
    }


}
