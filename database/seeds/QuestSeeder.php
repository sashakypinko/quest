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
            'top_title' => 'Top Title',
            'top_content' => 'Content for top section. This text will be changed in future',
            'bottom_title' => 'Bottom Title',
            'bottom_content' => 'There should be detailed information about the game, its rules, etc.'
        ]);
    }
}
