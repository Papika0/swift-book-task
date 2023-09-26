<?php

namespace App\Console\Commands;

use App\Models\User;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Validator;

class CreateAdmin extends Command
{
    protected $signature = 'create:admin';

    protected $description = 'Create an admin';

    public function handle()
    {
        $name = $this->ask('What is the admin\'s name?');
        $email = $this->ask('What is the admin\'s email address?');
        $password = $this->secret('What is the admin\'s password?');

        $validator = Validator::make([
            'email'    => $email,
            'password' => $password,
        ], [
            'email'    => ['required', 'email', 'unique:users,email'],
            'password' => ['required'],
        ], [
            'email.exists' => 'The email address is not registered in our system.',
        ]);

        if ($validator->fails()) {
            $this->error($validator->errors()->first());
            return;
        }

        User::create([
            'name'     => $name,
            'email'    => $email,
            'password' => $password,
        ]);

        $this->info('Admin created successfully!');
    }
}
