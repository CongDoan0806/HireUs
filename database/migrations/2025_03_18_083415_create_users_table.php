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
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('password', 60);
            $table->string('email', 100)->unique();
            $table->string('full_name', 100);
            $table->string('phone', 20)->nullable();
            $table->date('date_of_birth')->nullable();
            $table->enum('gender', ['male', 'female', 'other'])->nullable();
            $table->string('image', 100)->nullable();
            $table->enum('role', ['recruiter', 'applicant', 'admin']);
            $table->enum('status', ['active', 'inactive'])->default('active');

            $table->string('verification_code', 4)->nullable();  
            $table->timestamp('sent_at')->nullable();  
            $table->boolean('is_verified')->default(false);  

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
        Schema::dropIfExists('users');
    }
};
