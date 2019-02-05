<?php

namespace Mydnic\Kustomer\Console;

use Illuminate\Support\Str;
use Illuminate\Console\Command;

class PublishCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'kustomer:publish {--force : Overwrite any existing files}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Publish all of the Kustomer Feedback resources';

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->comment('Publishing Kustomer Assets...');
        $this->call('vendor:publish', [
            '--tag' => 'kustomer-assets',
            '--force' => $this->option('force'),
        ]);

        $this->comment('Publishing Kustomer Configuration...');
        $this->call('vendor:publish', [
            '--tag' => 'kustomer-config',
            '--force' => $this->option('force'),
        ]);

        $this->comment('Publishing Kustomer Translation Files...');
        $this->call('vendor:publish', [
            '--tag' => 'kustomer-locales',
            '--force' => $this->option('force'),
        ]);

        $this->comment('Publishing Kustomer View Files...');
        $this->call('vendor:publish', [
            '--tag' => 'kustomer-views',
            '--force' => $this->option('force'),
        ]);

        $this->info('Kustomer scaffolding installed successfully.');
    }
}
