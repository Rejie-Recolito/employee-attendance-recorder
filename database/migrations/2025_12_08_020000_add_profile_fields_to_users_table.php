<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->date('date_of_birth')->nullable();
            $table->string('place_of_birth')->nullable();
            $table->integer('age')->nullable();
            $table->string('sex')->nullable();
            $table->string('address')->nullable();
            $table->string('job_title')->nullable();
            $table->string('department')->nullable();
            $table->string('status')->nullable();
            $table->date('date_of_service')->nullable();
            $table->decimal('salary', 12, 2)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn([
                'date_of_birth',
                'place_of_birth',
                'age',
                'sex',
                'address',
                'job_title',
                'department',
                'status',
                'date_of_service',
                'salary',
            ]);
        });
    }
};
