<?php

namespace App\Http\Controllers;

use App\Annonce;
use App\Category;
use App\Http\Requests\annonceRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class AnnonceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $annonces = Annonce::valid()->get();
        return view('annonce.index', compact('annonces'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::pluck('name', 'id')->all();
        $annonce = new Annonce();
        return view('annonce.create', compact('categories', 'annonce'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(annonceRequest $request)
    {
        /*$validator = Validator::make($request->all(), Annonce::$rules);
        if($validator->fails()){
            return redirect('/annonces/create')->withInput()->withErrors($validator);
        }*/
        try{
            $data = $request->all();
            $data['creator_user_id'] = Auth::user()->id;
            $annonce =  Annonce::create($data);
            Session::flash('success', 'insert success');
            return redirect('/annonces');
        } catch(\Exception $ex){
            Session::flash('error', "impossible d'ajjouter une nouvelle annonce");
            return redirect('/annonces/create')->withInput();
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
        $annonce = Annonce::findOrFail($id);
        $categories = Category::pluck('name', 'id')->all();
        return view('annonce.edit', compact('annonce', 'categories'));
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
            $data = $request->all();
            unset($data['_token']);
            unset($data['_method']);
        Annonce::where('id',  $id)->update($data);
        Session::flash('success', 'update success');
        return redirect(route('annonces.index'));
    }
    catch (\Exception $ex){
        Session::flash('error', 'update failed with some errors ');
        return redirect(route('annonces.edit', ['id' => $id]));
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
        Annonce::destroy($id);
        Session::flash('success', 'delete success');
        return redirect('/annonces');
    }
}
