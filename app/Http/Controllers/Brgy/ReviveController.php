<?php

namespace App\Http\Controllers\Brgy;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Illuminate\Http\Request;

class ReviveController extends Controller
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
                            ->where('approval', 'revived')
                            ->where(function($query) use ($search){
                                if(!empty($search)){
                                    $query->where('complainant_firstname', 'like', '%'.$search.'%');
                                    $query->orWhere('complainant_lastname', 'like', '%'.$search.'%');
                                }
                            })->latest()->paginate(5);

        return view('brgy.revive.index', compact('blotters'));
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
            if($userPermissionName === $blotBrgy && $blotApproval === 'revived'){
                $blotters = Blotter::where('id', $id)->get();
    
                return view('brgy.revive.show', compact('blotters'));
            }
            return abort(404);
        }else{
            return abort(404);
        }
    }

    //PASS BLOTTER TO MUNICIPAL
    public function pass(Request $request, $id)
    {
        // GET BLOTTER ID
        $blotter = Blotter::where('id', $id)->first();
        
        $blotter['approval'] = 'passed';
        $blotter['pass_to'] = 'municipal';
        $blotter->update();
        
        return to_route('brgy.revive.index')->with('message', 'Blotter pass to municipal successfully.');
    }

    //CLOSE BLOTTER
    public function close(Request $request, $id)
    {
        $blotter = Blotter::where('id', $id)->first();

        // dd($blotter);
        $blotter['approval'] = 'closed';
        $blotter->update();
        
        return to_route('brgy.revive.index')->with('message', 'Blotter closed successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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

        if(!empty($blotBrgy)){
            if($userPermissionName === $blotBrgy && $blotApproval === 'revived'){
                $blotter = Blotter::where('id', $id)->first();

                return view('brgy.revive.edit', compact('blotter'));
            }

            return abort(404);

        }else{
            return abort(404);
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
        $blotter = Blotter::where('id', $id)->first();

        $validated = $request->validate([
            'complainant_firstname' => ['required'],
            'complainant_lastname' => ['required'],
            'complainant_number' => ['required', 'min:11'],
            'complainant_address' => ['required'],
            'respondent_firstname' => ['required'],
            'respondent_lastname' => ['required'],
            'respondent_number' => ['required', 'min:11'],
            'respondent_address' => ['required'],
            'when' => ['required'],
            'where' => ['required'],
            'what' => ['required']
        ]);

        $blotter->update($validated);

        return to_route('brgy.revive.index')->with('message', 'Blotter Updated successfully.');
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
