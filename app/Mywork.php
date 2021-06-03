<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use DB;

class Mywork extends Model
{
    protected $fillable = [
        'name', 'shop_name', 'email', 'contact', 'city', 'address',
    ];

    public function getAllMemberList()
    {
        return Mywork::where('is_deleted',0)->get();
    }

    public function saveMember(Request $request)
    {
        $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'shop_name', 'email', 'contact', 'city', 'address');
        $saveResult = Mywork::create($data);
        if ($saveResult) {
            DB::commit();
        }else {
            DB::rollback();
        }
        return $saveResult;
    }
    public function  editMember(Mywork $member, Request $request)
    {
         $saveResult = false;
        DB::beginTransaction();

        $data = $request->only('name', 'shop_name', 'email', 'contact', 'city', 'address');
        $saveResult = $member->fill($data)->save();
        if ($saveResult) {
            DB::commit();
        }else {
            DB::rollback();
        }
        return $saveResult;
    }

}
