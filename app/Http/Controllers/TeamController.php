<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Member;


class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $members = Member::all();
        // return ($members);
        return view('member.index', compact('members'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('member.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd('test');
        $request-> validate([
            'name'=> 'required', 
            'phone'=> 'required', 
            'dob'=> 'required', 
            'gender'=> 'required', 
            'position'=> 'required'
        ]);
        Member::create([
            'name'=> $request->name, 
            'phone'=> $request->phone, 
            'dob'=> $request->dob, 
            'gender'=> $request->gender, 
            'position'=> $request->position
        ]);
        return redirect('members');
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
       $member = Member::find($id);
    //    dd($member);
        return view('member.edit', compact('member'));
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
        // dd('test');
        
        Member:: find($id)->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'dob' => $request->dob,
            'gender' => $request->gender,
            'position' => $request->position
        ]);
        return redirect('members')
        ->with('successAlert', 'You are successfully updated');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Member::find($id)->delete();
       return redirect('members')->with('successAlert', 'You have successfully deleted');
    }
}
