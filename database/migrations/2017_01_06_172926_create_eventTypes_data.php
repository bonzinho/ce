<?php

use Illuminate\Database\Migrations\Migration;
use codeFin\Repositories\EventTypeRepository;

class CreateEventTypesData extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /** @var codeFin\Repositories\EventTypeRepository $repository */
        $repository = app(EventTypeRepository::class); //helper app, para passar o serviço que o laravel gere
        foreach ($this->getData() as $eventTypeArray) {
            $repository->create($eventTypeArray);
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
        $repository = app(EventTypeRepository::class);
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
                'event_type' => 'internal',
                'discount' => 0.75,
            ],
            [
                'event_type' => 'mixed',
                'discount' => 0.5,
            ],
            [
                'event_type' => 'external',
                'discount' => 0.0,
            ],
        ];
    }
}
