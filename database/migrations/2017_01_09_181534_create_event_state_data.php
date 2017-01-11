<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEventStateData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var codeFin\Repositories\EventTypeRepository $repository */
        $repository = app(EventStateRepository::class); //helper app, para passar o serviço que o laravel gere
        foreach ($this->getData() as $eventStateArray) {
            $repository->create($eventStateArray);
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
        $repository = app(EventStateRepository::class);
        $repository->skipPresenter(true);
        $count = count($this->getData());
        foreach (range(1, $count) as $value){
            $model = $repository->find($value);
            $model->delete();
        }
    }

    //lista de estados do evento
    public function getData() {
        return [
            [
                'description' => 'Pendente',
            ],
            [
                'description' => 'Em processamento',
            ],
            [
                'description' => 'Concluído',
            ],
            [
                'description' => 'Arquivado',
            ],
            [
                'description' => 'Cancelado',
            ],
        ];
    }
}
