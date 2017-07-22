<?php

use Illuminate\Database\Seeder;
use App\Comment;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);
    	Eloquent::unguard();

    	$this->call('CommentTableSeeder');
    	$this->command->info('Comment table seeded.');
    }
  }
