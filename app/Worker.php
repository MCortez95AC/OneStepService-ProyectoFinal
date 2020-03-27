<?php

    namespace App;

    use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;

    class Worker extends Authenticatable
    {
        use Notifiable;

        /* Relationship with area model */
        public function areas(){
            return $this->belongsToMany(Area::class);
        }

        /* to create products */
        protected $guard = 'worker';

        protected $fillable = [
            'name', 'dni', 'email', 'area','is_admin',
            'password', 'username','password_confirmation'
        ];

        protected $hidden = [
            'password', 'remember_token',
        ];
    }