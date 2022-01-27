<?php

use App\Comic;
use Faker\Provider\Lorem;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ComicTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $array_comics = config('comics');

        foreach ($array_comics as $comic) {
        
            $new_comic = new Comic();            
            $new_comic->slug = Str::slug($comic['title'], '-');
            $new_comic->description = 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Magnam doloremque unde voluptate, rem laborum ratione earum deleniti inventore explicabo accusamus dolor recusandae dicta.';
            $new_comic->image = $comic['thumb'];
            $new_comic->price = $comic['price'];
            $new_comic->series = $comic['series'];
            $new_comic->sale_date = $comic['sale_date'];
            $new_comic->type = $comic['type'];

            $new_comic->save();
        }
    }
}
 