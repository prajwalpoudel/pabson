<?php

namespace App\Providers;

use App\Http\ViewComposers\Admin\MenuComposer;
use App\Http\ViewComposers\Front\FrontMenuComposer;
use App\Http\ViewComposers\Front\FrontMobileMenuComposer;
use App\Http\ViewComposers\Front\SettingsComposer;
use App\Http\ViewComposers\Moderator\MenuComposer as ModeratorMenuComposer;
use App\Http\ViewComposers\Teacher\TeacherMenuComposer;
use App\Http\ViewComposers\School\MenuComposer as SchoolMenuComposer;
use App\Http\ViewComposers\Student\MenuComposer as StudentMenuComposer;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(['admin.*'], MenuComposer::class);
        View::composer(['admin.layouts.sidebar'], SettingsComposer::class);

        View::composer(['front.*'], FrontMenuComposer::class);
        View::composer(['front.*'], FrontMobileMenuComposer::class);
        View::composer(['front.*'], SettingsComposer::class);

        View::composer(['school.*'], SchoolMenuComposer::class);
        View::composer(['school.layouts.sidebar'], SettingsComposer::class);

        View::composer(['student.*'], StudentMenuComposer::class);
        View::composer(['student.layouts.sidebar'], SettingsComposer::class);

        View::composer(['teacher.*'], TeacherMenuComposer::class);
        View::composer(['teacher.layouts.sidebar'], SettingsComposer::class);

        View::composer(['moderator.*'], ModeratorMenuComposer::class);
        View::composer(['moderator.layouts.sidebar'], SettingsComposer::class);


    }
}
