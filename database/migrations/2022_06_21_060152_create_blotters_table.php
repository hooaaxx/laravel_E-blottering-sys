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
        Schema::create('blotters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')
                ->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('case_number')->nullable();
            $table->string('pass_to')->nullable();
            $table->string('approval');
            
            //BRGY
            $table->string('barangay');

            //COMPLAINANT FORM
            $table->string('complainant_img', 300);
            $table->string('complainant_firstname');
            $table->string('complainant_lastname');
            $table->string('complainant_number');
            $table->text('complainant_address');

            //RESPONDENT FORM
            $table->string('respondent_img', 300);
            $table->string('respondent_firstname');
            $table->string('respondent_lastname');
            $table->string('respondent_number');
            $table->text('respondent_address');

            // FORM
            $table->date('when');
            $table->text('where');
            $table->longText('what');

            
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
        Schema::dropIfExists('blotters');
    }
};
