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
        Schema::create('bolpatras', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('pdf');
            $table->string('image');
            $table->string('desc');
            $table->date('start_date');
            $table->date('ending_date');
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
        Schema::dropIfExists('bolpatras');
    }
};
