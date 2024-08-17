<?php

namespace Database\Seeders;

use App\Models\Activity;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ActivitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Activity::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['activity_type' => 'Student Bussines Corner', 'labs_id' => 1, 'description' => 'Menjual Produk Ditempat'],
            ['activity_type' => 'Konsultasi', 'labs_id' => 1, 'description' => 'Melakukan Konsultasi'],
            ['activity_type' => 'Sertifikat Halal', 'labs_id' => 2, 'description' => 'Melakukan Pembuatan Sertifikat Halal'],
            ['activity_type' => 'NIB', 'labs_id' => 2, 'description' => 'Melakukan Pembuatan NIB'],
            ['activity_type' => 'Pelatihan', 'labs_id' => 3, 'description' => 'Melakukan Pelatihan'],
        ];

        foreach ($data as $value) {
            Activity::insert([
                'activity_type' => $value['activity_type'],
                'labs_id' => $value['labs_id'],
                'description' => $value['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
