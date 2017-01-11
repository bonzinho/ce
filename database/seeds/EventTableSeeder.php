<?php

use Illuminate\Database\Seeder;

class EventTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $max = 50;
        $users = $this->getUsers();
        $eventAbrangence = $this->getEventAbrangence();
        $eventType = $this->getEventTypes();
        $eventState = $this->getEventState();
        $eventKind = $this->getEventKind();
        $clients = $this->getClients(); // cliente unico para já FEUP

        factory(\codeFin\Models\Event::class, $max)
            ->make()// gera uma instancia do modelo mas nao salva no db
            ->each(function($event) use ($users, $clients, $eventAbrangence, $eventType, $eventState, $eventKind){
                $user = $users->random();
                $client = $clients->random();
                $event->event_id = $user->id;
                $event->client_id = $client->id;
                $event->save();
            });
    }

    private function getEventAbrangence(){
        /** @var \codeFin\Repositories\BankRepository $repository */
        $repository = app(\codeFin\Repositories\EventAbrangenceRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }

    private function getEventTypes(){
        /** @var \codeFin\Repositories\BankRepository $repository */
        $repository = app(\codeFin\Repositories\EventTypeRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }

    private function getEventState(){
        /** @var \codeFin\Repositories\BankRepository $repository */
        $repository = app(\codeFin\Repositories\EventStateRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }

    private function getEventKind(){
        /** @var \codeFin\Repositories\BankRepository $repository */
        $repository = app(\codeFin\Repositories\EventKindRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }

    private function getClients(){
        //todo fazer a seleção de utilizadores que nao sejam admins nem colaboradores
        /** @var \codeFin\Repositories\ClientRepository $repository */
        $repository = app(\codeFin\Repositories\UserRepository::class);
        $repository->skipPresenter(true);
        return $repository->all();
    }
}
