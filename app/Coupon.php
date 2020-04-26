<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    public static function findByCode($code){
        return self::where('code', $code)->first();
    }

    public function discount($subTotal){
        if($this->type === 'fixed'){
            return $this->value;
        }else if($this->type === 'percent'){
            return round(($this->percent_off * $subTotal)/100);
        }else{
            return 0;
        }
    }
}
