<?php

namespace Database\Seeders;
use DB;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
class ReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $users = DB::table('users')->get();
        // foreach($users as $usr)
        // {
        //      DB::table('reports')->insert([
        //     'test' => 'admin',
        //     'marks' => 'sameerdawani49@gmail.com',
        //     'remarks' => 'admin'
        //     'user_id' => $user->id
        // ]);
        // }
        $users = DB::table('users')->latest()->first();
        DB::table('reports')->insert([
            'test'=> Str::random(10),
            'marks' => rand(1,100),
            'remarks' => Str::random(10),
            'user_id' =>$users->id,
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]); 

    }
}
