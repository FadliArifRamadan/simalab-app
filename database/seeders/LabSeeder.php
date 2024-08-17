<?php

namespace Database\Seeders;

use App\Models\Lab;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Lab::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            ['lab_name' => 'Laboratorium Kewiraushaan', 'description' => 'Penambahan Lab Kewirausahaan'],
            ['lab_name' => 'Laboratorium Halal Center', 'description' => 'Penambahan Lab Halal Center'],
            ['lab_name' => 'Laboratorium Programming', 'description' => 'Penambahan Lab Programming'],
        ];

        foreach ($data as $value) {
            Lab::insert([
                'lab_name' => $value['lab_name'],
                'description' => $value['description'],
                'created_at' => Carbon::now(),
                'updated_at' => Carbon::now()
            ]);
        }
    }
}
