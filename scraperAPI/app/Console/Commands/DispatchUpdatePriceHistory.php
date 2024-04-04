<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\UpdatePriceHistory;

class DispatchUpdatePriceHistory extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'price:update';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Dispatch UpdatePriceHistory job';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        dispatch(new UpdatePriceHistory());

        $this->info('UpdatePriceHistory job dispatched successfully.');
    }
}
