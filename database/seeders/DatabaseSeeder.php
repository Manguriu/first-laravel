<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Listing;
use PhpParser\Node\Expr\List_;
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
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name' => 'johndoe',
            'email' => 'john@gmail.com',
        ]);

        Listing::factory(6)->create([
            'user_id' => $user->id
        ]);




        // Listing::create([
        //     'title' => 'Laravel senior Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'brians co-opp',
        //     'location' => ' thika',
        //     'email' => 'hello@gmail.com',
        //     'website' => 'https//manguriu.com',
        //     'description' => 'some stuff'

        // ]);

        // Listing::create([
        //     'title' => 'Laravel lead Developer',
        //     'tags' => 'laravel, javascript',
        //     'company' => 'brians co-opp',
        //     'location' => ' thika',
        //     'email' => 'fuck@gmail.com',
        //     'website' => 'https//manguriu.com',
        //     'description' => 'some stuff'


        // ]);
    }
}
