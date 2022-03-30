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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('tid');
            $table->string('nid');
            $table->string('nombres');
            $table->string('apellidos');
            $table->string('rs');
            $table->string('celular');
            $table->string('telefono');
            $table->string('mpio');
            $table->string('dpto');
            $table->timestamps();
        });

        DB::table('clientes')->insert(
            [
                'tid' => 'Cédula de Ciudadanía',
                'nid' => '1099666333',
                'nombres' => 'Armando',
                'apellidos' => 'Casas Castillo',
                'rs' => '',
                'celular' => '3112003399',
                'telefono' => '8593312',
                'mpio' => 'Pueblo viejo',
                'dpto' => 'Magdalena'
            ]
        );
        DB::table('clientes')->insert(
            [
                'tid' => 'Cédula de Ciudadanía',
                'nid' => '143631',
                'nombres' => 'Maria',
                'apellidos' => 'Castro Viuda de Hernandez',
                'rs' => '',
                'celular' => 'No tiene',
                'telefono' => '2744458',
                'mpio' => 'Bogotá D.C.',
                'dpto' => 'Bogotá D.C.'
            ],
        );
        DB::table('clientes')->insert(
            [
                'tid' => 'NIT',
                'nid' => '900211632',
                'nombres' => '',
                'apellidos' => '',
                'rs' => 'Zapatos la feria',
                'celular' => '3009930001',
                'telefono' => '7127435',
                'mpio' => 'Bucaramanga',
                'dpto' => 'Santander'
            ],

        );
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
};
