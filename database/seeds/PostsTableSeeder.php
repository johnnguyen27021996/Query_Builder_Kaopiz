<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            array(
                'title' => 'Bai dang so 1',
                'content' => 'Day la bai dang so mot'
            ),
            array(
                'title' => 'Bai dang so 2',
                'content' => 'Day la bai dang so hai'
            )
        ]);
    }
}
