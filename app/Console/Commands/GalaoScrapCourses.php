<?php

namespace App\Console\Commands;

use App\Services\DiscordService;
use App\Services\PlanningService;
use Illuminate\Console\Command;

class GalaoScrapCourses extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'edtp:courses';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        $service = new PlanningService();
        $service->synchronize();

        $service = new DiscordService();
        $service->postMessage("Synchro EDTP depuis Galao OK !");

        return Command::SUCCESS;
    }
}
