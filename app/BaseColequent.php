<?php
namespace App;
use Jenssegers\Mongodb\Eloquent\Model as Eloquent;

// Base Collection Elequent
class BaseColequent extends Eloquent {
    protected $connection = 'mongodb';
}