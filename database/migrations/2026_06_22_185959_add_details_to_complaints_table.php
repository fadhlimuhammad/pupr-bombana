<?php

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
        Schema::table('complaints', function (Blueprint $table) {
            $table->string('sender_email')->nullable();
            $table->date('report_date')->nullable();
            $table->string('street')->nullable();
            $table->string('district')->nullable();
            $table->string('city')->nullable();
            $table->string('complaint_type')->nullable();
            $table->text('expectation')->nullable();
            $table->string('photo_path')->nullable();
            $table->string('video_path')->nullable();
            $table->string('document_path')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('complaints', function (Blueprint $table) {
            $table->dropColumn([
                'sender_email',
                'report_date',
                'street',
                'district',
                'city',
                'complaint_type',
                'expectation',
                'photo_path',
                'video_path',
                'document_path'
            ]);
        });
    }
};
