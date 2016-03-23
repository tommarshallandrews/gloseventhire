<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Foundation\Auth\Access\Authorizable;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Product extends Model implements AuthenticatableContract,
                                    AuthorizableContract,
                                    CanResetPasswordContract
{
    use Authenticatable, Authorizable, CanResetPassword;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'products';


    public function orders() {
    return $this -> belongsToMany('App\Order', 'order_product', 'product_id', 'order_id') -> withPivot('id','quantity','colour');
    }
    

    public function cats()
    {
       return $this->belongsTo('App\Cat');
    }


    public function range()
    {
       //return $this->belongsTo('App\Option');
       return $this->belongsTo('App\Range');
    }


    public function group()
    {
       //return $this->belongsTo('App\Option');
       return $this->belongsTo('App\Group');
    }


    public function colour() {
    return $this -> belongsToMany('App\Colour');
    }



}
