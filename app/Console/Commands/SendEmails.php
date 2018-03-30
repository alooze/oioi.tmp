<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Settings as S;
use App\User;
use Mail;
use App\Mail\PeriodWarningEmail;
use Carbon\Carbon;

class SendEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'emails:send';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send reminder emails';

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
        if ($endsForObj = S::where('name', 'email_days')->first()) {
            $endsFor = $endsForObj->value;
        } else {
            $endsFor = 7;
        }
        

        $periodEndObj = S::where('name','period_end')->first();
        if (!$periodEndObj) {
            return false;
        }
        
        $until = Carbon::parse($periodEndObj->value)->subDays($endsFor);
        $now = new Carbon();

        // $this->info($now->diffInDays($until));

        if ($now->diffInDays($until) === 0) {
            $users = User::get();
            foreach ($users as $user) {
                Mail::to($user)->send(new PeriodWarningEmail($user));
            }
        }
        
    }
}
