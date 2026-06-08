<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use App\Models\Notification;
use Carbon\Carbon;
use Sentry\SentrySdk;
use Sentry\State\Scope;


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
            // Sharing notifications and header color with all views
            View::composer('*', function ($view) {
                // Get all notifications
                $notifications = Notification::where('notifiable_id', 0)
                    ->orderBy('created_at', 'desc')
                    ->take(10) // Limit to the last 10 notifications
                    ->get();

                // Fetch the settings to get the header color
                $settings = \App\Models\Settings::first();
                $headerColor = $settings->header_color ?? '#ffffff'; // Default to white if not set
                $sidebarColor = $settings->sidebar_color ?? '#ffffff';
                $buttonColor = $settings->button_color ?? '#ffffff';

                $logoUrl = null;
                $extensions = ['png', 'jpg', 'jpeg', 'gif', 'svg', 'webp'];
                foreach ($extensions as $ext) {
                    if (\Illuminate\Support\Facades\Storage::disk('public')->exists('img/softwareLogo.' . $ext)) {
                        $logoUrl = asset('storage/img/softwareLogo.' . $ext);
                        break;
                    }
                }
                // Share the notifications and headerColor with all views
                $hasActivePlan = false;
                if (auth()->check()) {
                    $org = auth()->user()->organization;
                    $hasActivePlan = $org && $org->activeSubscription ? true : false;
                }

                $view->with([
                    'notifications' => $notifications,
                    'headerColor' => $headerColor,
                    'sidebarColor' => $sidebarColor,
                    'buttonColor' => $buttonColor,
                    'appLogo' => $logoUrl,
                    'hasActivePlan' => $hasActivePlan,
                ]);
            });
        }
}
