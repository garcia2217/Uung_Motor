<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Motorcycle;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        // USER
        User::create([
            'name' => 'garcia',
            'email' => 'garcia@gmail.com',
            'password' => bcrypt('kucing'),
        ]);
        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        // // USER

        // // BRAND
        Brand::create([
            'name' => 'Honda'
        ]);

        Brand::create([
            'name' => 'Yamaha'
        ]);

        Brand::create([
            'name' => 'Suzuki'
        ]);
        // BRAND

        // PRODUCT
        // HONDA
        Product::create([
            'name' => 'PCX',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-pcx160-400x300-tr-21112023-055149.png'
        ]);

        Product::create([
            'name' => 'Beat',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-beat-3-03062024-050824.png'
        ]);

        Product::create([
            'name' => 'Beat Street',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-product-beat-street-03062024-044327.png'
        ]);

        Product::create([
            'name' => 'Genio',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-acc-6-25072023-093811.png'
        ]);

        Product::create([
            'name' => 'Scoopy',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/ahm-chic-2023-variant-web-stylish-green-reverse-2-26102023-030159.png'
        ]);

        Product::create([
            'name' => 'Vario',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-vario160-400x300-tr-10012024-040039.png'
        ]);

        Product::create([
            'name' => 'ADV',
            'brand_id' => '1',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/ahm-explore-side-view-tough-mattebrown-03112023-074815.png'
        ]);

        // YAMAHA
        Product::create([
            'name' => 'XMAX',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/2023120909435736066O45589.png'
        ]);

        Product::create([
            'name' => 'NMAX',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/2023022109405058553S83237.png'
        ]);

        Product::create([
            'name' => 'Aerox',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/2023102519190474792T91675.png'
        ]);

        Product::create([
            'name' => 'Lexi',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/2024011218055599711U37222.png'
        ]);

        Product::create([
            'name' => 'Grand Filano',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/2024020213515057909K85687.png'
        ]);

        Product::create([
            'name' => 'Fazzio',
            'brand_id' => '2',
            'image_path' => 'https://www.yamaha-motor.co.id/uploads/products/featured_image/202402011808478613B49305.png'
        ]);

        // SUZUKI
        Product::create([
            'name' => 'Satria',
            'brand_id' => '3',
            'image_path' => 'https://www.suzukicdn.com/uploads/motorcycle/Satria1.webp'
        ]);

        Product::create([
            'name' => 'Nex Crossover',
            'brand_id' => '3',
            'image_path' => 'https://www.suzukicdn.com/uploads/motorcycle/NEX_CROSSOVER-thhmb.webp'
        ]);

        Product::create([
            'name' => 'Address Fi',
            'brand_id' => '3',
            'image_path' => 'https://www.suzukicdn.com/uploads/motorcycle/tamnail_adress1.webp'
        ]);

        Product::create([
            'name' => 'Address PLayful',
            'brand_id' => '3',
            'image_path' => 'https://www.suzukicdn.com/uploads/motorcycle/playful_thumb.webp'
        ]);
        // PRODUCT

        // MOTORCYCLE
        // PCX
        Motorcycle::create([
            'product_id' => '1',
            'name' => 'PCX 150',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-pcx160-400x300-tr-21112023-055149.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);

        Motorcycle::create([
            'product_id' => '1',
            'name' => 'PCX 155',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-pcx160-400x300-tr-21112023-055149.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);

        Motorcycle::create([
            'product_id' => '1',
            'name' => 'PCX 160',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-pcx160-400x300-tr-21112023-055149.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);

        Motorcycle::create([
            'product_id' => '2',
            'name' => 'Beat',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-beat-3-03062024-050824.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);
        Motorcycle::create([
            'product_id' => '2',
            'name' => 'Beat',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-beat-3-03062024-050824.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);
        Motorcycle::create([
            'product_id' => '3',
            'name' => 'Beat Street',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-product-beat-street-03062024-044327.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);
        Motorcycle::create([
            'product_id' => '3',
            'name' => 'Beat Street',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-product-beat-street-03062024-044327.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);
        Motorcycle::create([
            'product_id' => '3',
            'name' => 'Beat Street',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'https://ik.imagekit.io/zlt25mb52fx/ahmcdn/tr:q-90,f-auto/uploads/product/thumbnail/thumbnail-product-beat-street-03062024-044327.png',
            'link' => 'https://www.instagram.com/p/C8IogtuytuD/?igsh=MXdvdjI0NnRqNm53bw=='
        ]);
        Motorcycle::create([
            'product_id' => '1',
            'name' => 'PCX 150',
            'price' => 20000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'img/honda/pcx 2020.heic',
            'link' => 'https://www.instagram.com/p/C4jyfukvMcS/?igsh=cHRid2p1aHYxanZi'
        ]);
        Motorcycle::create([
            'product_id' => '6',
            'name' => 'Vario 160',
            'price' => 30000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'img/honda/vario 160 2022.webp',
            'link' => 'https://www.instagram.com/p/C4B_jfkyysH/?igsh=NWJycnRnMjg3ZXZh'
        ]);
        Motorcycle::create([
            'product_id' => '6',
            'name' => 'Vario 125',
            'price' => 50000000,
            'condition' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Sed amet illo voluptatem, impedit voluptate suscipit? Cupiditate earum aliquam, in molestiae officiis vel. Tenetur ducimus quae sapiente eaque? Ratione illo voluptas eos totam iure, inventore in veniam alias ea minima expedita soluta id saepe ut placeat facere dolor ab voluptatem modi?',
            'image_path' => 'img/honda/vario 125 2023.heic',
            'link' => 'https://www.instagram.com/p/C7xj-xXS1V3/?igsh=OGxpbnNzYzJ5OTc1'
        ]);
        // MOTORCYCLE
    }
}
