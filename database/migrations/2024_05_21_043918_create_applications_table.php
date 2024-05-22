<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateApplicationsTable extends Migration  // Rename this class to a suitable name
{
    public function up()
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id(); // Auto-incrementing primary key
            $table->string('app_no', 10)->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->date('date_of_birth')->nullable();
            $table->string('gender', 10)->nullable();
            $table->string('caste', 50)->nullable();
            $table->string('religion', 50)->nullable();
            $table->string('nationality', 50)->nullable();
            $table->string('program', 200)->nullable();
            $table->string('field', 200)->nullable();
            $table->string('differently_abled', 10)->nullable();
            $table->string('marital_status', 20)->nullable();
            $table->string('fathers_name', 100)->nullable();
            $table->string('father_occupation', 100)->nullable();
            $table->string('fathers_annual_income', 50)->nullable();
            $table->string('fathers_mobile_number', 15)->nullable();
            $table->string('mothers_name', 100)->nullable();
            $table->string('mother_occupation', 100)->nullable();
            $table->string('mothers_annual_income', 30)->nullable();
            $table->string('mothers_mobile_number', 15)->nullable();
            $table->string('permanent_street_address1', 255)->nullable();
            $table->string('permanent_street_address2', 255)->nullable();
            $table->string('permanent_city', 100)->nullable();
            $table->string('permanent_state', 100)->nullable();
            $table->string('permanent_postal_code', 10)->nullable();
            $table->string('communication_street_address1', 255)->nullable();
            $table->string('communication_street_address2', 255)->nullable();
            $table->string('communication_city', 100)->nullable();
            $table->string('communication_state', 100)->nullable();
            $table->string('communication_postal_code', 10)->nullable();
            $table->string('status', 20)->default('pending');
            $table->timestamp('application_date')->useCurrent()->useCurrentOnUpdate();
            $table->string('qualification', 50)->nullable();
            $table->string('university', 255)->nullable();
            $table->string('degree_name', 255)->nullable();
            $table->integer('graduation_year')->nullable();
            $table->string('percentage_grade', 100)->nullable();
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('applications'); // Drops the table if it exists
    }
}