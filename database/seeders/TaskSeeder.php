<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TaskSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // 一件だけinsertする
        DB::table('tasks')->insert([
            'title' => 'kekka',
            'body' => 'honnbunn3',
        ]);

        # paramに配列を代入

        $param = [
            [
                'title' => 'kekka',
                'body' => 'honnbunn3',
            ],
            [
                'title' => 'kekka',
                'body' => 'honnbunn3',
            ]
        ];
        # DB::table->insertでレコードの登録
        DB::table('tasks')->insert($param);
    }
}
