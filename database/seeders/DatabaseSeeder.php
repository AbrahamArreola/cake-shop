<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([RoleSeeder::class]);

        if (env('APP_ENV') == 'local') {
            $directory = 'public/products';
            if (!Storage::has($directory)) {
                Storage::makeDirectory($directory);
            }

            User::factory(10)->create();
            Category::factory(6)->create();
            Product::factory(30)->create();
        }
    }
}
