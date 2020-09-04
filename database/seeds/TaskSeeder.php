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
            'title' => 'На старт',
            'description' => 'Ну и сразу же ловите первое задание) Вам нужно приехать на БШ, и сделать общее селфи. Место, где вы должны сфотографироваться отмечено на карте.',
            'image' => 'files/task/17/asaCR0vRFXsf9it55wCwWOnLlYlil6VB3Kg044Nc.png',
            'priority' => 0,
            'lon' => '35.116471',
            'lat' => '47.851100'
        ]);

        Task::create([
            'title' => 'Селфи с профессором',
            'description' => 'Вы должны сделать селфи с профессором, которого найдете с помощью карты. Отправьте фото нам и приступайте к следующему заданию.',
            'image' => 'files/task/17/sOWRzAWzf4tWa8OLuJlrjdvbYNAjN15MvGaIVEn5.jpeg',
            'priority' => 1,
            'lon' => '35.116015',
            'lat' => '47.851165'
        ]);

        Task::create([
            'title' => 'Близко к сердцу',
            'description' => 'Это задание лежит между двух сердец)',
            'image' => 'files/task/17/DUtnH9GOLGvdfpzzJF9jMn4Kxaw6gdIkPhMSkpB1.jpeg',
            'priority' => 2,
            'lon' => '35.115326',
            'lat' => '47.850855'
        ]);

        Task::create([
            'title' => 'Orbit',
            'description' => 'Ты как жвачка под партой, тебя нужно отодрать)))',
            'image' => 'files/task/17/UlNLpOEZYIgAoNk9WAGaTY358hf1SYpZkPp05LOE.jpeg',
            'priority' => 3,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Автограф',
            'description' => 'Тебе не кажется, что на листке тетради чего-то то не хватает?) А если быть точнее не хватает нашего аккаунта "Jesus_teens". У тебя в руках корректор не просто так) думаю ты знаешь что дальше делать) сделай это красиво)',
            'image' => 'files/task/17/WrSBKYAG4SvohvhQVrjHlQ6dGV6pYRkjQ4iw45Ql.jpeg',
            'priority' => 4,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'придумать название',
            'description' => 'Ну что ты готов к смелым поступкам??? Если да, то мы нечто приготовили для тебя) Задание найдёшь в прекрасных белых цветах... ',
            'image' => 'files/task/17/XBSe803TcMGv6My01L9IbckaHanhYlJPK96TkQLR.jpeg',
            'priority' => 5,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Загадочка',
            'description' => 'Из нарядной яркой чашки угощаются букашки. Сфотографируйте магазин с отгадкой, и напишите откадку)',
            'image' => 'files/task/17/JM5Uw9uz2mcc6dPMzU4isGox6ylcjOP8j5LQevsJ.jpeg',
            'priority' => 6,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Мишка',
            'description' => 'В "цветочке" скучает этот милый мишка) Итак твое задание - сфотографировать мишку и узнать сколько она стоит) И передай привет от Тедди) ',
            'image' => 'files/task/17/Kg6L07VEZdKyQcnCdqu9nNmX3YYMhkaBACwVCRrc.jpeg',
            'priority' => 7,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Толченка',
            'description' => 'Ну что ты проголодался? Предлагаем найти толченку и сфотографироваться с ней)',
            'image' => 'files/task/17/o1Mcf5sTqEIcLVygP6hr1WHcJSiupp9R24ller9F.jpeg',
            'priority' => 8,
            'lon' => '35.113188',
            'lat' => '47.848980'
        ]);

        Task::create([
            'title' => 'Мида',
            'description' => 'Говорят что хороший сапожник на вес золота) Тебе повезло ведь на своем пути ты встретил мастера с золотыми руками) Предлагаем вам каждому сдать свою пару обуви на ремонт.  Ждём фотоотчет',
            'image' => 'files/task/17/1XZhmM1264LMqKXclRuM0FVR5XcTuB1YalwE8vrP.jpeg',
            'priority' => 9,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Под стулом',
            'description' => 'Загляни под стульчик, там кое что есть для тебя...',
            'image' => 'files/task/17/6n9FKtjOerPnIggXlKnrbZhtwH3B7KCbhxBfOunF.jpeg',
            'priority' => 10,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Кореш шерлока',
            'description' => 'Сделайте селфи с его лучшим другом',
            'image' => 'files/task/17/oeFXmXyx6Duew27gs27A0X8F8E82DZXJUNDoMgwq.jpeg',
            'priority' => 11,
            'lon' => '35.110415',
            'lat' => '47.846787'
        ]);

        Task::create([
            'title' => 'Wood',
            'description' => 'Тебя кое что  ждёт внутри этого дерева)',
            'image' => 'files/task/17/NHNM4IGfqnVibpfmoCNIp6hIcb5Ty8ala0bTnIEn.jpeg',
            'priority' => 12,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Iron Bird',
            'description' => 'Вы должны сделать общее селфи с железной птицей.',
            'image' => 'files/task/17/MgBM8SSkczdKfSPtuHMbnYckmwaUmBIh20W0QCXv.jpeg',
            'priority' => 13,
            'lon' => '35.110232',
            'lat' => '47.845833'
        ]);

        Task::create([
            'title' => 'Ребус',
            'description' => 'Будьте внимательны, в этих колонках сокрыто слово которое вам нужно собрать из пропущенных букв и отправить нам ответ.',
            'image' => 'files/task/17/ceE35TGKM8Ei09WZZjtw10WD4pyS41uZW1mDeMYk.jpeg',
            'priority' => 14,
            'lon' => '',
            'lat' => ''
        ]);

        Task::create([
            'title' => 'Зэ энд',
            'description' => 'А теперь все дружно идем на точку, которая отмечена на карте! Мы ждем вас)',
            'image' => '',
            'priority' => 15,
            'lon' => '',
            'lat' => ''
        ]);
    }
}
