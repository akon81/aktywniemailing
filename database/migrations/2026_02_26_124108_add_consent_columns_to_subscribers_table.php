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
        Schema::table('subscribers', function (Blueprint $table) {
            $table->boolean('consent_marketing')->default(false)->after('status');
            $table->boolean('consent_privacy')->default(false)->after('consent_marketing');
            $table->timestamp('consent_marketing_at')->nullable()->after('consent_privacy');
            $table->timestamp('consent_privacy_at')->nullable()->after('consent_marketing_at');
            $table->string('consent_ip', 45)->nullable()->after('consent_privacy_at');
            $table->text('consent_marketing_text')->nullable()->after('consent_ip');
            $table->text('consent_privacy_text')->nullable()->after('consent_marketing_text');
        });
    }

    public function down(): void
    {
        Schema::table('subscribers', function (Blueprint $table) {
            $table->dropColumn([
                'consent_marketing',
                'consent_privacy',
                'consent_marketing_at',
                'consent_privacy_at',
                'consent_ip',
                'consent_marketing_text',
                'consent_privacy_text',
            ]);
        });
    }
};
