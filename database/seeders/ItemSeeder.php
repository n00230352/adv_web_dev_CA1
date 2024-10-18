<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use Carbon\Carbon;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $currentTimestamp = Carbon::now();
            Item::insert([
                ['item_name' => 'Vintage Denim Jacket', 'price' => 75.00, 'description' => 'This classic vintage denim jacket features a faded blue wash, giving it a well-loved look. It has a relaxed fit, perfect for layering, with two front pockets and a button-up closure. The jacket is made from 100% cotton, ensuring comfort and durability. Style it with a casual tee and your favorite sneakers for an effortless, trendy outfit. Ideal for all seasons, this jacket adds a timeless touch to any wardrobe.'],
                ['item_name' => 'Linen Maxi Dress', 'price' => 89.00, 'description' => ' Embrace effortless elegance with this flowy linen maxi dress. Available in a soft sage green, it features a sleeveless design and a flattering cinched waist that accentuates your silhouette. The dress has side pockets for added convenience and a delicate ruffle hem for a touch of femininity. Perfect for summer outings or beach vacations, it pairs beautifully with sandals or wedges. Made from lightweight, breathable linen, this dress keeps you cool and stylish all day long.'],
                ['item_name' => 'Chunky Knit Sweater', 'price' => 65.00, 'description' => 'Cozy up in this oversized chunky knit sweater, perfect for chilly days. Crafted from a soft acrylic blend, it features a relaxed fit with a high neckline and ribbed cuffs for extra warmth. The rich burgundy color adds a pop of warmth to your wardrobe, while the textured knit pattern adds visual interest. Pair it with skinny jeans and ankle boots for a laid-back, stylish look. Ideal for layering, this sweater is a must-have for your fall and winter collection.'],
                ['item_name' => 'Tailored Trousers', 'price' => 79.00, 'description' => 'Elevate your workwear with these sleek tailored trousers, designed for both comfort and style. Made from a lightweight, stretch fabric, they feature a mid-rise waist and a slim-fit silhouette that flatters all body types. The classic black color makes them versatile enough to pair with any blouse or sweater. With subtle side pockets and a hidden zipper closure, these trousers combine functionality with a polished look. Perfect for the office or a night out, they’re a staple for any modern wardrobe.'],
                ['item_name' => 'Floral Wrap Skirt', 'price' => 54.00, 'description' => 'Step into spring with this delightful floral wrap skirt, featuring a vibrant mix of colors and a feminine silhouette. Made from a lightweight cotton blend, it falls mid-calf and offers a flattering A-line shape. The adjustable tie closure allows for a customizable fit, while the breezy fabric ensures comfort on warmer days. Pair it with a simple tank top and sandals for a casual day out or dress it up with a blouse and heels for a night on the town. This skirt is perfect for adding a touch of whimsy to your wardrobe!'],
                ['item_name' => 'Classic White Button-Up Shirt', 'price' => 45.00, 'description' => 'A timeless wardrobe essential, this classic white button-up shirt is versatile and stylish. Crafted from a crisp cotton blend, it features a tailored fit with a slightly curved hem and buttoned cuffs. The shirt can be dressed up with slacks for the office or worn casually with jeans for a relaxed weekend look. With its clean lines and sophisticated appearance, it’s perfect for layering or wearing on its own. A staple piece that never goes out of style, this shirt will be a go-to in your closet for years to come!']
            ]);
    }
}
