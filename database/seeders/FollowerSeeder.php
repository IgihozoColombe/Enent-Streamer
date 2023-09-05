// FollowerSeeder.php
<?php
use Illuminate\Database\Seeder;
use App\Follower;
use App\User;

class FollowerSeeder extends Seeder
{
    public function run()
    {
        $users = User::all();

        foreach ($users as $user) {
            $count = rand(300, 500);

            factory(Follower::class, $count)->create([
                'user_id' => $user->id,
            ]);
        }
    }
}
