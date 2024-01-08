<?php

namespace App\Console\Commands;

use App\Models\Link;
use Illuminate\Console\Command;

class DeleteExpiredLinks extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'links:delete-expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Delete expired links';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $expiredLinks = Link::where('expiration_date', '<=', now())->get();

        foreach ($expiredLinks as $link) {
            $link->clicks()->delete();
            $link->delete();
        }

        $this->info('Expired links deleted successfully.');
    }
}
