<?php

namespace JohnDoe\larafi\Console;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class InstallLarafi extends Command
{
    protected $signature = 'larafi:install';

    protected $description = 'Install the larafi';

    public function handle()
    {
        $this->info('Installing larafi...');

        $this->info('Publishing configuration...');

        if (!$this->configExists('larafi.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed larafi');
    }

    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Alfianizzah\Larafi\LarafiServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
    }
}
