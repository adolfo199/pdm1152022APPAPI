<?php

use App\Models\Exercises;
use App\Models\Routine;
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
        Schema::create('routine_exercises', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Routine::class);
            $table->foreignIdFor(Exercises::class);
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
        Schema::dropIfExists('routine_exercises');
    }
};