<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(User::class, 50)->create()->each(function ($user) {
            if($user->isAuthor()){
                $user->books()->save(factory(App\Book::class)->make());
            }
        });
    }
}
