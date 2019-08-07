<?php

use Illuminate\Database\Seeder;
use App\Store;
use App\Event;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $stores = Store::all();
        foreach($stores as $store){
            $event = $this->createEvent($store->id);
        }
    }
    public function createEvent($store_id){
        $faker = Faker\Factory::create("ja_JP");

        $attributes = [
            // 'id' => $id,
            'store_id' => $store_id,
            'name' => $faker->word,
            'date_from' => $faker->dateTime,
            'date_to' => $faker->dateTime,
            'content' => $faker->sentence(10)	,
            'image_path' => $faker->imageUrl,
        ];

        return Event::firstOrCreate($attributes);
    }
}
