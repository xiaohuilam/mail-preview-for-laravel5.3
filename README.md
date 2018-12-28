## Mail Preview Driver for Laravel5.3

#### Instruction

1. Put `CRanLaravel\MailPreview\ServiceProvider::class` into `config/app.php`.
2. Set MAIL_DRIVER as preview in `.env`.
3. Send email in your project.
4. Access `http://your_host.com/mails` to check the mailed list!
5. Don't forget to ignore /public/mail-preview in the git