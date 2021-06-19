<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class LinksSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $factory->define('App\Models\Link', function (Faker $faker) {
            return [
                'long_url' => $faker->url,
                'url_slug' => $faker->unique()->bothify('?????'),
                'temp_session_key' => time('hi'),
            ];
        });
        \DB::table('links')->insert($data);
    }
}
