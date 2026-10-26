<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        $role = Role::firstOrCreate(
            ['role_code' => 'admin'], // check by this field
            ['name' => 'Admin']       // set these if creating
        );

        // Create employee if it doesn't exist
        $employee = Employee::firstOrCreate(
            ['employee_code' => 'testing'], // search by employee_code
            [
                'name' => 'Admin',
                'email' => 'admin@example.com', // add email
            ]
        );

        // Create user if it doesn't exist
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'role_id' => $role->id,
                'employee_id' => $employee->id,
                'password' => Hash::make('12345678'), // always hash
            ]
        );
    }
}
