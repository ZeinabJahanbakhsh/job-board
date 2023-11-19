<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Symfony\Component\Console\Command\Command as CommandAlias;

class InsertDemoData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'project:insert-demo-data';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Insert demo data with a admin, a employer and a candidate';

    /**
     * Execute the console command.
     *

     */
    public function handle()
    {
        Artisan::call('migrate:refresh');
        Artisan::call('db:seed --class=DemoDataSeeder');
        Artisan::call('optimize:clear');

        $this->info('The command was successful!');
        $this->comment('Run migrations successful ..!');
        $this->comment('Run seeders successful ..!');
        $this->comment('Clear cache successful ..!');
    }
}
