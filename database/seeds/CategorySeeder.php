<?php

use Illuminate\Database\Seeder;
use App\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = ['Feedbacks', 'Interviews', 'Strumentals', 'Live Stages', 'Live Reportage', 'Others'];

        foreach ($categories as $category) {
            $addCategory = new Category();
            $addCategory->name = $category;
            $addCategory->slug = Str::slug($addCategory->name);
            $addCategory->save();
        }
    }
}
