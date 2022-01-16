<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCamerasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cameras', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->foreignId('region_id')->nullable()->constrained('regions')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('segment_id')->nullable()->constrained('segments')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('area_id')->nullable()->constrained('areas')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('location_id')->nullable()->constrained('locations')->onDelete('set null')->onUpdate('cascade');
            $table->string('en_name');
            $table->string('ar_name');
            $table->foreignId('operational_state_id')->nullable()->constrained('operational_states')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('vlan_id')->nullable()->constrained('vlans')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('record_device_id')->nullable()->constrained('record_devices')->onDelete('set null')->onUpdate('cascade');
            $table->string('ch_no');
            $table->enum('state',['online','offline']);
            $table->foreignId('dispatch_id')->nullable()->constrained('dispatches')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('maintenance_category_id')->nullable()->constrained('maintenance_categories')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('maintenance_tool_id')->nullable()->constrained('maintenance_tools')->onDelete('set null')->onUpdate('cascade');
            $table->foreignId('cleaning_tool_id')->nullable()->constrained('cleaning_tools')->onDelete('set null')->onUpdate('cascade');
            $table->string('camera_type');
            $table->string('ip');
            $table->string('company');
            $table->string('year');
            $table->text('gallery');
            $table->tinyInteger('alarm');
            $table->tinyInteger('ping');
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
        Schema::dropIfExists('cameras');
    }
}
