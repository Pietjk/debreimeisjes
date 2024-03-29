<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAboutTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('about', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('text');
            $table->string('image_path');
            $table->timestamps();
        });

        $dt = now();
        DB::table('about')->insert([
            [
                'title' => 'Over de Breimeisjes',
                'text' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'image_path' => 'images/placeholder.jpg',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('about');
    }
}
