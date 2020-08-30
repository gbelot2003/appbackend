<?php

use App\User;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('users')->delete();
        
        \DB::table('users')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Gerardo A. Belot',
                'email' => 'gerardo.belot@gmail.com',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '(504) 2232-4565',
                'user_status' => 1,
                'slug' => 'gerardo-a-belot',
                'remember_token' => '5Am2Wkoaku',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Chaya Rosenbaum',
                'email' => 'jacobson.jaiden@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '1-791-916-3527 x219',
                'user_status' => 1,
                'slug' => 'cualquier-1',
                'remember_token' => '7dvEQfOjVV',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Regan Goodwin',
                'email' => 'pascale84@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '286.722.6547 x19675',
                'user_status' => 0,
                'slug' => 'cualquier-2',
                'remember_token' => 'Xjo2joBh41',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Cydney Thiel',
                'email' => 'senger.marvin@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '+1 (232) 720-7028',
                'user_status' => 1,
                'slug' => 'cualquier-3',
                'remember_token' => 'bGgVURpzOm',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Dr. Holden Wunsch I',
                'email' => 'kendrick19@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '+1.771.294.7356',
                'user_status' => 1,
                'slug' => 'cualquier-4',
                'remember_token' => 'DyPE2YerFX',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Adelbert Tremblay',
                'email' => 'ryder64@example.com',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '223.706.9560 x8628',
                'user_status' => 1,
                'slug' => 'cualquier-5',
                'remember_token' => '5tSRJ803RR',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Leif Parisian',
                'email' => 'jamaal.dubuque@example.com',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '801-927-4178 x84437',
                'user_status' => 1,
                'slug' => 'cualquier-6',
                'remember_token' => 'bRPAVuzrC5',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Tressa Huels',
                'email' => 'weston96@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '430.783.4952',
                'user_status' => 1,
                'slug' => 'cualquier-7',
                'remember_token' => 'Mme6iZaBHU',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            8 => 
            array (
                'id' => 9,
                'name' => 'Margie Crooks',
                'email' => 'moore.alva@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '1-661-410-9048',
                'user_status' => 1,
                'slug' => 'cualquier-8',
                'remember_token' => '7uBcc4A0M7',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            9 => 
            array (
                'id' => 10,
                'name' => 'Mr. Herman Hermiston Jr.',
                'email' => 'krutherford@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '+1-879-857-1695',
                'user_status' => 1,
                'slug' => 'cualquier-9',
                'remember_token' => 'MSMkuUsmUs',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            10 => 
            array (
                'id' => 11,
                'name' => 'Mrs. Jackeline Wilkinson PhD',
                'email' => 'linwood45@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '827-712-8520 x1136',
                'user_status' => 1,
                'slug' => 'cualquier-10',
                'remember_token' => 'K6eVXNQMGH',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            11 => 
            array (
                'id' => 12,
                'name' => 'Mrs. Kaya Heidenreich',
                'email' => 'adelia13@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '+1-460-826-8930',
                'user_status' => 1,
                'slug' => 'cualquier-11',
                'remember_token' => 'FTCBtdRXI2',
                'created_at' => '2020-08-10 01:28:25',
                'updated_at' => '2020-08-10 01:28:25',
            ),
            12 => 
            array (
                'id' => 13,
                'name' => 'Matt Gusikowski',
                'email' => 'ashleigh12@example.com',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '+1-386-900-7834',
                'user_status' => 1,
                'slug' => 'cualquier-12',
                'remember_token' => 'NHkTPOtXj7',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            13 => 
            array (
                'id' => 14,
                'name' => 'Rita Schmitt MD',
                'email' => 'osinski.nella@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '713.929.1688',
                'user_status' => 1,
                'slug' => 'cualquier-13',
                'remember_token' => 'hXvWw6DEP1',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            14 => 
            array (
                'id' => 15,
                'name' => 'Norberto King IV',
                'email' => 'xbechtelar@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'phonefield' => '(819) 809-2644 x26625',
                'user_status' => 1,
                'slug' => 'cualquier-14',
                'remember_token' => 'bEy4nmUjuR',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            15 => 
            array (
                'id' => 16,
                'name' => 'Makayla Ziemann PhD',
                'email' => 'reinger.helena@example.com',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '654.386.5851 x6908',
                'user_status' => 1,
                'slug' => 'cualquier-15',
                'remember_token' => 'G6hcy3Qj5U',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            16 => 
            array (
                'id' => 17,
                'name' => 'Dannie Kuhic',
                'email' => 'judge64@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '902.917.9656',
                'user_status' => 1,
                'slug' => 'cualquier-16',
                'remember_token' => 'deABn6bN7H',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            17 => 
            array (
                'id' => 18,
                'name' => 'Katelyn Dickens',
                'email' => 'mosciski.hollis@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '(918) 710-4398 x44119',
                'user_status' => 1,
                'slug' => 'cualquier-17',
                'remember_token' => 'czHeBJufpv',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            18 => 
            array (
                'id' => 19,
                'name' => 'Sibyl O\'Conner',
                'email' => 'elissa.okeefe@example.org',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '1-240-630-2051 x173',
                'user_status' => 1,
                'slug' => 'cualquier-18',
                'remember_token' => 'nHzzPjMPju',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
            19 => 
            array (
                'id' => 20,
                'name' => 'Noah Brakus',
                'email' => 'eugene.swaniawski@example.net',
                'email_verified_at' => '2020-08-10 01:28:25',
                'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
                'phonefield' => '(774) 855-4928 x6919',
                'user_status' => 0,
                'slug' => 'cualquier-19',
                'remember_token' => '7rbNQJYuT1',
                'created_at' => '2020-08-10 01:28:26',
                'updated_at' => '2020-08-10 01:28:26',
            ),
        ));

        $user = User::find(1);
        $profile = factory(\App\Profile::class)->create(
            [
                'user_id' => $user->id,
                'country_id' => 97,
                'city_id' => 54333,
            ])->toArray();
        $user->assignRole('Administrator');

        $user = User::find(2);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Supervisor');

        $user = User::find(3);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Administrator');

        $user = User::find(4);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Supervisor');

        $user = User::find(5);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(6);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(7);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(8);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(9);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(10);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Sponsor');

        $user = User::find(11);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(12);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(13);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(14);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(15);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(16);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(17);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(18);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(19);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');

        $user = User::find(20);
        $profile = factory(\App\Profile::class)->create(['user_id' => $user->id])->toArray();
        $user->assignRole('Subscriber');
    }
}