<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->string('periode_wisuda')->nullable()->after('fakultas');
            $table->string('tahun_wisuda')->nullable()->after('periode_wisuda');
            $table->string('no_hp')->nullable()->after('tahun_wisuda');
            $table->string('facebook')->nullable()->after('no_hp');
            $table->string('instagram')->nullable()->after('facebook');
            $table->string('tiktok')->nullable()->after('instagram');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('alumnis', function (Blueprint $table) {
            $table->dropColumn([
                'periode_wisuda',
                'tahun_wisuda',
                'no_hp',
                'facebook',
                'instagram',
                'tiktok',
            ]);
        });
    }
};
