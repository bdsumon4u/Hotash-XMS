<?php

use App\Models\User;
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
        Schema::create('devices', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained()->cascadeOnUpdate()->cascadeOnDelete();
            $table->string('token')->nullable();
            $table->string('model');
            $table->string('android_version')->nullable();
            $table->string('app_version')->nullable();
            $table->string('android_id');
            $table->boolean('enabled')->default(false);
            $table->boolean('shared_to_all')->default(false);
            $table->boolean('use_owner_settings')->default(true);
            $table->timestamps();

            $table->unique(['android_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('devices');
    }
};
