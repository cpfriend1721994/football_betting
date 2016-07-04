<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Bet;

use App\User;

use Auth;

class BetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table=Bet::all();
        return view('bet2')->with('table',$table);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        //
        /*$delElement = array_shift($table);*/
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $user=User::find(Auth::id());
        $moneybet = $user->money;
        if($request->money > $moneybet){
            $route_error = 'bet/' .$request->match_id;
            return redirect($route_error)->with('errors','You bet '.$request->money.' coins but you just have '.$moneybet.' coins');
        } 
        Bet::create(
            array(
                'match_id' => $request->match_id,
                'user_id' => $request->user_id,
                'money' => $request->money,
                'choose' => $request->choose
                )
        );
            
        $moneybet=$moneybet-$request->money;
        User::where('id',Auth::id())->update(['money' => $moneybet]);

        return redirect('match');
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
}
