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
        Schema::create('issue__reports', function (Blueprint $table) {
            $table->id();
            $table->string('issue_title');
            $table->string('issue_category');
            $table->string('issue_location');
            $table->string('image')->nullable();
            $table->string('url')->nullable();
            $table->string('priority');
            $table->longText('description')->nullable();
            $table->string('ufo_status')->nullable()->default('Pending');
            $table->string('dev_status')->nullable();
            $table->string('dev_remark')->nullable();
            $table->string('delivery_date')->nullable();
            $table->foreignId('project_id')->constrained('projects')->onUpdate('cascade')->onDelete('cascade');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('issue__reports');
    }
};
