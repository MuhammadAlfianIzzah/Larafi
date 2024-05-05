<?php

namespace Alfianizzah\Larafi\Console;

use Alfianizzah\Larafi\Models\User;
use Faker\Factory;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class GenerateUserCommand extends Command
{
    protected $signature = 'larafi:generate-user {jumlah}';

    protected $description = 'Generate user';
    public function handle()
    {
        $jumlah = $this->argument('jumlah');
        $this->info('Generate User data ...');
        for ($i = 0; $i < $jumlah; $i++) {
            $faker = Factory::create("id_ID");
            $attr = [
                'name' => $faker->name,
                'email' => $faker->email,
                "password" =>      Hash::make("password"),
            ];
            User::create($attr);
        }
        $this->info('Berhasil generate');
    }
}
