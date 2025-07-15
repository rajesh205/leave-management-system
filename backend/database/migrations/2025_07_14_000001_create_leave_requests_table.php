<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeaveRequestsTable extends Migration
{
    public function up()
    {
        Schema::create('leave_requests', function (Blueprint \$table) {
            \$table->id();
            \$table->foreignId('employee_id')->constrained()->onDelete('cascade');
            \$table->date('start_date');
            \$table->date('end_date');
            \$table->enum('status', ['pending', 'approved', 'rejected'])->default('pending');
            \$table->text('reason')->nullable();
            \$table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('leave_requests');
    }
}
