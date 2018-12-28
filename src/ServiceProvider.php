<?php
namespace CRanLaravel\MailPreview;

use Illuminate\Support\ServiceProvider as BaseServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class ServiceProvider extends BaseServiceProvider
{
    /**
     * 增加Route处理
     * @return void
     */
    public function boot()
    {
        $this->app->register(MailServiceProvider::class);
        $this->loadViewsFrom(__DIR__.'/view/', 'mail-preview');
        $this->routeRegister();
    }

    /**
     * 注册路由
     * @return void
     */
    protected function routeRegister()
    {
        if (!Str::startsWith(env('APP_ENV'), 'prod')) {
            $this->app->booted(function () {
                $this->app['router']->get('/mails/', function () {
                    $mails = array_values(array_filter(scandir(public_path('mail-preview')), function ($item) {
                        return strpos($item, '.html');
                    }));
                    arsort($mails);
                    return view('mail-preview::base')->withMails($mails);
                });
            });
        }
    }
}
