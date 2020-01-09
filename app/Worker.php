<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Worker extends Authenticatable
    {
        use Notifiable;

        protected $guard = 'worker';

        protected $fillable = [
            'name', 'email', 'password', 'username'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }