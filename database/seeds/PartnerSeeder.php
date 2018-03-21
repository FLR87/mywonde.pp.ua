<?php
use App\Partner;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            [
                'img_path' => '/images/client-logos/logo1.png',
                'link' => 'google.com',
            ],
            [
                'img_path' => '/images/client-logos/logo2.png',
                'link' => 'google.com',
            ],
            [
                'img_path' => '/images/client-logos/logo3.png',
                'link' => 'google.com',
            ],
            [
                'img_path' => '/images/client-logos/logo4.png',
                'link' => 'google.com',
            ],
            [
                'img_path' => '/images/client-logos/logo5.png',
                'link' => 'google.com',
            ]
        ];


        Partner::insert($data);
//        DB::table('partners')->insert([$data]);
//        'created_at' => Carbon::now()->format('Y-m-d H:i:s')
//        DB::table('partners')->insert([ 'img_path' => 'Footer', 'link' => 'google.com', 'created_at' => date("Y-m-d H:i:s") ]);

//        ]);
    }
}