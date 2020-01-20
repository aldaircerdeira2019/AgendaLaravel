<?php
use App\Model\ContatoModel;
use Illuminate\Database\Seeder;

class ContatosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(ContatoModel::class,1000)->create();
    }
}
