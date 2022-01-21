<?php

namespace App\Console\Commands;

use App\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MakeUser extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:user {email : Email address} {name : Users full name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Create a new administrator user';

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
     * @return mixed
     */
    public function handle()
    {
        $validator = validator([
            'email' => $this->argument('email'),
        ], [
            'email' => ['email']
        ]);

        if ($validator->fails()) {
            $this->error('Not a valid email address');
            exit(1);
        }

        $password = $this->secret('Password');

        $user = User::create([
            'name' => $this->argument('name'),
            'email' => $this->argument('email'),
            'password' => Hash::make($password)
        ]);

        $this->info('User ' . $user->email . ' created');
    }
}
