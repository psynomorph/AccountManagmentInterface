<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Faker\Generator as Faker;
use App\Account;

class GenerateFakeAccounts extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'generate-fake-accounts {count}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Fill database with fake accounts';

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
     * Generate random fake accounts
     *
     * @return void
     */
    public function handle(Faker $faker)
    {
        $count = $this->argument('count');
        $accounts = [];

        for($i = 0; $i < $count; $i++)
        {
            // Select gender of account
            $gender = rand() % 2 == 0
                ? 'male'
                : 'female';

            // And generate account data
            $account = [
                'firstName' => $faker->firstName($gender),
                'lastName' => $faker->lastName($gender),
                'email' => $faker->unique()->email,
                'companyName' => $faker->company,
                'position' => $faker->jobTitle,
                'phone1' => $faker->phoneNumber,
                'phone2' => $faker->phoneNumber,
                'phone3' => $faker->phoneNumber
            ];

            $accounts[] = $account;
        }

        Account::insert($accounts);
    }
}
