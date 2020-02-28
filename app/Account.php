<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    /**
     * The table associated with the model
     *
     * @var string
     */
    protected $table = 'accounts';

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * List of fillable propertyes
     *
     * @var array
     */
    protected $fillable = [
        'firstName',
        'lastName',
        'email',
        'companyName',
        'position',
        'phone1',
        'phone2',
        'phone3'
      ];
}
