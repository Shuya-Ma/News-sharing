<?php

use Illuminate\Database\Seeder;

class TagsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	DB::table('tags')->insert([
    		'tagname' => 'technology'
    		]);

    	DB::table('tags')->insert([
    		'tagname' => 'music'
    		]);

    	DB::table('tags')->insert([
    		'tagname' => 'school'
    		]);

    	DB::table('tags')->insert([
    		'tagname' => 'funny'
    		]);
    }
  }
