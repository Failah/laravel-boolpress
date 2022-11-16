<?php

use Illuminate\Database\Seeder;
use App\Tag;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $tags = ['Trap', 'K-Pop', 'Metal', 'Rock', 'Punk', 'Indie', 'Rap', 'Pop', 'Jazz', 'Classic', 'Blues', 'Country', 'Ambient', 'House', 'Other'];

        foreach ($tags as $model) {
            $tag = new Tag();
            $tag->name = $model;
            $tag->slug = Str::slug($model);
            $tag->save();
        }
    }
}
