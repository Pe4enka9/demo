<?php

use App\Enums\AppStatus;
use App\Models\Service;
use App\Models\User;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('applications', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(User::class)->constrained();
            $table->foreignIdFor(Service::class)->nullable()->constrained();
            $table->string('address');
            $table->string('phone');
            $table->dateTime('date');
            $table->string('another_service')->nullable();
            $table->string('payment_method');
            $table->string('status')->default(AppStatus::PENDING);
            $table->text('reason')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('applications');
    }
};
