<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\WeeklyFixtureMail;

class SendWeeklyFixture extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:weeklyreport';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Send the email
        Mail::to('mekwa.elliot@gmail.com')->send(new WeeklyFixtureMail());

        // Output a success message to the console
        $this->info('Weekly report email sent successfully!');

        return 0;
    }
}
