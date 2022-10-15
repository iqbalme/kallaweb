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
		Schema::dropIfExists('posts');
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
			$table->foreignId('user_id')->constrained();
			$table->string('judul', 100);
			$table->string('thumbnail')->nullable();
			$table->longText('konten')->nullable();
			$table->foreignId('category_id')->constrained();
			$table->foreignId('tag_id')->constrained();
			$table->foreignId('prodi_id')->nullable()->constrained(); //jika null maka berlaku umum
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
