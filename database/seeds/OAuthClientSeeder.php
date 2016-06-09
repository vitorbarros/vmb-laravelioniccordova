<?php

use CodeDelivery\Models\OAuthClient;
use Illuminate\Database\Seeder;

class OAuthClientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(OAuthClient::class)->create(array(
            'name' => 'Minha App Mobile',
            'secret' => 'secret',
            'id' => 'appid01'
        ));
    }
}
