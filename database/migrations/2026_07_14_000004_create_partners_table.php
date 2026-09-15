<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('partners', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('name')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Reprise des logos existants.
        $now = now();
        $logos = [
            ['images/premium.png', 'PREMIUM SÉNÉGAL'],
            ['images/tadexe.png', 'TADEX'],
            ['images/ter.png', 'TER'],
            ['images/afritel.png', 'AFRITEL'],
            ['images/camusat.png', 'CAMUSAT'],
            ['images/camusat.png', '3STB'],
            ['images/camusat.png', 'ENGELVIN'],
        ];
        foreach ($logos as $i => [$image, $name]) {
            DB::table('partners')->insert([
                'image' => $image, 'name' => $name,
                'sort_order' => $i + 1, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('partners');
    }
};
