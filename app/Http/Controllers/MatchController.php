<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Match;

use DB;
use App\User;

use Auth;

use App\Http\Requests\MatchFormRequest;

use App\Http\Requests\ResultFormRequest;


class MatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $table=Match::orderBy('updated_at','desc')->get();
        return view('match')->with('table',$table);
    }
        
    public function indexAdmin()
    {
        //
        $table=Match::orderBy('updated_at','desc')->get();
        return view('match2')->with('table',$table);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $table=Match::all();
        return view('matchcreate')->with('table',$table);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MatchFormRequest $request)
    {
        //
        $table = $request->all();
        $delElement = array_shift($table);
        Match::create($table);
        return redirect('matchcreate');

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
        $countBet = DB::table('bets')->where('match_id',$id)->count();
        $table=Match::find($id);
        if($countBet!=0) return redirect('match2')->with('errors','The match '.$table->home_team.' - '.$table->guest_team.' is already betted');
        return view('matchmodify')->with('table',$table);
    }

    public function show2($id)
    {
        //
        $table=Match::find($id);
        if(strtotime($table->bet_time) < time()) return redirect('match');
        if ($table->permision == 'private') return redirect('match');
        return view('bet')->with('row',$table);
    }

    public function showDetail($id)
    {
        //
        $table=Match::find($id);
        return view('matchdetail')->with('id',$table);
    }

    public function showResult($id)
    {
        $table=Match::find($id);
        if(strtotime($table->end_time) > time()) return redirect('match');
        return view('matchresult')->with('table',$table);
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
    public function update(MatchFormRequest $request, $id)
    {
        //
        $table = $request->all();
        $delElement = array_shift($table);
        Match::where('id',$id)->update($table);
        return redirect('match2');
    }

    public function updateResult(ResultFormRequest $request, $id)
    {
        $table = $request->all();
        $delElement = array_shift($table);
        Match::where('id',$id)->update($table);

        $betMoney = DB::table('bets')->where('match_id',$id)->select('user_id','money');
        $table2 = DB::table('bets')
        ->join('matches', 'bets.match_id', '=', 'matches.id')
        ->join('users', 'bets.user_id', '=', 'users.id')
        ->where('status',1)
        ->select('bets.money','bets.choose','matches.home_ratio','matches.guest_ratio','matches.tie_ratio','users.id','home_score','guest_score')
        ->get();
        foreach ($table2 as $row) {
            $money_get=0;
            if(($row->home_score > $row->guest_score) && ($row->choose =='home'))
            $money_get=$row->money*$row->home_ratio;
            if(($row->home_score < $row->guest_score) && ($row->choose =='guest'))
            $money_get=$row->money*$row->home_ratio;
            if(($row->home_score == $row->guest_score) && ($row->choose =='tie'))
            $money_get=$row->money*$row->home_ratio;
            $usermoney=User::find($row->id)->money;
            $moneySum=$money_get+$usermoney;
            $user = User::where('id',$row->id)->update(['money'=>$moneySum]);
        }
        return redirect('match2');
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
        $countBet = DB::table('bets')->where('match_id',$id)->count();
        $table=Match::find($id);
        if($countBet!=0) return redirect('match2')->with('errors','The match '.$table->home_team.' - '.$table->guest_team.' is already betted');
        $table->delete();
        return redirect('match2');
    }
}
