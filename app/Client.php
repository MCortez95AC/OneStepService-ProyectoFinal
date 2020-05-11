<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Client extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'client';

        protected $fillable = [
            'name', 'lastname', 'email', 'password', 'username', 'hotel_account','historic_id','num_target','paypal'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }