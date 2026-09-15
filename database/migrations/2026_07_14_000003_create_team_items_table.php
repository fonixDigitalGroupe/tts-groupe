<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('team_items', function (Blueprint $table) {
            $table->id();
            $table->string('image')->nullable();
            $table->string('caption')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Reprise des 4 cartes existantes.
        $now = now();
        $items = [
            ['images/equipe_1.png', 'Équipe terrain - Densification K46'],
            ['images/equipe_2.png', 'Intervention sur poteau - Traverse Senelec'],
            ['images/equipe_3.png', 'Soudeuse fibre optique Sumitomo'],
            ['images/equipe_4.png', 'Présence sur site N00'],
        ];
        foreach ($items as $i => [$image, $caption]) {
            DB::table('team_items')->insert([
                'image' => $image, 'caption' => $caption,
                'sort_order' => $i + 1, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ]);
        }
    }

    public function down(): void
    {
        Schema::dropIfExists('team_items');
    }
};
