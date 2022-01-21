<?php

namespace App\Console\Commands;

use App\Member;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class InitMembers extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:init';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Will initialize all members who do not have a password set with a new password';

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
        $password = $this->secret('password');

        foreach (Member::where('email', '!=', null)->where('password', '=', null)->get() as $member) {
            $this->output->write('Setting password for ' . $member->email . '... ');
            $member->update([
                'password' => Hash::make($password)
            ]);

            $this->output->writeln('[<info>OK</info>]');
        }
    }
}
