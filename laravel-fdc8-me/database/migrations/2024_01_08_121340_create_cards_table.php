<?php

use App\Enums\CardStatus;
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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('photo');
            $table->string('price');
            $table->integer('qty');
            $table->integer('hp');
            $table->enum('status',['select','selected'])->default('select');
            $table->foreignId('superType_id')->constrained('super_types');
            $table->foreignId('subType_id')->constrained('sub_types');
            $table->foreignId('type_id')->constrained('types');
            $table->foreignId('resistance_id')->constrained('resistances');
            $table->foreignId('weakness_id')->constrained('weaknesses');
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
        Schema::dropIfExists('cards');
    }
};
