<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vlans', function (Blueprint $table) {
            $table->id();
            $table->string('vlan_name');
            $table->string('start_ip');
            $table->string('end_ip');
            $table->foreignId('dispatch_id')->nullable()->constrained('dispatches')->onDelete('set null')->onUpdate('cascade');
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
        Schema::dropIfExists('vlans');
    }
}
