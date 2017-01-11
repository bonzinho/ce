<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventAbrangencesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var codeFin\Repositories\EventTypeRepository $repository */
        $repository = app(\codeFin\Models\EventAbrangence::class); //helper app, para passar o serviço que o laravel gere
        foreach ($this->getData() as $eventAbrangenceArray) {
            $repository->create($eventAbrangenceArray);
            //sleep(1); // faz com que o feech espera um segundo ate ao proximo registo
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $repository = app(EventAbrangenceRepository::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());
        foreach (range(1, $count) as $value){
            $model = $repository->find($value);
            $model->delete();
        }
    }


    //lista de tipo de eventos padrao
    public function getData() {
        return [
            [
                'description' => 'Internacional',
            ],
            [
                'description' => 'Nacional',
            ],
            [
                'description' => 'Regional',
            ],
            [
                'description' => 'Local',
            ],
        ];
    }
}
