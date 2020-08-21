<?php

use App\Models\Quest;
use Illuminate\Database\Seeder;

class QuestSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Quest::create([
            'main_title' => 'Quest',
            'image' => '___',
            'bottom_title' => 'Bottom Title',
            'bottom_content' => 'There should be detailed information about the game, its rules, etc.'
        ]);
    }
}
