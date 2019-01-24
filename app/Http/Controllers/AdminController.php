<?php

namespace App\Http\Controllers;

use DB;
use Schema;
use App\FormTable;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth')->except('search');
    }

    public function index()
    {
        $data['active_class'] = 'forms';

        $data['tables'] = FormTable::all();

        return view('admin.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $data['active_class'] = 'forms';
        $data['table'] = $table_name = FormTable::find($id);
        $data['column_values'] =  DB::table($table_name->form_id)->limit(1)->get();

        // echo $table_name->phone;

        return view('admin.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function updateForm()
    {
        // Get all the table names
        $tables = $data['tables'] = DB::select("SHOW TABLES");

        foreach ($tables as $table) {
            foreach ($table as $key => $value) {
                FormTable::updateOrCreate(
                ['form_id' => $value],
                ['form_id' => $value]);
            }
            
        }

        return redirect()->back();

    }

    public function editForm(Request $request)
    {
        FormTable::where('form_id', $request->form_id)->update([
            'form_name' => $request->form_name
        ]);

        return redirect()->back();
    }

    public function changeColumn(Request $request)
    {
        $table_id = $request->table_id;
        $request->column_name;

        if($request->alias == 'phone') {

            FormTable::find($table_id)->update(['phone' => $request->column_name]);

        } elseif ($request->alias == 'email') {
            
            FormTable::find($table_id)->update(['email' => $request->column_name]);

        } elseif ($request->alias == 'date') {
            
            FormTable::find($table_id)->update(['date' => $request->column_name]);

        } 

        return redirect()->back();
    }

     public function search(Request $request)
     {
        $named_forms = FormTable::whereNotNull('form_name');
        $data = array();

        if($request->phone) {

            $variable = $request->phone;
            // $data = array();

            $named_forms_with_phone = $named_forms->whereNotNull('phone')->get();

            foreach ($named_forms_with_phone as $index => $forms) {

                $results = DB::table($forms->form_id)->where($forms->phone, 'like', '%' . $request->phone . '%')->get();

                if($results->count() > 0) {

                    $data[$index]['form_names'] = $forms->form_name;
                    $data[$index]['form_id'] = preg_replace('/[^0-9]/','', $forms->form_id);

                    foreach ($results as $result) {
                        foreach ($result as $key => $value) {
                            if($key == $forms->phone) {
                                $data[$index]['phones'] = $value;
                            } elseif ($key == $forms->email) {
                                $data[$index]['emails'] = $value;
                            } elseif ($key == $forms->date) {
                                $data[$index]['dates'] = $value;
                            } elseif ($key == 'id') {
                                $data[$index]['id'] = $value;
                            }
                        }
                    }
                }
            }

        } elseif ($request->email) {

            $variable = $request->email;

            $named_forms_with_email = $named_forms->whereNotNull('email')->get();

            foreach ($named_forms_with_email as $index => $forms) {

                $results = DB::table($forms->form_id)->where($forms->email, 'like', '%' . $request->email . '%')->get();

                if($results->count() > 0) {
                    $data[$index]['form_names'] = $forms->form_name;
                    $data[$index]['form_id'] = preg_replace('/[^0-9]/','', $forms->form_id);

                    foreach ($results as $result) {
                        foreach ($result as $key => $value) {
                            if($key == $forms->phone) {
                                $data[$index]['phones'] = $value;
                            } elseif ($key == $forms->email) {
                                $data[$index]['emails'] = $value;
                            } elseif ($key == $forms->date) {
                                $data[$index]['dates'] = $value;
                            } elseif ($key == 'id') {
                                $data[$index]['id'] = $value;
                            }
                        }
                    }
                }
            }
        }

        return view('result')->with([
            'datas' => $data,
            'variable' => $variable
        ]);
     }

     public function resetColumn($form_id)
     {
        FormTable::find($form_id)->update([
            'phone' => '',
            'email' => '',
            'date' => '',
        ]);

        return redirect()->back();
     }


}
