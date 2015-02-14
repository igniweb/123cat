<?php namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider {

    /**
    * Register bindings in the container.
    *
    * @return void
    */
    public function boot()
    {
        View::composer('layouts.admin._nav', 'App\Http\ViewComposers\AdminNavComposer');
    }

    public function register()
    {
        //
    }

}
