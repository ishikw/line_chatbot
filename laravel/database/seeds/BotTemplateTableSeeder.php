<?php

use Illuminate\Database\Seeder;
use App\BotTemplate;
class BotTemplateTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 1; $i <= 10; $i++) {
            $store = $this->createBotTemplate($i);
        }
    }
    public function createBotTemplate($id){
        $faker = Faker\Factory::create("ja_JP");
        $word = $faker->text;
        $attributes = [
            // 'id' => $id,
            'name' => $faker->word,
            'azure_url' => $faker->url,
            'image_url' => $faker->imageUrl,
            'type' => $faker->boolean,
            'is_open' => $faker->boolean,
        ];

        $store = BotTemplate::firstOrCreate($attributes);
        // $this->call(StoreTableSeeder::class,$store);
    }
}
