<?php
 
namespace Database\Seeders;
 
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Post;
// php artisan make:seeder PostsTableSeeder
// php artisan db:seed --class=PostsTableSeeder
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user1 = User::where('email', 'john@example.com')->first();
        $user2 = User::where('email', 'jane@example.com')->first();
 
        Post::create([
            'user_id' => $user1->id,
            'title' => 'First Post',
            'content' => 'This is the content of the first post.',
        ]);
 
        Post::create([
            'user_id' => $user2->id,
            'title' => 'Second Post',
            'content' => 'This is the content of the second post.',
        ]);
    }
}