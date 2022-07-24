<?php

namespace Database\Seeders;

use App\Services\General\EmailTemplateService;
use Illuminate\Database\Seeder;

class EmailTemplateTableSeeder extends Seeder
{
    /**
     * @var EmailTemplateService
     */
    private $emailTemplateService;

    /**
     * EmailTemplateSeeder constructor.
     * @param  EmailTemplateService  $emailTemplateService
     */
    public function __construct(EmailTemplateService $emailTemplateService)
    {

        $this->emailTemplateService = $emailTemplateService;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $templates = [
            [
                'slug'       => 'school_added',
                'title'      => 'School Registered',
                'subject'    => 'Registered Successfully',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Dear [PRINCIPAL_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your school <strong> [SCHOOL_NAME] </strong> has been successfully registered in Hamro School platform.</p><p> Please use [EMAIL] as an email or [USERNAME] as a username and [PASSWORD] as a password to login into your profile.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>',
            ],
            [
                'slug'       => 'user_registered',
                'title'      => 'User Registered',
                'subject'    => 'Registered Successfully',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully registered in Hamro School platform.</p><p> Please use [EMAIL] as an email or [USERNAME] as a username and [PASSWORD] as a password to login into your profile.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>',
            ],
            [
                'slug'       => 'self_school_registered',
                'title'      => 'Self School Registered',
                'subject'    => 'Registered Successfully',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your school <strong> [SCHOOL_NAME] </strong> has been successfully registered in Hamro School platform and is in the process of verification.</p><p>We will let you know once we verify you.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>',
            ],
            [
                'slug'       => 'self_registered',
                'title'      => 'Self Registered',
                'subject'    => 'Registered Successfully',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully registered in Hamro School platform and is in the process of verification.</p><p>We will let you know once we verify you.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>',
            ],
            [
                'slug'       => 'account_verified',
                'title'      => 'Account Verified',
                'subject'    => 'Account Verified',
                'email_from' => config('mail.from.address'),
                'content'    => '<p>Dear [USER_NAME]</p><p><br><strong> Congratulations! </strong> </p><p>Your account has been successfully verified.</p><br><p>Thank you</p> <br> <p>Hamro School Team</p><br>',
            ],
        ];

        foreach ($templates as $template) {

            $this->emailTemplateService->updateOrCreate(['slug' => $template['slug']], $template);
        }
    }
}
