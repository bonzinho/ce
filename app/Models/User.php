<?php

namespace codeFin\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject {

    use Notifiable;

    const ROLE_ADMIN = 'admin';
    const ROLE_USER = 'user';
    const ROLE_COLLABORATOR = 'collaborator';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'phone',
        'denomination',
        'address',
        'postal_code',
        'nif',
        'responsible_name',
        'observations',
        'id_user_type'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [  // podemos incluir os campo que não queremos que sejam enviados na serialização enviado no json
        'password',
        'remember_token',
    ];

    public function client(){
        //um utilizador tem um tenant um para um
        return $this->belongsTo(Client::class);
    }


    public function event(){
        // um utilizador pode ter muito eventos
        return $this->belongsToMany(Event::class);
    }

    public function getJWTIdentifier() {
        return $this->id;
    }

    public function getJWTCustomClaims() {
        return [
            'user' => [
                'id' => $this->id,
                'name' => $this->name,
                'email' => $this->email,
                'phone' => $this->phone,
                'denomination' => $this->denomination,
                'address' => $this->address,
                'nif' => $this->nif,
                'responsible_name' => $this->responsible_name,
                'observations' => $this->observations,
            ],
        ];
    }

}
