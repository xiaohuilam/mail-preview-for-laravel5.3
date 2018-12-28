<?php
namespace CRanLaravel\MailPreview;

use Illuminate\Mail\TransportManager as BaseTransportManager;
use CRanLaravel\MailPreview\Transport\PreviewTransport;

class TransportManager extends BaseTransportManager
{
    /**
     * 实例化邮件的Preview Driver
     *
     * @return App\Mail\PreviewTransport
     */
    protected function createPreviewDriver()
    {
        return new PreviewTransport;
    }
}
