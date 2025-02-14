<?php

namespace Database\Seeders;

use App\Models\Categorie;
use App\Models\Fournisseur;
use App\Models\Produit;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $cat1 = Categorie::create(["nom" => "Alimentaire"]);

        $fournisseur1 = Fournisseur::create(["nom" => "Franprix","adresse"=> "machin du centre ville", "ville"=> "melun", "email"=>"test@example.com", "tel"=>"0123456789"]);

        $produit1 = Produit::create([
            "nom" => "Pot de miel",
            "prix" => 3.0,
            "prixHT" => 3.5,
            "description" => "Savoureux pot de miel de Winnie l'ourson",
            "qteEnStock" => 18,
            "categorie_id" => $cat1->id,
            "fournisseur_id" => $fournisseur1->id,
        ]);
        $roleAdmin=Role::create(["nom"=>"admin"]);
        $roleClient=Role::create(["nom"=>"client"]);

        $user1 = User::create([
            "name" => "admin",
            "prenom" => "admin",
            "adresse" => "123 Rue Exemple",
            "ville" => "VilleExemple",
            "tel" => "0123456789",
            "email" => "email@example.com",
            "password" => bcrypt("password@example.com"), // Il est important de hasher le mot de passe
            "role_id" => $roleAdmin->id // Assurez-vous que ce rôle existe dans votre table `roles`
        ]);


    }
}
