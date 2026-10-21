<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Admin user
        User::updateOrCreate(
            ['email' => 'admin@dailypack.com'],
            [
                'name' => 'Admin',
                'password' => Hash::make('admin123'),
            ]
        );

        $categoriesData = [
            [
                'name' => 'Plastic Food Packaging Containers',
                'icon' => '📦',
                'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
                'description' => 'Microwavable, leak-proof, food-grade clear & black plastic containers.',
                'products' => [
                    [
                        'name' => '500ml Round Clear Container with Lid',
                        'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹4.50 - ₹7.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Food Grade Polypropylene (PP)',
                        'capacity' => '500 ml',
                        'features' => 'Microwave Safe, Leak-proof Seal, Stackable',
                        'description' => 'Heavy duty 500ml round plastic takeaway container with snap lock lid.'
                    ],
                    [
                        'name' => '750ml Rectangular Black Meal Box',
                        'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹6.50 - ₹9.50 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'PP Polypropylene',
                        'capacity' => '750 ml',
                        'features' => 'Premium Black Finish, Reusable, Airtight Lid',
                        'description' => 'High quality black rectangular meal container ideal for cloud kitchens & restaurants.'
                    ],
                    [
                        'name' => '1000ml Heavy Duty Container with Clear Lid',
                        'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹8.00 - ₹12.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Food Grade PP',
                        'capacity' => '1000 ml',
                        'features' => 'Freezer Safe, High Heat Resistant, Spill-Proof',
                        'description' => 'Large capacity container for gravies, biryani, and family portion meals.'
                    ]
                ]
            ],
            [
                'name' => 'Paper Food Packaging Containers',
                'icon' => '📄',
                'image' => 'https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=600&q=80',
                'description' => 'Eco-friendly kraft and white paper bowls with PE/PLA lining for hot and cold foods.',
                'products' => [
                    [
                        'name' => '500ml Kraft Paper Soup Bowl',
                        'image' => 'https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹5.50 - ₹8.50 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'Kraft Paper + PE Coating',
                        'capacity' => '500 ml',
                        'features' => '100% Recyclable, Grease-Resistant, Leak-Proof',
                        'description' => 'Natural brown kraft paper bowl for soup, noodles, ice cream, and salad.'
                    ],
                    [
                        'name' => '750ml White Paper Bowl with Dome Lid',
                        'image' => 'https://images.unsplash.com/photo-1563379091339-03b21ab4a4f8?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹7.00 - ₹10.50 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'Food Grade Paperboard',
                        'capacity' => '750 ml',
                        'features' => 'Oil Proof, Custom Brand Printable, PET Lid Included',
                        'description' => 'Elegant white paper bowl with transparent dome lid for curry, gravies and salads.'
                    ]
                ]
            ],
            [
                'name' => 'Meal Trays',
                'icon' => '🍱',
                'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80',
                'description' => 'Multi-compartment plastic and sugarcane meal trays for thali and combo boxes.',
                'products' => [
                    [
                        'name' => '4 Compartment Meal Tray with Lid',
                        'image' => 'https://images.unsplash.com/photo-1546069901-ba9599a7e63c?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹9.00 - ₹14.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Microwavable PP Plastic',
                        'capacity' => '4 Section Thali',
                        'features' => 'Separate Compartments, Anti-Spill Tight Lid',
                        'description' => '4 Compartment Bento Thali Tray perfect for Executive Meal combos.'
                    ],
                    [
                        'name' => '5 Compartment Heavy Duty Combo Tray',
                        'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹11.00 - ₹16.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Premium Black PP',
                        'capacity' => '5 Section Thali',
                        'features' => 'Deep Wells, Microwave Safe, Premium Look',
                        'description' => '5 Compartment Deluxe Meal Tray for South Indian Thali, North Indian Thali.'
                    ]
                ]
            ],
            [
                'name' => 'Cake & Brownie Box',
                'icon' => '🎂',
                'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80',
                'description' => 'Window and non-window sturdy paperboard boxes for cakes, pastries & brownies.',
                'products' => [
                    [
                        'name' => '1/2 Kg Transparent Window Cake Box',
                        'image' => 'https://images.unsplash.com/photo-1578985545062-69928b1d9587?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹12.00 - ₹18.00 / pc',
                        'moq' => '250 Pcs',
                        'material' => 'Food Grade White Duplex Board',
                        'capacity' => '0.5 Kg / 6x6x5 Inch',
                        'features' => 'Clear Top Window, Sturdy Handle, Easy Fold',
                        'description' => 'Clear window display box designed to protect and highlight beautiful cake creations.'
                    ],
                    [
                        'name' => '6 Piece Brownie & Donut Box',
                        'image' => 'https://images.unsplash.com/photo-1551024709-8f23befc6f87?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹8.50 - ₹14.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Kraft Paper Board',
                        'capacity' => '6 Cavity Brownies',
                        'features' => 'Custom Branding Ready, Sturdy Locking Flaps',
                        'description' => 'Compact bakery gift packaging box with partition insert options.'
                    ]
                ]
            ],
            [
                'name' => 'Pizza Box',
                'icon' => '🍕',
                'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80',
                'description' => 'Corrugated B-flute thermal retention pizza boxes available in 7, 9, 10, 12, 14 inch sizes.',
                'products' => [
                    [
                        'name' => '9 Inch Medium Corrugated Pizza Box',
                        'image' => 'https://images.unsplash.com/photo-1513104890138-7c749659a591?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹7.50 - ₹11.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => '3-Ply E-Flute Corrugated Board',
                        'capacity' => '9 Inch Medium Pizza',
                        'features' => 'Steam Vent Holes, Heat Retaining, High Crush Strength',
                        'description' => 'Heavy duty pizza box keeps pizza hot and crispy during delivery.'
                    ],
                    [
                        'name' => '12 Inch Large Printed Pizza Box',
                        'image' => 'https://images.unsplash.com/photo-1565299624946-b28f40a0ae38?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹11.00 - ₹16.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Kraft Corrugated Paperboard',
                        'capacity' => '12 Inch Large Pizza',
                        'features' => 'Custom Logo Print, Grease Resistant Internal Wall',
                        'description' => 'Vibrant printed pizza box engineered for long distance home delivery.'
                    ]
                ]
            ],
            [
                'name' => 'Paper Lunch Box',
                'icon' => '🥪',
                'image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=600&q=80',
                'description' => 'Foldable bio paper lunch boxes with built-in lid for fast food & takeout.',
                'products' => [
                    [
                        'name' => 'Size 1 Kraft Foldable Paper Lunch Box',
                        'image' => 'https://images.unsplash.com/photo-1540420773420-3366772f4999?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹4.80 - ₹7.20 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'Kraft Virgin Paper + PE Coating',
                        'capacity' => '800 ml',
                        'features' => 'Leak-Proof Corners, Top Interlocking Tabs',
                        'description' => 'Single-piece leak proof paper lunch box for noodles, fried rice, burgers, and snacks.'
                    ]
                ]
            ],
            [
                'name' => 'Sugarcane plates, containers,bowls,meal trays',
                'icon' => '🌱',
                'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
                'description' => '100% Bagasse sugarcane fiber compostable tableware, containers and bowls.',
                'products' => [
                    [
                        'name' => '10 Inch 3-Compartment Sugarcane Plate',
                        'image' => 'https://images.unsplash.com/photo-1584308666744-24d5c474f2ae?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹3.50 - ₹5.80 / pc',
                        'moq' => '1000 Pcs',
                        'material' => '100% Natural Sugarcane Bagasse',
                        'capacity' => '10 Inch Round Plate',
                        'features' => '100% Biodegradable, Microwave & Freezer Safe, Water & Oil Proof',
                        'description' => 'Eco-friendly sugarcane bagasse plate suitable for hot gravies & catered events.'
                    ],
                    [
                        'name' => '500ml Round Sugarcane Bagasse Bowl with Lid',
                        'image' => 'https://images.unsplash.com/photo-1572449043416-55f4685c9bb7?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹4.50 - ₹7.00 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'Sugarcane Pulp Fiber',
                        'capacity' => '500 ml Bowl',
                        'features' => 'Compostable in 90 Days, Heavy Duty Rigid Wall',
                        'description' => 'Zero-plastic eco bowl for soups, curries, desserts and salads.'
                    ]
                ]
            ],
            [
                'name' => 'Hot Coffee Cups',
                'icon' => '☕',
                'image' => 'https://images.unsplash.com/photo-1517256064527-09c73fc73e38?auto=format&fit=crop&w=600&q=80',
                'description' => 'Single wall & double wall ripple paper cups for hot beverages with sip lids.',
                'products' => [
                    [
                        'name' => '250ml Ripple Wall Kraft Coffee Cup',
                        'image' => 'https://images.unsplash.com/photo-1517256064527-09c73fc73e38?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹2.80 - ₹4.50 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'Triple Wall Insulated Paper',
                        'capacity' => '250 ml / 8 oz',
                        'features' => 'No Cup Sleeve Needed, Heat Insulated, Spill Proof Lid',
                        'description' => 'Textured ripple wall cup prevents burning hands while serving hot tea, coffee or cappuccino.'
                    ]
                ]
            ],
            [
                'name' => 'Cold Coffee Glass and Sipper',
                'icon' => '🥤',
                'image' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=600&q=80',
                'description' => 'Ultra clear PET & PP glasses with dome, flat and strawless sipper lids.',
                'products' => [
                    [
                        'name' => '350ml Clear PET Cold Glass with Sipper Lid',
                        'image' => 'https://images.unsplash.com/photo-1517701604599-bb29b565090c?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹3.20 - ₹5.50 / pc',
                        'moq' => '1000 Pcs',
                        'material' => 'High Clarity Crystal PET',
                        'capacity' => '350 ml / 12 oz',
                        'features' => 'Crystal Clear Display, Strawless Sipper Lid, Leak Proof Rim',
                        'description' => 'Clear beverage cup ideal for cold coffee, boba tea, thick shakes & smoothies.'
                    ]
                ]
            ],
            [
                'name' => 'PET Bottle and Jars',
                'icon' => '🧴',
                'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=600&q=80',
                'description' => 'Food grade PET bottles and wide mouth transparent storage jars with screw caps.',
                'products' => [
                    [
                        'name' => '300ml Square PET Juice Bottle with Black Cap',
                        'image' => 'https://images.unsplash.com/photo-1602143407151-7111542de6e8?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹5.00 - ₹8.00 / pc',
                        'moq' => '500 Pcs',
                        'material' => 'Virgin PET Plastic',
                        'capacity' => '300 ml',
                        'features' => 'Tamper Evident Cap, High Clarity, Food Grade certified',
                        'description' => 'French square clear PET bottle for cold pressed juices, milkshakes and cold brew.'
                    ]
                ]
            ],
            [
                'name' => 'Glass Bottle and Jars',
                'icon' => '🫙',
                'image' => 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&w=600&q=80',
                'description' => 'Premium thick flint glass bottles & airtight lug cap jars for milk, sauces & jams.',
                'products' => [
                    [
                        'name' => '200ml Glass Matka Jar with Golden Lug Cap',
                        'image' => 'https://images.unsplash.com/photo-1589301760014-d929f3979dbc?auto=format&fit=crop&w=600&q=80',
                        'price_range' => '₹12.00 - ₹18.00 / pc',
                        'moq' => '300 Pcs',
                        'material' => 'Food Grade Flint Glass',
                        'capacity' => '200 ml',
                        'features' => 'Air-tight Golden Metal Lid, Dishwasher Safe, Reusable',
                        'description' => 'Aesthetic glass matka jar for honey, spices, ghee, puddings, desserts and dry fruits.'
                    ]
                ]
            ]
        ];

        foreach ($categoriesData as $catData) {
            $category = Category::updateOrCreate(
                ['slug' => Str::slug($catData['name'])],
                [
                    'name' => $catData['name'],
                    'icon' => $catData['icon'],
                    'image' => $catData['image'],
                    'description' => $catData['description'],
                ]
            );

            foreach ($catData['products'] as $prodData) {
                Product::updateOrCreate(
                    [
                        'category_id' => $category->id,
                        'name' => $prodData['name']
                    ],
                    [
                        'slug' => Str::slug($prodData['name']),
                        'image' => $prodData['image'],
                        'price_range' => $prodData['price_range'],
                        'moq' => $prodData['moq'],
                        'material' => $prodData['material'],
                        'capacity' => $prodData['capacity'],
                        'features' => $prodData['features'],
                        'description' => $prodData['description'],
                        'is_featured' => true
                    ]
                );
            }
        }
    }
}
