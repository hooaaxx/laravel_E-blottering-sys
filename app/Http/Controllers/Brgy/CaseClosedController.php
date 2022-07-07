<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Illuminate\Http\Request;

class CaseClosedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $users = User::where('id', auth()->user()->id)->with('permissions')->first();

        foreach ($users->permissions as $user) {
            $userPermissionName = $user->name;
        }
        $search = $request->input('search');
        
        $blotters = Blotter::where('barangay', $userPermissionName)
                            ->where('approval', 'closed')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);
        return view('brgy.closed.index', compact('blotters'));
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
        //Auth User Permission
        $users = User::where('id', auth()->user()->id)->with('permissions')->first();
        foreach ($users->permissions as $user) {
            $userPermissionName = $user->name;
        }
        
        //Blotter individual brgy
        $blotter = Blotter::where('barangay', $userPermissionName)
                            ->where('id', $id)->get();

        // dd($blotters->user_id);
        foreach($blotter as $blot){
            $blotBrgy = $blot->barangay;
            $blotApproval = $blot->approval;
        }
        // dd($blotBrgy);
        if(!empty($blotBrgy)){
            if($userPermissionName === $blotBrgy && $blotApproval === 'closed'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('brgy.closed.show', compact('blotters'));
            }
            return abort(404);
        }else{
            return abort(404);
        }
    }

    //APPROVE BLOTTER
    public function revive(Request $request, $id)
    {
        $blotter = Blotter::where('id', $id)->first();

        $blotter['approval'] = 'revived';
        $blotter->update();
        
        return to_route('brgy.case-closed.index')->with('message', 'Blotter revive successfully.');
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
}
