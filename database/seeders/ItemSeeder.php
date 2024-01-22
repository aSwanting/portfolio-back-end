<?php

namespace Database\Seeders;

use App\Models\Item;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Models\Tag;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker): void
    {
        for ($i = 0; $i < 50; $i++) {
            $new_item = new Item();
            $new_item->name = $faker->sentence(rand(2, 5));
            $new_item->slug = Str::slug($new_item->name);
            $new_item->description = $faker->text(250);
            $new_item->category_id = Category::all()->random()->id;
            $new_item->save();
            $new_item->tags()->attach(Tag::all()->random(mt_rand(0, Tag::count())));
        }
    }
}
