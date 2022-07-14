<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $currentTime = Carbon::now('Europe/Moscow');
      DB::table('pizzas')->insert([
        [
				'name' => 'Ветчина и грибы',
				'price'  => '500',
				'img'  => URL('images/mashrooms.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],
        [
				'name' => 'Ветчина и сыр',
				'price'  => '550',
				'img'  => URL('images/ham-cheese.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Гавайская',
				'price'  => '400',
				'img'  => URL('images/hawaiian.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Двойная пепперони',
				'price'  => '450',
				'img'  => URL('images/double-pepperoni.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Диабло',
				'price'  => '470',
				'img'  => URL('images/diablo.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Колбаски-барбеккю',
				'price'  => '520',
				'img'  => URL('images/barbecue-sausages.jpeg'),
        'available' => false,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Мясная',
				'price'  => '600',
				'img'  => URL('images/meat.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Овощи и грибы',
				'price'  => '400',
				'img'  => URL('images/vegetables-mushrooms.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Пепперони',
				'price'  => '450',
				'img'  => URL('images/pepperoni.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Супермясная',
				'price'  => '700',
				'img'  => URL('images/super-meat.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Сырный цыпленок',
				'price'  => '620',
				'img'  => URL('images/cheese-chicken.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Цыпленок барбеккю',
				'price'  => '550',
				'img'  => URL('images/barbecue-chicken.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Цыпленок ранч',
				'price'  => '450',
				'img'  => URL('images/chicken-ranch.jpeg'),
        'available' => false,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Четыре сезона',
				'price'  => '600',
				'img'  => URL('images/four-seasons.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],[
				'name' => 'Чизбургер-пицца',
				'price'  => '500',
				'img'  => URL('images/cheeseburger-pizza.jpeg'),
        'available' => true,
        'created_at' => $currentTime,
        'updated_at' => $currentTime
        ],
			]);
    }
}
