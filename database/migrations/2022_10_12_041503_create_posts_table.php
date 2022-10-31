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
			$table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
			$table->string('judul', 150);
			$table->string('thumbnail')->nullable();
			$table->longText('konten')->nullable();
			$table->string('category_id')->nullable();
			$table->string('tag_id')->nullable();
			$table->string('prodi_id')->nullable(); // menampung array, jika null maka berlaku umum
			$table->enum('status_post', ['draft', 'published'])->default('draft');
			$table->string('slug', 100)->unique();
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
