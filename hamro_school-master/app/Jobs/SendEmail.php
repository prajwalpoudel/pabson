<?php

namespace App\Jobs;

use App\Notifications\EmailTemplateNotification;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class SendEmail implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    /**
     * @var string
     */
    private $slug;
    /**
     * @var array
     */
    private $data;
    private $user;

    /**
     * Create a new job instance.
     *
     * @param $user
     * @param string $slug
     * @param array $data
     */
    public function __construct($user, string $slug, array $data)
    {
        $this->user = $user;
        $this->slug = $slug;
        $this->data = $data;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $this->user->notify(new EmailTemplateNotification($this->slug, $this->data));
    }
}
