<?php

namespace Database\Seeders;

use App\Models\Admin;
use App\Models\Attribute;
use App\Models\Category;
use App\Models\Color;
use App\Models\Delivery;
use App\Models\Product;
use App\Models\Settings;
use App\Models\Size;
use App\Models\Store;
use App\Models\StoreManager;
use App\Models\SubCategory;
use App\Models\SuperStoreManager;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Crypt;

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

        $admin = Admin::factory(1)->create();

        // $stores = 3;
        // $x = 1;
        // foreach (range(1, $stores) as $index) {
        //     $store = Store::factory(1)->has(StoreManager::factory()->count(3))->has(Delivery::factory()->count(10))->create(['admin_id' => 1,]);
        //     Category::factory(1)->create(['store_manager_id' => $x, 'store_id' => $x]);
        //     SubCategory::factory(1)->create(['store_manager_id' => $x,  'store_id' => $x, 'category_id' => $x]);
        //     $product = Product::factory(1)->hasAttached(Color::factory(1))->hasAttached(Size::factory(1))->create(['store_manager_id' => $x, 'admin_id' => 1,  'store_id' => $x, 'category_id' => $x, 'sub_category_id' => $x]);

        //     Attribute::factory(1)->create([
        //         'admin_id' => $x,
        //         'product_id' => $x,
        //         'store_id' => $x,
        //         'color_id' => $x,
        //         'size_id' => $x,
        //         'category_id' => $x,
        //         'sub_category_id' => $x,
        //     ]);

        //     $x = $x + 1;
        // }

        // Settings::factory(1)->create();

        // SuperStoreManager::factory(1000)->create([
        //         'admin_id' => 1,
        //     ]);








        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
