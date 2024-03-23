<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
// php artisan make:seeder UsersTableSeeder
// php artisan db:seed --class=UsersTableSeeder
class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::create([
            'name' => 'John Doe',
            'email' => 'john@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
        ]);
 
        User::create([
            'name' => 'Jane Smith',
            'email' => 'jane@example.com',
            'password' => Hash::make('password'),
            'role' => 'User',
        ]);
 
        User::create([
            'name' => 'Masud Alam',
            'email' => 'masud.eden@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Admin',
        ]);
 
        User::create([
            'name' => 'Sohel Alam',
            'email' => 'sohel@gmail.com',
            'password' => Hash::make('password'),
            'role' => 'Editor',
        ]);
 
    }
}