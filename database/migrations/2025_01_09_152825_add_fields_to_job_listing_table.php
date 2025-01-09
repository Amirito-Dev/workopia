<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {

        // Clear table data
        DB::table('job_listing')->truncate();

        Schema::table('job_listing', function (Blueprint $table) {
            $table->unsignedInteger('user_id')->after('id');

            $table->integer('salary');
            $table->string('tags')->nullable();
            $table->enum('job_type', ['Full-Time', 'Part-Time', 'Contract', 'Temporary', 'Internship', 'Volunteer'])->default('Full-Time');
            $table->boolean('remote')->default(false);
            $table->string('requirements')->nullable();
            $table->string('benefits')->nullable();
            $table->string('address')->nullable();
            $table->string('city');
            $table->string('state');
            $table->string('zipcode')->nullable();
            $table->string('contact_email');
            $table->string('company_name');
            $table->string('company_description')->nullable();
            $table->string('company_logo')->nullable();
            $table->string('company_website')->nullable();

            // add user foreign key
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('job_listing', function (Blueprint $table) {

            $table->dropForeign(['user_id']);
            $table->dropColumn('user_id');

            $table->dropColumn('salary');
            $table->dropColumn('tags');
            $table->dropColumn('job_type');
            $table->dropColumn('remote');
            $table->dropColumn('requirements');
            $table->dropColumn('benefits');
            $table->dropColumn('address');
            $table->dropColumn('city');
            $table->dropColumn('state');
            $table->dropColumn('zipcode');
            $table->dropColumn('contact_email');
            $table->dropColumn('company_name');
            $table->dropColumn('company_description');
            $table->dropColumn('company_logo');
            $table->dropColumn('company_website');
        });
    }
};
