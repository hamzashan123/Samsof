<?php

use Illuminate\Database\Seeder;
use App\Coverage;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class CoveragesTableSeeder extends Seeder
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

        factory(Coverage::class, 15)->create()->each(function ($coverage) use ($faker, $imageManager) {
            $path = $this->getCoverageImagesDirectory($coverage);
            if (!file_exists($path . '/cover.jpg')) {
                $image = $faker->image(storage_path('app/images/coverages'), 1000, 800);
                rename($image, $path . '/cover.jpg');
            }
        });
    }

    protected function getCoverageImagesDirectory(Coverage $coverage)
    {
        if (!file_exists($path = storage_path('app/images/coverages/' . $coverage->id))) {
            mkdir($path);
        }
        return $path;
    }
}
