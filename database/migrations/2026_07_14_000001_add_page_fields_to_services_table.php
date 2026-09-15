<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->string('slug')->nullable()->after('title');
            $table->string('page_subtitle')->nullable()->after('description');
            $table->string('page_image')->nullable()->after('page_subtitle');
            $table->longText('page_content')->nullable()->after('page_image');
        });

        // Génère un slug unique pour les services existants.
        foreach (DB::table('services')->get() as $service) {
            $base = Str::slug($service->title) ?: 'service';
            $slug = $base;
            $i = 1;
            while (DB::table('services')->where('slug', $slug)->where('id', '!=', $service->id)->exists()) {
                $slug = $base . '-' . (++$i);
            }
            DB::table('services')->where('id', $service->id)->update(['slug' => $slug]);
        }
    }

    public function down(): void
    {
        Schema::table('services', function (Blueprint $table) {
            $table->dropColumn(['slug', 'page_subtitle', 'page_image', 'page_content']);
        });
    }
};
