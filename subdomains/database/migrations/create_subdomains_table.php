<?php

use Boy132\Subdomains\Models\CloudflareDomain;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('subdomains', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('record_type')->default('A');
            $table->string('cloudflare_id')->nullable();
            $table->foreignIdFor(CloudflareDomain::class, 'domain_id')->constrained()->cascadeOnDelete();
            $table->unsignedInteger('allocation_id');
            $table->foreign('allocation_id')->references('id')->on('allocations')->cascadeOnDelete();
            $table->timestamps();

            $table->unique(['name', 'domain_id']);
        });

        Schema::table('servers', function (Blueprint $table) {
            $table->unsignedInteger('subdomain_limit')->default(0)->after('backup_limit');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('subdomains');

        Schema::table('servers', function (Blueprint $table) {
            $table->dropColumn('subdomain_limit');
        });
    }
};
