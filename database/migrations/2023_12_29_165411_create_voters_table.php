<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('voters', function (Blueprint $table) {
            $table->id();
            $table->string('voter_no', 255)->nullable();
            $table->string('name',255)->nullable()->default(null);
            $table->string('upazilla',255)->nullable()->default(null);
            $table->string('union',255)->nullable()->default(null);
            $table->string('father_name',255)->nullable()->default(null);
            $table->string('mother_name',255)->nullable()->default(null);
            $table->string('date_of_birth')->nullable()->default(null);
            $table->string('profession',255)->nullable()->default(null);
            $table->text('address')->nullable()->default(null);
            $table->text('gender')->nullable()->default(null);
            $table->text('vote_center')->nullable()->default(null);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('voters');
    }
};
