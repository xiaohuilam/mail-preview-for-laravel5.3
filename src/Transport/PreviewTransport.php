<?php
namespace CRanLaravel\MailPreview\Transport;

use Swift_Mime_Message;
use Illuminate\Mail\Transport\Transport as BaseTransport;
use Carbon\Carbon;

class PreviewTransport extends BaseTransport
{
    /**
     * {@inheritdoc}
     */
    public function send(Swift_Mime_Message $message, &$failedRecipients = null)
    {
        $this->beforeSendPerformed($message);

        //用来生成文件名
        $addresses = array_map(function ($item) {
            return join(',', array_keys($item->getFieldBodyModel()));
        }, $message->getHeaders()->getAll('to'));
        $file_name = Carbon::now()->toDateTimeString()."(".str_replace("\r\n", '', join(',', $addresses)).")";
        if (!is_dir(public_path('mail-preview'))) {
            mkdir(public_path('mail-preview'));
        }
        $file_path = public_path('mail-preview/'.$file_name.'.html');
        $file_content = $this->buildFileContent($message);
        file_put_contents($file_path, $file_content);
        $this->sendPerformed($message);

        return $this->numberOfRecipients($message);
    }

    /**
     * @param  $message
     * @return string
     */
    protected function buildFileContent($message)
    {
        $content = $message->getBody();
        return $content;
    }
}
