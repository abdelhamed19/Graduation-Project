<?php

namespace App\Console\Commands;

use App\Models\Writing;
use Illuminate\Console\Command;

class ClearOldNotes extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:clear-old-notes';

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
        $twoMinutesAgo = now()->subMinutes(2);
        Writing::where('created_at', '<=', $twoMinutesAgo)->delete();
    }
}
