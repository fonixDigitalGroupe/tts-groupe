<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('services', function (Blueprint $table) {
            $table->id();
            $table->string('icon')->default('etudes');
            $table->string('title');
            $table->text('description')->nullable();
            $table->string('link')->nullable();
            $table->integer('sort_order')->default(0);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
        });

        // Reprise des 4 services existants pour que le site reste identique.
        $now = now();
        DB::table('services')->insert([
            [
                'icon' => 'etudes', 'title' => "Bureau d'études",
                'description' => 'Études FTTH, SIG, cartographie et logiciels sur mesure',
                'link' => '/bureau-etudes', 'sort_order' => 1, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'icon' => 'fibre', 'title' => 'Raccordement FTTH',
                'description' => 'Installation fibre optique du boîtier au logement',
                'link' => '/raccordement', 'sort_order' => 2, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'icon' => 'sav', 'title' => 'SAV & diagnostic',
                'description' => 'Intervention rapide et recherche de pannes',
                'link' => '/sav', 'sort_order' => 3, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
            [
                'icon' => 'globe', 'title' => 'Déploiement',
                'description' => 'Déploiement complet de réseau FTTH',
                'link' => '/deploiement', 'sort_order' => 4, 'is_active' => true,
                'created_at' => $now, 'updated_at' => $now,
            ],
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('services');
    }
};
