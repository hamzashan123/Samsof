<?php

use Illuminate\Database\Seeder;
use Faker\Factory;
use Intervention\Image\ImageManager;
use App\Photo;

class PhotosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();

        $imageManager = new ImageManager([
            'driver' => 'imagick'
        ]);

        factory(Photo::class, 20)->create()->each(function ($photo) use ($faker, $imageManager) {
            $path = $this->getPhotoImagesDirectory($photo);
            if (!file_exists($path . $photo->id . '.jpg')) {
                $image = $faker->image(storage_path('app/images/photos'), 1000, 800);
                rename($image, $path . $photo->id . '.jpg');
            }
        });
    }

    protected function getPhotoImagesDirectory(Photo $photo)
    {
        if (!file_exists($path = storage_path('app/images/photos/'))) {
            mkdir($path);
        }

        return $path;
    }
}
