<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Jobs\CheckPriceNotifications;

class CheckPriceNotificationsCommand extends Command
{
    protected $signature = 'check:price-notifications';
    protected $description = 'Check price notifications and send emails if necessary';

    public function __construct()
    {
        parent::__construct();
    }

    public function handle()
    {
        dispatch(new CheckPriceNotifications());
        $this->info('Price notifications checked and emails sent successfully.');
    }
}
