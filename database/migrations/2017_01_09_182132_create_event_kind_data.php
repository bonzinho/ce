<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventKindData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var codeFin\Repositories\EventTypeRepository $repository */
        $repository = app(EventKindRepository::class); //helper app, para passar o serviço que o laravel gere
        foreach ($this->getData() as $eventKindArray) {
            $repository->create($eventKindArray);
            sleep(1); // faz com que o feech espera um segundo ate ao proximo registo
        }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        $repository = app(EventKindRepository::class);
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
                'description' => 'Institucional',
            ],
            [
                'description' => 'Cultural',
            ],
            [
                'description' => 'Eventos Ciêntificos',
            ],
            [
                'description' => 'Eventos Externos',
            ],
        ];
    }
}
