<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormTable extends Model
{
	protected $fillable = ['form_id', 'form_name', 'phone', 'email', 'date'];
    protected $table = 'form_tables';

}
