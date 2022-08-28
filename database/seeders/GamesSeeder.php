<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GamesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('games')->insert([
            'genre_id' => "3",
            'title' => "PUBG",
            'image' => "PUBGicon.png",
            'description' => "Welcome to PUBG Mobile",
            'price' => 20,
            'rating' => "12",
        ]);
        DB::table('games')->insert([
            'genre_id' => "3",
            'title' => "Valorant",
            'image' => "Valorant.jpg",
            'description' => "Valorant is a tactical shooting game involving two teams with 5 players in each team.",
            'price' => 0,
            'rating' => "12",
        ]);
        DB::table('games')->insert([
            'genre_id' => "4",
            'title' => "Fifa",
            'image' => "Fifa.jpeg",
            'description' => "FIFA 22 is a football simulation video game published by Electronic Arts as part of the FIFA series.",
            'price' => 50,
            'rating' => "7",
        ]);
        DB::table('games')->insert([
            'genre_id' => "5",
            'title' => "Dota 2",
            'image' => "Dota.jpg",
            'description' => "Dota 2 is a multiplayer online battle arena (MOBA) video game in which two teams of five players compete to collectively destroy a large structure defended by the opposing team known as the Ancient",
            'price' => 0,
            'rating' => "12",
        ]);
        DB::table('games')->insert([
            'genre_id' => "3",
            'title' => "CSGO",
            'image' => "Csgo.jpg",
            'description' => "Counter-Strike: Global Offensive (CS:GO) is a multiplayer first-person shooter developed by Valve and Hidden Path Entertainment.",
            'price' => 10,
            'rating' => "18",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "Pacman",
            'image' => "Pacman.png",
            'description' => "Pac-Man is an action maze chase video game",
            'price' => 30,
            'rating' => "0",
        ]);
        DB::table('games')->insert([
            'genre_id' => "3",
            'title' => "Overwatch",
            'image' => "Overwatch.jpg",
            'description' => "Overwatch is a 2016 team-based multiplayer first-person shooter game developed and published by Blizzard Entertainment.",
            'price' => 0,
            'rating' => "16",
        ]);
        DB::table('games')->insert([
            'genre_id' => "1",
            'title' => "World of Warcraft",
            'image' => "Wow.jpg",
            'description' => "Pac-Man is an action maze chase video game",
            'price' => 25,
            'rating' => "16",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "GTA V San Andreas",
            'image' => "Gta.jpg",
            'description' => "Grand Theft Auto (GTA) is a series of action-adventure games created by David Jones and Mike Dailly.",
            'price' => 50,
            'rating' => "18",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "Mario Kart",
            'image' => "Mariokart.jpg",
            'description' => "Mario Kart  is a series of racing games developed and published by Nintendo.",
            'price' => 35,
            'rating' => "3",
        ]);
        DB::table('games')->insert([
            'genre_id' => "5",
            'title' => "Mobile Legend",
            'image' => "ML.jpg",
            'description' => "Mobile Legends: Bang Bang, commonly referred to as ML or MLBB, is a mobile multiplayer online battle arena (MOBA) game developed and published by Moonton, a subsidiary of ByteDance.",
            'price' => 0,
            'rating' => "5",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "Minecraft",
            'image' => "Minecraft.jpg",
            'description' => "Minecraft is a sandbox video game developed by the Swedish video game developer Mojang Studios. The game was created by Markus Notch Persson in the Java programming language.",
            'price' => 0,
            'rating' => "0",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "Roblox",
            'image' => "Roblox.jpg",
            'description' => "Roblox is a global platform where millions of people gather together every day to imagine, create, and share experiences with each other in immersive, user-generated 3D worlds",
            'price' => 0,
            'rating' => "3",
        ]);
        DB::table('games')->insert([
            'genre_id' => "2",
            'title' => "Fortnite",
            'image' => "Fortnite.jpg",
            'description' => "Fortnite is an online video game developed by Epic Games and released in 2017. It is available in three distinct game mode versions that otherwise share the same general gameplay and game engine: Fortnite: Save the World",
            'price' => 0,
            'rating' => "3",
        ]);

    }
}
