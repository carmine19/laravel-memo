<?php

namespace App\Http\Controllers;

use App\Models\Memo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;


class MemoController extends Controller
{

    /**
     * 
     * api/memo/index
     */ 

     public function apiMemo()
     {
         
         $headers = [
             'Authorization' => 'Bearer ' . Session::get('token'),
             'Accept'        => 'application/json',
         ];
         $memos = DB::table('memos')
         ->leftJoin('users', 'users.id', '=', 'users.id')
         ->paginate(20);;
          return response()->json($memos, 200, $headers);
     }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    
    {

        /* questa variabile ci permette di accettare i paramentri che ci arrivano dalla Request
        e di accedere ai valori tramite il metodo get, se non ci arrivano valori viene restituito un array vuoto
        , se ci arrivano valori viene restituito un array con i valori, ricordiamoci che la variabile $filter è 
        definita nella memo.index nel form di ricerca.
        */         
        $filter = $request->query('filter');
        /* qui leggo lo user corrente e lo uso come verifca in $memos per ritornami tutti i valori
        del utente loggato ed a cui fanno riferimento i suoi memo, le due tabelle sono collegate tramite 
        foreign key sia dalle migrazione che dai model*/
        $user_id = Auth::user()->id;

        /*
        qui verifico che il campo non sia vuoto, se non lo è allora vuol dire che l'utente ha digitato qualcosa,
        la query di ricerca è composta da due parti, la prima parte è la query di base, che prende tutti i valori,
        la seconda parte è la query di filtro, che prende i valori che l'utente ha digitato e li confronta con i valori
        della prima parte, se il valore digitato è uguale a quello della prima parte allora il valore viene inserito in un array
        che poi viene passato alla view, se il valore digitato non è uguale a quello della prima parte allora il valore viene inserito
        */
        if(!empty($filter)){
            $memos = Memo::where('user_id', $user_id)->where('title', 'LIKE', '%'.$filter.'%')->latest()->paginate(20);
        }else{
            $memos = Memo::where('user_id', $user_id)->latest()->paginate(9);
        }

        return view('memo.index', compact('memos', 'filter'));

    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $user_id = Auth::user()->id;
        $memo = Memo::all();

        return view('memo.create', compact('memo', 'user_id'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Memo $memo)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'user_id' => 'nullable|exists:user,id',
        ]);

        $form_data = $request->all();
        $form_data['user_id'] = Auth::user()->id;

        $memo->fill($form_data);

        $memo->save();

        return redirect()->route('memo.index')->with('success','Memo creata correttamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

        $memo = Memo::where('id', $id)->first();

        if($memo) {
            return view('memo.show', compact('memo'));
        }else {
            abort(404);
        }


    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $memo = Memo::where('id', $id)->first();

        if($memo) {

            $data = [
            'memo' => $memo,
        ];

        return view('memo.edit', $data);

        }else{
            abort(404);
        }

    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Memo $memo)
    {
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'user_id' => 'nullable|exists:user,id',
        ]);

        $form_data = $request->all();

        $memo->update($form_data);

        return redirect()->route('memo.index')->with('edit','Memo modificata correttamente');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Memo  $memo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Memo $memo)
    {
        $memo->delete();

        return redirect()->route('memo.index')->with('warning','Memo eliminata');
    }
}
