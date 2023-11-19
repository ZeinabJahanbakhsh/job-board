<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\Command as CommandAlias;

class InsertAdditionalData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:insert-additional-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert demo data with a lot of records';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle(): int
    {
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed --class=AdditionalDataSeeder');
        Artisan::call('optimize:clear');

        $this->info('The command was successful!');
        $this->comment('Run migrations successful ..!');
        $this->comment('Run seeders successful ..!');
        $this->comment('Clear cache successful ..!');
        return CommandAlias::SUCCESS;
    }
}
