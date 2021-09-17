<?php

namespace App\Jobs;

use App\Models\GitUser;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\Queue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;

class ProcessGitUserData implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $gitApiData;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($gitApiData)
    {
        $this->gitApiData = $gitApiData;

        $this->onQueue('default');
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $userData = new GitUser();
        foreach($this->gitApiData as $data) {
            $userData->full_name = $data->full_name;
            $userData->owner_login = $data->owner->login;
            $userData->watchers_count = $data->watchers_count;   
        }

        $userData->save();
    }
}
