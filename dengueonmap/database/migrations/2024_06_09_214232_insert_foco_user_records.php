<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        DB::table('foco_user')->insert([
            ['user_id' => 1, 'foco_id' => 8],
            ['user_id' => 1, 'foco_id' => 9],
            ['user_id' => 1, 'foco_id' => 10],
            ['user_id' => 1, 'foco_id' => 11],
            ['user_id' => 2, 'foco_id' => 12],
        ]);
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::table('foco_user')->where('user_id', 1)->whereIn('foco_id', [8, 9, 10, 11])->delete();
        DB::table('foco_user')->where('user_id', 2)->where('foco_id', 12)->delete();
    }
};
