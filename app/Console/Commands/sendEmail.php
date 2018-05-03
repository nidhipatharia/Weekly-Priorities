<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\User;

class sendEmail extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send:reminder';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Sends a reminder email to the entire team to fill up weekly priorities';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $users = User::all();
        foreach($users as $user){
            \Mail::send('email',['user' => $user], function($message) use ($user){
                $message->from('MaryClaire.Krzewinski@cengage.com','Mary Claire Krzewinski');
                $message->to($user->email);
                $message->subject("Weekly Priorities Reminder");
            });
        }
        $this->info("Reminder Sent");

    }
}
