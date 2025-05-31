<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->string('title'); // Short summary of the issue
            $table->enum('category', ['Academic', 'Facilities', 'Administration', 'Others']);
            $table->text('description'); // Detailed explanation
            $table->enum('urgency', ['Low', 'Medium', 'High', 'Critical']);
            $table->foreignId('complain_by')->constrained('users')->onDelete('cascade'); // FK from users table
            $table->foreignId('assign_to')->nullable()->constrained('users')->onDelete('set null'); // FK from users table
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('complaints');
    }
};
