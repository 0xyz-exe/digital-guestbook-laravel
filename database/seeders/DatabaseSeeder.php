<?php
namespace Database\Seeders;
use App\Models\{User, Entry};
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory()->create(['name' => 'Admin', 'email' => 'admin@example.com']);
        
        Entry::create(['name' => 'John Doe', 'email' => 'john@example.com', 'message' => 'Great website! Thanks for creating this guestbook.', 'status' => 'approved', 'approved_at' => now()]);
        Entry::create(['name' => 'Jane Smith', 'message' => 'Love the design and simplicity. Keep up the good work!', 'status' => 'approved', 'approved_at' => now()->subHour()]);
        Entry::create(['name' => 'Bob Wilson', 'phone' => '555-1234', 'message' => 'This is a test message awaiting approval.', 'status' => 'pending']);
        Entry::create(['name' => 'Alice Brown', 'message' => 'Another pending entry for testing moderation.', 'status' => 'pending']);
    }
}
