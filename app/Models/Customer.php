<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;

    public function getCustomerInfo(){
        return $this->hasOne(Customerinfo::class,'customer_id','id');
    }

    public function getAccounts(){
        return $this->hasMany(Account::class);
    }

    public function getServices(){
        return $this->belongsToMany(Service::class,'customeraccounts',
            'customer_id','service_id');
    }


}
