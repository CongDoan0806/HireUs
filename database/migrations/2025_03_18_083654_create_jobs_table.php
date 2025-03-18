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
        Schema::create('jobs', function (Blueprint $table) {
            $table->id('job_id');
            $table->unsignedBigInteger('user_id')->nullable();
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('cascade');
            $table->string('job_title', 100);
            $table->unsignedBigInteger('job_type_id');
            $table->foreign('job_type_id')->references('job_type_id')->on('job_types')->onDelete('cascade');
            $table->enum('status', ['open', 'close']);
            $table->unsignedBigInteger('level_id');
            $table->foreign('level_id')->references('level_id')->on('levels')->onDelete('cascade');
            $table->text('job_description');
            $table->text('responsibilities');
            $table->text('requirements');
            $table->string('location', 100)->nullable();
            $table->text('job_benefit');
            $table->decimal('salary', 10, 2)->nullable();
            $table->timestamp('posted_date')->default(now());
            $table->date('deadline');
            $table->integer('required_candidates')->default(1)->check('required_candidates >= 0');
            $table->integer('total_applied')->default(0)->check('total_applied >= 0');
            $table->unsignedBigInteger('industry_id')->nullable();
            $table->foreign('industry_id')->references('industry_id')->on('industries')->onDelete('cascade');
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
        Schema::dropIfExists('jobs');
    }
};
