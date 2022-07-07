<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Blotter;
use App\Models\User;
use Illuminate\Http\Request;

class BlotterController extends Controller
{
    public function index()
    {
        $brgys = User::role('brgy')->get();
        
        return view('dashboard.index', compact('brgys'));
    }
    
    public function view(Request $request)
    {
        $search = $request->input('search');
        // dd($search);
        $blotters = Blotter::where('user_id', auth()->user()->id)->where(function($query) use ($search){
            if(!empty($search)){
                $query->where('respondent_firstname', 'like', '%'.$search.'%');
                $query->orWhere('respondent_lastname', 'like', '%'.$search.'%');
            }
        })->latest()->paginate(5);

                
        // dd($blotters);
        
        return view('dashboard.view', compact('blotters'));
    }

    public function store(Request $request)
    {
        // PERMISSIONS ID OF AUTH BRGY
        // $user = User::where('id', auth()->user()->id)->first();
        // $usersPermissions = $user->getDirectPermissions()->first();

        // MUNICIPAL WITH ID OF AUTH BRGY PERMISSION
        $municipalUsers = User::role('municipal')->permission($request->barangay)->first();

        $municipalName = $municipalUsers->permissions->pluck('name');

        // dd($municipalUsers->name);

        $validated = $request->validate([
            'barangay' => ['required'],
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

        // COMPLAINANT IMG
        if($request->hasFile('complainant_img')){
            $fileName = time().$request->file('complainant_img')->getClientOriginalName();
            $path = $request->file('complainant_img')->storeAs('complainant_images', $fileName, 'public');
            $validated["complainant_img"] = '/storage/'.$path;
        }else{
            $validated["complainant_img"] = '/storage/complainant_images/complainantDefault.jpg';
        }

        // RESPONDENT IMG
        if($request->hasFile('respondent_img')){
            $fileName1 = time().$request->file('respondent_img')->getClientOriginalName();
            $path1 = $request->file('respondent_img')->storeAs('respondent_images', $fileName1, 'public');
            $validated["respondent_img"] = '/storage/'.$path1;
        }else{
            $validated["respondent_img"] = '/storage/respondent_images/respondentDefault.png';
        }

        $validated['pass_to'] = 'brgy';
        $validated['approval'] = 'pending';
        $validated['municipal'] = $municipalUsers->name;
        $validated['user_id'] = auth()->user()->id;

        Blotter::create($validated);

        return to_route('dashboard.index')->with('message', 'Blotter Created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $blotter = Blotter::where('id', $id)->first();
        // dd($blotter->case_number);

        if($blotter->user_id === auth()->user()->id){
            if(!empty($blotter->case_number)){
    
                return view('dashboard.show', compact('blotter'));
            }
        }
        
        return to_route('dashboard.view')->with('error', 'Blotter cannot view.');
    }

    public function edit(Blotter $blotter)
    {
        // RESTRICT USER TO OTHER USER
        if ($blotter->user_id === auth()->user()->id) {
            $brgys = User::role('brgy')->get();
        
            return view('dashboard.edit', compact('blotter', 'brgys'));
        }
    
        return abort(404);
    }

    public function update(Request $request, Blotter $blotter)
    {
        $validated = $request->validate([
            'barangay' => ['required'],
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

        // dd($blotter->complainant_img);
        // $image_path = public_path().'/'.$data->filename;
        // unlink($image_path);

        // COMPLAINANT IMG
        if($request->hasFile('complainant_img')){
            $fileName = time().$request->file('complainant_img')->getClientOriginalName();
            $path = $request->file('complainant_img')->storeAs('complainant_images', $fileName, 'public');
            $validated["complainant_img"] = '/storage/'.$path;

            if($blotter->complainant_img != '/storage/complainant_images/complainantDefault.jpg'){
                $image_path = public_path().$blotter->complainant_img;

                if(Blotter::exists($image_path)){
                    unlink($image_path);
                }
            }
        }

        // RESPONDENT IMG
        if($request->hasFile('respondent_img')){
            $fileName1 = time().$request->file('respondent_img')->getClientOriginalName();
            $path1 = $request->file('respondent_img')->storeAs('respondent_images', $fileName1, 'public');
            $validated["respondent_img"] = '/storage/'.$path1;

            if($blotter->respondent_img != '/storage/respondent_images/respondentDefault.png'){
                $image_path1 = public_path().$blotter->respondent_img;

                if(Blotter::exists($image_path1)){
                    unlink($image_path1);
                }
            }
        }

        $blotter->update($validated);

        return to_route('dashboard.view')->with('message', 'Blotter Updated successfully.');
    }

    public function destroy(Blotter $blotter)
    {
        if($blotter->user_id === auth()->user()->id){
            if(empty($blotter->case_number)){
                // COMPLAINANT IMG
    
                if($blotter->complainant_img != '/storage/complainant_images/complainantDefault.jpg'){
                    $image_path = public_path().$blotter->complainant_img;
    
                    if(Blotter::exists($image_path)){
                        unlink($image_path);
                    }
                }
    
                // RESPONDENT IMG
    
                if($blotter->respondent_img != '/storage/respondent_images/respondentDefault.png'){
                    $image_path1 = public_path().$blotter->respondent_img;
    
                    if(Blotter::exists($image_path1)){
                        unlink($image_path1);
                    }
                }
    
                $blotter->delete();
    
                return back()->with('message', 'Blotter deleted.');
            }

            return to_route('dashboard.view')->with('error', "Blotter already approved by brgy.. you cannot be deleted.");
        }

        return to_route('dashboard.view')->with('error', "This is not your blotter.");
    }
}
