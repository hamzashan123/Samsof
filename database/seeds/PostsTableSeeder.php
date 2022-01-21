<?php

use Illuminate\Database\Seeder;
use App\Post;
use Faker\Factory;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\ImageManager;

class PostsTableSeeder extends Seeder
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

        factory(Post::class, 20)->create()->each(function ($post) use ($faker, $imageManager) {
            $path = $this->getPostImagesDirectory($post);
            if (!file_exists($path . '/post.jpg')) {
                $image = $faker->image(storage_path('app/images/posts'), 1000, 800);
                rename($image, $path . '/post.jpg');
            }
        });
    }

    protected function getPostImagesDirectory(Post $post)
    {
        if (!file_exists($path = storage_path('app/images/posts/' . $post->id))) {
            mkdir($path);
        }

        return $path;
    }
}
