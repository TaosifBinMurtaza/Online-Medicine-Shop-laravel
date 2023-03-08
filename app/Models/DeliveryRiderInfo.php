<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DeliveryRiderInfo extends Model
{
    use HasFactory;
    protected $table='deliverymans';
    protected $primaryKey='delman_id';

    public $timestamps=false;
}