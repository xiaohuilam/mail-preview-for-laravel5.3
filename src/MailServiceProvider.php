<?php
namespace CRanLaravel\MailPreview;

use Illuminate\Mail\MailServiceProvider as BaseMailServiceProvider;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Str;

class MailServiceProvider extends BaseMailServiceProvider
{
    /**
     * Register the Swift Transport instance.
     *
     * @return void
     */
    protected function registerSwiftTransport()
    {
        $this->app['swift.transport'] = $this->app->share(function ($app) {
            return new TransportManager($app);
        });
    }
}
