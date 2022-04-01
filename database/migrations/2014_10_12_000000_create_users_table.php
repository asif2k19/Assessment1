<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->decimal('annualincome', 30,5)->default(0);
            $table->date('dob')->nullable();
            $table->enum('gender', ['male', 'female'])->nullable();
            $table->enum('occupation', ['private', 'govt','business'])->nullable();
            $table->enum('familytype', ['joint', 'nuclear'])->nullable();
            $table->enum('manglik', ['yes', 'no'])->nullable();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->decimal('amount', 30,5)->default(0);
            $table->decimal('start', 30,5)->default(0);
            $table->decimal('finish', 30,5)->default(0);

            $table->text('occupationsearch')->nullable();
            $table->text('familytypesearch')->nullable();
            $table->enum('mangliksrch',['yes','no'])->nullable();
            $table->enum('isadmin',['0','1'])->default('0');

            $table->rememberToken();
            $table->timestamps();
            $table->string('google_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
