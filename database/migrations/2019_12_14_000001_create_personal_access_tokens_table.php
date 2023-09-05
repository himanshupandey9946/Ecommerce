<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('personal_access_tokens', function (Blueprint $table) {
            $table->id();
            $table->morphs('tokenable');
            $table->string('name');
            $table->string('token', 64)->unique();
            $table->text('abilities')->nullable();
            $table->timestamp('last_used_at')->nullable();
            $table->timestamp('expires_at')->nullable();
            $table->timestamps();
        });
    }

    /* 
            $table->string('main_category_name');
            $table->string('main_category_img');
            $table->integer('is_active')->default(1);


              $table->string('category_name');
            $table->string('category_image');
            $table->integer('is_active')->default(1);
            $table->unsignedBigInteger('main_category_id')->nullable()->unsigned();;
            $table->foreign('main_category_id')->references('id')->on('main_categories')->onUpdate('cascade')->onDelete('cascade'); 
            
            
             $table->id();
            $table->unsignedBigInteger('main_category_id');
            $table->foreign('main_category_id')
                  ->references('id')
                  ->on('main_categories')
                  ->onUpdate('cascade')
                  ->onDelete('cascade'); 
            $table->string('category_name');
            $table->string('category_image');
            $table->integer('is_active')->default(1);
           //$table->unsignedBigInteger('main_category_id')->nullable();
            $table->timestamps();
    */

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('personal_access_tokens');
    }
};
