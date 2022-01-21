<?php

namespace App\Console\Commands;

use App\Member;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Hash;

class MemberPassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'members:password {email : The primary email address of the member to update the password for}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Reset a members password';

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
        $member = Member::where('email', '=', $this->argument('email'))->first();
        if (!$member) {
            $this->error('No such member with email address ' . $this->argument('email'));
            exit(1);
        }

        $password = $this->secret('New Password');

        $validator = validator(['password' => $password], [
            'password' => ['string', 'min:8']
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            exit(2);
        }

        $member->update([
            'password' => Hash::make($password)
        ]);

        $this->output->writeln('Updated password for member ' . $this->argument('email'));
    }
}
