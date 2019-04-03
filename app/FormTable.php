<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTable extends Model
{
	protected $fillable = ['form_id', 'form_name', 'first_name', 'last_name', 'phone', 'email', 'date'];
    protected $table = 'form_tables';

}
