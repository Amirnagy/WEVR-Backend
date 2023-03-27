<?php

namespace App\Console\Commands;

use Carbon\Carbon;
use Illuminate\Console\Command;
use App\Models\Apartmentdetails;

class ExpireDiscountsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'discount:expire';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'discount expire command to determine Number of days after which discounts should expire';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        Apartmentdetails::whereNotNull('discount')
            ->where('discount_end_date', '<', Carbon::now())
            ->update(['discount' => null,'price_after_discount'=> null , 'discount_end_date' => null]);
        return Command::SUCCESS;
    }
}
