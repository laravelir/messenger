<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {

        Schema::create('groups', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->text('title');
            $table->timestamps();
        });

        Schema::create('contacts', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            $table->morphs('contactable'); // user
            $table->text('message');
            $table->timestamp('read_at');
            $table->timestamps();
        });

        Schema::create('messages', function (Blueprint $table) {
            $table->id();
            $table->uuid();
            // $table->morphs('messageable'); from
            // $table->foreignId('contact_id'); to
            $table->text('message');
            $table->timestamp('read_at');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('tables');
    }
};
