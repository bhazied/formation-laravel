<?php

namespace App\Http\Controllers;

use App\State;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exception;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $states = State::paginate(config('paginate.state'));
       return view('state.index', compact('states'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $state = new State();
        return view('state.create', compact('state'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*$state = new State();
        $state->name = $request->get('name');
        $state->save();*/
        try{
            $state =  State::create($request->all());
            Session::flash('success', 'insert success');
            return redirect('/states');
        } catch(\Exception $ex){
            Session::flash('error', 'insert failed with some errors ');
            return redirect('/states/create');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        try{
            $state = State::findOrFail($id);
            return view('state.edit', compact('state'));
        }
        catch (\Exception $ex){
            Session::flash('info', 'le state avec id '.$id.' non trouvable');
            return redirect('/states');
        }

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
        try{
            /*$state = new State();
            $state->name = $request->get('name');
            $state->save();*/
            $data = ['name' => $request->get('name')];
            State::where('id',  $id)->update($data);
            Session::flash('success', 'update success');
            return redirect(route('states.index'));
        }
        catch (\Exception $ex){
            Session::flash('error', 'update failed with some errors ');
            return redirect(route('states.edit', ['id' => $id]));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(State::destroy($id)){
            Session::flash('success', 'delete success');
        }
        else{
            Session::flash('error', 'delete failed with some errors ');
        }
        return redirect(route('states.index'));
    }

}
