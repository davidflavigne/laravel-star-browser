<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StarSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        \App\Models\Star::factory()->create([
            'nom' => 'Lagaffe',
            'prenom' => 'Gaston',
            'imagePath' => '',
            'description' => "L'arrivée de Gaston dans Le journal de Spirou est annoncée mystérieusement par des traces de pas dans les marges des pages du journal, sans explications pour le lecteur dans un premier temps. Il apparaît pour la première fois à la rédaction du Journal de Spirou du 28 février 1957, en costume et nœud papillon, deux semaines plus tard en jean noir, pull-over vert et espadrilles, assis sur une chaise, cigarette aux lèvres5. Entretemps, les lecteurs ont pu le découvrir dans Le Journal de Spirou du 7 mars 1957, dans lequel il porte toujours le costume, mais une cravate dénouée. Sans doute le premier pas vers la décontraction qui le caractérise. Le 25 avril 1957, un communiqué de Fantasio, autre personnage de Spirou, tente d'éclaircir la situation aux lecteurs : Gaston a été recruté par une personne dont il ne se rappelle pas le nom, mais il demeure persuadé qu'il a été embauché pour un travail de héros de bande dessinée. Ne pouvant être intégré dans une série du Journal de Spirou, il devient alors le premier « héros sans emploi6 ». Il est par la suite représenté comme un employé de la rédaction."
        ]);
        \App\Models\Star::factory()->create([
            'nom' => 'Haddock',
            'prenom' => 'Archibald',
            'imagePath' => '',
            'description' => "Capitaine au long cours d'âge mûr, Haddock est l'archétype du marin, reconnaissable à son pull à col roulé bleu frappé d'une ancre au milieu de la poitrine, à sa casquette et à sa barbe foisonnante. Impulsif et colérique, il exprime sa mauvaise humeur à travers les nombreux jurons qui le caractérisent, mais c'est avant tout un homme au cœur tendre qui refuse l'injustice et se montre toujours prêt à aider ses amis. Plus que ses colères, l'alcoolisme est son principal défaut. Grand amateur de whisky, il lui arrive d'en consommer jusqu'à ne plus obéir qu'à ses pulsions, ce qui peut le conduire à des crises de dépression ou de folie furieuse, qu'il regrette amèrement ensuite. Dans sa première aventure, il est en constant état d'ébriété et sous la domination de son propre équipage, mais il gagne en respectabilité au contact de Tintin, sans toutefois parvenir à se défaire de sa dépendance. L'alcool n'est pas sa seule addiction, puisque le capitaine fume également la pipe."
        ]);
    }
}
