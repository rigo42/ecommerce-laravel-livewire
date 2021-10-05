<?php

namespace Database\Factories;

use App\Models\Image;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ImageFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Image::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $filepath = storage_path('app/public/images');

        if(!File::exists($filepath)){
            File::makeDirectory($filepath);
        }
        
        $width = random_int(700, 900);
        $heigth = random_int(300, 640);

        return [
            'url' => $this->faker->imageUrl($width, $heigth, 'sports'),
        ];

        //abstract, animals, business, cats, city, food, nightlife, fashion, people, nature, sports, technics, transport
    }
}
