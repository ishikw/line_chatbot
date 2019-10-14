<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(users::class);
        $this->call(BotTemplateTableSeeder::class);
        $this->call(StoreTableSeeder::class);
        //ここから下のSeederはStoreが必須
        $this->call(BotTableSeeder::class);
        $this->call(EventTableSeeder::class);
        $this->call(BadgetTableSeeder::class);
    }
}
