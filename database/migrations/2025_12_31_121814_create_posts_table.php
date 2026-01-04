<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();

            $table->string('title');

            $table->foreignId('author')
                ->constrained('users', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->longText('content');

            $table->foreignId('category')
                ->nullable()
                ->constrained('categories', 'id')
                ->onUpdate('cascade')
                ->onDelete('cascade');

            $table->json('tags')->nullable();

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
};
