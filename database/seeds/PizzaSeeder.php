<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use App\Supports\CategorySupport;

class PizzaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pizzas = [
            [
                'id' => 1,
                'name' => 'Cheese Pizza',
                'price' => 17.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/4670cea2-f854-4da8-9abc-1dfc194b3065-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 2,
                'name' => 'White Pizza',
                'price' => 18.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/2c981e76-9c15-4729-ab5e-c288d38f4bc0-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 3,
                'name' => 'White Pepperoni Pizza',
                'price' => 25.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/21224a10-34b5-4774-b081-2d50b47dee17-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 4,
                'name' => 'Planet Special Pizza',
                'price' => 25.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/6acb914a-6efe-4aae-b61f-b6163d70f6d5-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 5,
                'name' => 'BBQ Pizza',
                'price' => 25.50,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/5b874b25-351f-4133-83ee-fbbeda9595e0-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 6,
                'name' => 'Hawaiian Pizza',
                'price' => 30.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/33017346-ece7-4e84-b8da-d319dc82973c-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 7,
                'name' => 'Meat Lovers Pizza',
                'price' => 28.75,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/e76607fb-9824-4ecf-814c-ff0bef423b02-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 8,
                'name' => 'Chicken & Bacon Pizza',
                'price' => 17.50,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/dcca581a-2e53-4a5e-8ed1-2c385ab245e7-retina-large.jpg',
                'category_id' => CategorySupport::NON_VEGGIE
            ],
            [
                'id' => 9,
                'name' => 'Vegetarian Pizza',
                'price' => 25.00,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/af5bd22a-cdd3-4ec5-816d-a6be0e488cbe-retina-large.jpg',
                'category_id' => CategorySupport::VEGGIE
            ],
            [
                'id' => 10,
                'name' => 'Popeye Pizza',
                'price' => 24.90,
                'picture' => 'https://img.cdn4dd.com/cdn-cgi/image/fit=contain,width=300,format=auto,quality=50/https://cdn.doordash.com/media/photos/4c394c3e-b2cf-44f3-bab5-24b788cc1dd4-retina-large.jpg',
                'category_id' => CategorySupport::VEGGIE
            ],
        ];

        foreach ($pizzas as $pizza) {
            DB::table('pizzas')->insert([
                'id' => $pizza['id'],
                'name' => $pizza['name'],
                'description' => null,
                'price' => $pizza['price'],
                'picture' => $pizza['picture'],
                'category_id' => $pizza['category_id'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
