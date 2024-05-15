<?php

namespace Database\Seeders;

use App\Models\Task;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::truncate();

        $admin = new User();
        $admin->name = 'Administrator';
        $admin->email = 'admin@admin.com';
        $admin->email_verified_at = Carbon::now();
        $admin->password = Hash::make('password');
        $admin->save();

        $user = new User();
        $user->name = 'Luqman';
        $user->email = 'luqman@gmail.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('password');
        $user->save();

        $user = new User();
        $user->name = 'Arif';
        $user->email = 'arif@gmail.com';
        $user->email_verified_at = Carbon::now();
        $user->password = Hash::make('password');
        $user->save();

        // User::factory()
        //     ->has(Task::factory()->count(3))
        //     ->create();
    }
}
