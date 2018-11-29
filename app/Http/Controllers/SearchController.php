<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FormTable;
use DB;

class SearchController extends Controller
{
    public function form()
    {
    	$data['forms'] = FormTable::whereNotNull('form_name');

    	return view('search.form', $data);
    }

    public function searchFormResults(Request $request)
    {
    	$request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);

        $form = FormTable::find($request->id);
        $table_name = $form->form_id;

        $numbers = DB::table($table_name)
        	->where('date_created', '>=', $request->from)
        	->where('date_created', '<=', $request->to)
        	->pluck($form->phone);

    	// Time to go through all the forms that are store in the form_table table

    	$all_forms = FormTable::whereNotNull('form_name')->get();
    	$results = [];
    	$counter = 0;

    	foreach ($all_forms as $index => $form) {

    		if(isset($form->phone)) {
    			$query = DB::table($form->form_id)->whereIn($form->phone, $numbers);

	    		if($form->form_id == $table_name)
				continue;

	    		if($query->count() > 0) {
	    			$results[$counter]['form_name'] =  $form->form_name; 
	    			$results[$counter]['count'] =  $query->count(); 
	    			$counter++;
	    		}
    		}

    		
    		
    	}

    	return view('search.form_results', compact('results'));

    }

    public function formToForm()
    {
        $data['forms'] = FormTable::whereNotNull('form_name');

        return view('search.form_to_form', $data);
    }

    public function resultFormToForm(Request $request)
    {
        $request->validate([
            'from' => 'required',
            'to' => 'required',
        ]);

        $form_1 = FormTable::find($request->id_1);
        $form_2 = FormTable::find($request->id_2);


        $table_name_1 = $form_1->form_id;

        $numbers_form_1 = DB::table($table_name_1)
            ->where('date_created', '>=', $request->from)
            ->where('date_created', '<=', $request->to)
            ->pluck($form_1->phone);

        if(isset($form_2->phone)) {
            $query = DB::table($form_2->form_id)->whereIn($form_2->phone, $numbers_form_1);

            $total = DB::table($form_2->form_id)->count();

            $result['form_name'] =  $form_2->form_name; 
            $result['count'] =  $query->count();
            $result['not_matched'] = $total - $query->count();

        }

        return view('search.form_to_form_results', compact('result'));
    }
}
