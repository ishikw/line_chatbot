<?php

use Illuminate\Database\Seeder;
use App\Store;
use App\Badget;

class BadgetTableSeeder extends Seeder
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
            $bot = $this->createBadget($store->id);
        }
    }
    public function createBadget($store_id){
        $faker = Faker\Factory::create("ja_JP");

        $attributes = [
            'store_id' => $store_id,
            'fee' => $faker->numberBetween(0,1000000),
            'date' => $faker->date
        ];

        $bot = Badget::firstOrCreate($attributes);
        // $this->call(StoreTableSeeder::class,$store);
    }
}
