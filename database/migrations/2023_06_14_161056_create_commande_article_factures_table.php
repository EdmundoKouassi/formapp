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
        Schema::create('commande_article_factures', function (Blueprint $table) {

            $table->foreignId("commande_id")->constrained();
            $table->foreignId("article_id")->constrained();
            $table->foreignId("facture_id")->constrained();
            $table->double("qteCommande");
        });

        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('commande_article_factures', function (blueprint $table){
            $table->dropForeign(["commande_id","article_id","facture_id"]);
            
        });
        Schema::dropIfExists('commande_article_factures');
    }
};
