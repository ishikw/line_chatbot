<?php

use Illuminate\Database\Seeder;
use App\Store;
use App\Bot;

class BotTableSeeder extends Seeder
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
            $bot = $this->createBot($store->id);
        }
    }
    public function createBot($store_id){
        $faker = Faker\Factory::create("ja_JP");

        $attributes = [
            // 'id' => $id,
            'store_id' => $store_id,
            'template_id' => $store_id,
            'name' => $faker->word,
            'qr_url' => $faker->imageUrl,
            'image_url' => $faker->imageUrl,
            'is_open' => $faker->boolean,
        ];

        $bot = Bot::firstOrCreate($attributes);
        // $this->call(StoreTableSeeder::class,$store);
    }
}
