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
            'image' => 'files/task/2/6ilSwk41gXh4QfYUS9sRlRpepU1wr4gZESomDI7J.png',
            'bottom_title' => 'Здесь будет название квэста',
            'bottom_content' => 'Здесь будет описание квэста, правила игры и т.д. Фотку высше если что, можно будет поменять, это я так, для примера поставил. Нажми кнопку ниже. To do // исправить ошибку с загрузкой фото в ответе'
        ]);
    }
}
