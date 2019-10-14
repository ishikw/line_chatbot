<?php

use Illuminate\Database\Seeder;
use App\Store;
class StoreTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $store = $this->createStore($i);
        }
    }
    public function createStore($id){
        $faker = Faker\Factory::create("ja_JP");
        $word = $faker->text;
        $attributes = [
            // 'id' => $id,
            'name' => $faker->name,
            'zip' => $faker->postcode,
            'address' => $faker->address,
            'phone' => $faker->phoneNumber,
            'email' => $faker->email,
        ];

        $store = Store::firstOrCreate($attributes);
        // $this->call(StoreTableSeeder::class,$store);
    }
}
