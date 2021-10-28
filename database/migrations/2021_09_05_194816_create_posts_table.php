<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use App\Models\Post;

class CreatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('locator');
            $table->timestamps();
        });

        $dt = now();
        DB::table('posts')->insert([
            [
                'title' => 'Welkom bij de Breimeisjes!',
                'description' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'locator' => 'hWelcome',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Mijn patronen',
                'description' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'locator' => 'hPattern',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Het laatste nieuws',
                'description' => null,
                'locator' => 'hNews',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Ontwerpen',
                'description' => 'De oude vioolbouwer Aurélien Ricard heeft zijn leven gewijd aan een droom: het bijeen brengen van de beste violist en de meest bijzondere viool op aarde. Alleen het beste is goed genoeg om het mooiste muziekstuk dat uit het menselijk brein is voortgekomen te spelen: de Chaconne van Bach. Ricard heeft echter geen rekening gehouden met de wispelturigheid van de jonge violist, waardoor hun relatie zich kenmerkt door meningsverschillen en ruzies. Uiteindelijk zal de strijd worden beslecht in een waanzinnige apotheose, in een van de belangrijkste plaatsen uit het leven van Johann Sebastian Bach.

                Lezers over Cantor: Het boek laat mij niet meer los. Cantor verdient veel lezers. Bijzonder boeiend en sfeervol.

                Specificaties:
                Aantal bladzijden: 380
                ISB-nummer: 978-90-825221-0-5
                Druk: Pumbo.nl
                Publicatie: Vannier, 2016',
                'locator' => 'mPattern',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Al het nieuws',
                'description' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'locator' => 'mNews',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Over mij',
                'description' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'locator' => 'mAbout',
                'created_at' => $dt,
                'updated_at' => $dt,
            ],
            [
                'title' => 'Contact',
                'description' => 'Aliquam quis varius tortor. Mauris laoreet massa sollicitudin mauris euismod, ut cursus ante posuere. Etiam velit arcu, eleifend eget faucibus ac, scelerisque eu purus. Morbi ut nisi quis sapien fermentum ultrices. In facilisis urna turpis, eu aliquet risus condimentum in. Vivamus non nisi ultrices, tempus erat at, imperdiet felis. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.',
                'locator' => 'mContact',
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
        Schema::dropIfExists('posts');
    }
}
