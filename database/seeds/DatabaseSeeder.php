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
        $this->call(UsersTableSeeder::class);
        $this->call(StaffTableSeeder::class);
        /* $this->call(CategoriesTableSeeder::class); */
        /* $this->call(PostsTableSeeder::class); */
        $this->call(EventsTableSeeder::class);
        /* $this->call(MediaTableSeeder::class); */
//        $this->call(ReleasesTableSeeder::class);
//        $this->call(CoveragesTableSeeder::class);
//        $this->call(OpinionsTableSeeder::class);
//        $this->call(PhotosTableSeeder::class);
//        $this->call(VideosTableSeeder::class);
//        $this->call(DocumentsTableSeeder::class);
//        $this->call(ProceduresTableSeeder::Class);
        $this->call(TestMembersSeeder::class);
//        $this->call(RealMembersSeeder::class);
    }
}
