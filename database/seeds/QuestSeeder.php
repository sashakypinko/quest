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
            'bottom_title' => 'Здесь будет название квэста',
            'bottom_content' => 'Здесь будет описание квэста, правила игры и т.д. Фотку высше если что, можно будет поменять, это я так, для примера поставил.'
        ]);
    }
}
