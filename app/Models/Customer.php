<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
//use Illuminate\Notifications\Notifiable;
    use Illuminate\Foundation\Auth\User as Authenticatable;
    use Tymon\JWTAuth\Contracts\JWTSubject;

    class Customer extends Authenticatable implements JWTSubject
    {
        //use Notifiable;

        /**
         * The attributes that are mass assignable.
         *
         * @var array
         */
        protected $fillable = [
            'name', 'email', 'password','mobile','customers_default_address_id',
        ];

        /**
         * The attributes that should be hidden for arrays.
         *
         * @var array
         */
        protected $hidden = [
            'password', 'remember_token',
        ];

        protected $primaryKey='customers_id';

        public function getJWTIdentifier()
        {
            return $this->getKey();
        }
        public function getJWTCustomClaims()
        {
            return [];
        }

        public function customerAddress()
        {
            return $this->hasMany('App\Models\CustomerAddress','user_id','customers_id');
        }
    }