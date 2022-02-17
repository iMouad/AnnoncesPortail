<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAnnoncesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('annonces', function (Blueprint $table) {
            $table->id();
            $table->string('titre');
            $table->text('desc');
            $table->string('adresse');
            $table->binary('images')->nullable();
            $table->foreignId('user_id')->constrained();
            $table->timestamps();
            $table->boolean('confirmed')->default(0);

        });

        DB::statement('ALTER TABLE annonces MODIFY COLUMN images VARCHAR(255)');
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table("annonces",function(Blueprint $table) {
            $table->dropForeign("user_id");
        });
        Schema::dropIfExists('annonces');
    }
}
