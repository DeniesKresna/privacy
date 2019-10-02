<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([[
            'name' => 'SMA Kristen Petra 1',
            'code' => 'smapetra1',
            'email' => 'sma1@pppkpetra.or.id',
            'role' => 'admin',
            'gender' => 'L',
            'password' => bcrypt('1234lingkardalam'),
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]]);

        DB::table('years')->insert([
            'year_name' => '2019/2020',
            'year_isActive' => 'y',
            'year_created_by' => 1,
            'year_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);

        DB::table('levels')->insert([[
            'level_name'=> 'X IPA',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'level_name'=> 'X IPS',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'level_name'=> 'XI IPA',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'level_name'=> 'XI IPS',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'level_name'=> 'XII IPA',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'level_name'=> 'XII IPS',
            'level_created_by'=>1,
            'level_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ]
        ]);

        DB::table('classrooms')->insert([
            [
            'class_name' => 'X IPA 1',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 1,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 2',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 2,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 3',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 3,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 4',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 4,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 5',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 5,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 6',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 6,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPA 7',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 7,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPS 1',
            'year_id' => 1,
            'level_id' => 1,
            'class_sort' => 8,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPS 2',
            'year_id' => 1,
            'level_id' => 2,
            'class_sort' => 9,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPS 3',
            'year_id' => 1,
            'level_id' => 2,
            'class_sort' => 10,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPS 4',
            'year_id' => 1,
            'level_id' => 2,
            'class_sort' => 11,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'X IPS 5',
            'year_id' => 1,
            'level_id' => 2,
            'class_sort' => 12,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 1',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 13,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 2',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 14,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 3',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 15,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 4',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 16,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 5',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 17,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 6',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 18,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPA 7',
            'year_id' => 1,
            'level_id' => 3,
            'class_sort' => 19,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPS 1',
            'year_id' => 1,
            'level_id' => 4,
            'class_sort' => 20,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPS 2',
            'year_id' => 1,
            'level_id' => 4,
            'class_sort' => 21,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPS 3',
            'year_id' => 1,
            'level_id' => 4,
            'class_sort' => 22,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPS 4',
            'year_id' => 1,
            'level_id' => 4,
            'class_sort' => 23,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XI IPS 5',
            'year_id' => 1,
            'level_id' => 4,
            'class_sort' => 24,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 1',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 25,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 2',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 26,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 3',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 27,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 4',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 28,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 5',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 29,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 6',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 30,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPA 7',
            'year_id' => 1,
            'level_id' => 5,
            'class_sort' => 31,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPS 1',
            'year_id' => 1,
            'level_id' => 6,
            'class_sort' => 32,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPS 2',
            'year_id' => 1,
            'level_id' => 6,
            'class_sort' => 33,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPS 3',
            'year_id' => 1,
            'level_id' => 6,
            'class_sort' => 34,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'class_name' => 'XII IPS 4',
            'year_id' => 1,
            'level_id' => 6,
            'class_sort' => 35,
            'class_created_by' => 1,
            'class_updated_by' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);

        DB::table('subjects')->insert([
            [
            'subject_name' => 'Akuntansi',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 1,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Bahasa Inggris',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 2,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Bahasa Indonesia',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 3,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Bahasa Mandarin',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 4,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Biologi',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 5,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Bahasa Jawa',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 6,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Ekonomi',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 7,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Geografi',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 8,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Fisika',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 9,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Kimia',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 10,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Matematika',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 11,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Matematika Minat',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 12,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Matematika Lintas Minat',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 13,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Olahraga',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 14,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Pendidikan Agama Kristen',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 15,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'PPKN',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 16,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Seni Budaya',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 17,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Sastra Inggris',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 18,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Sejarah',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 19,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Sejarah Indonesia',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 20,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Sosiologi',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 21,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ],
            [
            'subject_name' => 'Teknologi Pengolahan',
            'subject_created_by' => 1,
            'subject_updated_by' => 1,
            'subject_sort' => 22,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
            ]
        ]);
/*
        DB::table('posts')->insert([
            'post_title'=>'Pulang sekolah hari Senin 29 Juli 19',
            'post_content'=>'Pulang pukul 16.00 karena ada acara upacara bendera dadakan.',
            'post_created_by'=>1,
            'post_isActive'=>'y',
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ]);*/

        DB::table('bills')->insert([[
            'bill_subject_id'=> 1,
            'bill_level_id'=> 1,
            'bill_kd'=> 1,
            'bill_created_by'=>1,
            'bill_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'bill_subject_id'=> 1,
            'bill_level_id'=> 1,
            'bill_kd'=> 2,
            'bill_created_by'=>1,
            'bill_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'bill_subject_id'=> 1,
            'bill_level_id'=> 1,
            'bill_kd'=> 3,
            'bill_created_by'=>1,
            'bill_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'bill_subject_id'=> 1,
            'bill_level_id'=> 1,
            'bill_kd'=> 4,
            'bill_created_by'=>1,
            'bill_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ],[
            'bill_subject_id'=> 1,
            'bill_level_id'=> 1,
            'bill_kd'=> 5,
            'bill_created_by'=>1,
            'bill_updated_by'=>1,
            'created_at'=>'2019-07-29 13:00:00',
            'updated_at'=>'2019-07-29 13:00:00'
        ]
        ]);
    }
}
