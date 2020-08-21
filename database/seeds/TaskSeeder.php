<?php

use App\Models\Task;
use Illuminate\Database\Seeder;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Task::create([
            'title' => 'У вас пока нет заданий',
            'description' => 'Подождите немножко, задание скоро появится',
            'image' => 'images/default.jpg'
        ]);
    }
}
