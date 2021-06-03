<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\services\PayUservice\Exception;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Mywork;



class MyworkController extends Controller
{
    public function __construct(Mywork $member)
    {
        $this->exception = 'home';
        $this->member = $member;
    }
    public function index()
    {
        try {
            $members = $this->member->getAllMemberList();
            return view('dashboard.member.index', compact('members'));

        } catch (\Exception $e) {
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }
    public function add(Request $request)
    {
        try {
            if ($request->isMethod('post')) {
                $validator = $this->getValidateMember($request->all());
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                if ($this->member->saveMember($request)) {
                    return redirect()->route('member-list');
                }
            }
            return view('dashboard.member.add');
        } catch (\Exception $e) {
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }

    }
    public function edit(Request $request, $id)
    {
        try {
            $member = Mywork::findOrFail($id);
            if ($request->isMethod('post')){
                if ($this->member->editMember($member, $request)) {
                     return redirect()->route('member-list');
                }
            }
            return view('dashboard.member.edit', compact('member'));

        } catch (\Exception $e) {
             return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }
    public function memberDelete($sid)
    {
        try {
            Mywork::where('id', $sid)->update(['is_deleted' => 1]);
            return redirect()->route('member-list');
        } catch (\Exception $e) {
            return redirect()->route($this->exception)->with('warning', $e->getMessage());
        }
    }
    protected function getValidateMember($data)
    {
        $rule =[
            'name' => 'required',
            'email' => 'required',
            'mobile' => 'required',
            'city' => 'required',
            'address' => 'required',
        ];
        $errmsg = [
            'name.required' => 'Please enter name',
            'email.required' => 'Please enter email',
            'mobile.required' => 'Please enter mobile',
            'city.required' => 'Please enter city',
            'address.required' => 'Please enter address',
        ];
        return Validator::make($rule, $errmsg, $data);
    }


}
