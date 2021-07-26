<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        $admin_user = new User();
        $admin_user->name = "Joel";
        $admin_user->email = "joeld.blanco@gmail.com";
        $admin_user->email_verified_at = "2021-05-23 02:22:47";
        $admin_user->password = Hash::make("Jdbl87199725780810");
        $admin_user->save();

        $role = new Role();
        $role->name = "guest";
        $role->guard_name = "web";

        $product = new Product();
        $product->name = "English Regular Program - Simple Plan";
        $product->slug = "english-regular-program-simple-plan";
        $product->description = "English Regular Program - Simple Plan";
        $product->sale_price = 79.92;
        $product->regular_price = 120;
        $product->image = "";
        $product->plan = "simple";

        $product = new Product();
        $product->name = "English Regular Program - Regular Plan";
        $product->slug = "english-regular-program-regular-plan";
        $product->description = "English Regular Program - Regular Plan";
        $product->sale_price = 119.88;
        $product->regular_price = 180;
        $product->image = "";
        $product->plan = "regular";

        $product = new Product();
        $product->name = "English Regular Program - Intensive Plan";
        $product->slug = "english-regular-program-intensive-plan";
        $product->description = "English Regular Program - Intensive Plan";
        $product->sale_price = 159.84;
        $product->regular_price = 240;
        $product->image = "";
        $product->plan = "intensivo";

    }
}
