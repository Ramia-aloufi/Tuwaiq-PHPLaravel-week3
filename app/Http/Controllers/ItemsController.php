<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ItemGroup;
use App\Models\Items;
class ItemsController extends Controller
{

    public function getItemGroup($id = null){
        $data=ItemGroup::All();
        $existingValue = ($id) ? ItemGroup::findOrFail($id) : null;
        // $issave=true;
        return view('itemgroup',['data'=>$data,'existingValue'=>$existingValue]);

    }
    public function saveItemGroupName(Request $request){
        $data = ItemGroup::create([
            'itemGroupName' => $request->itemGroupName

        ]);
        $data->save();
        return redirect('/item-group');

    }
    public function delGroup($x){
        $item = ItemGroup::find($x);
        $item->delete();
        return redirect('/item-group');

    }
    public function editGroup($x){
        $item = ItemGroup::where('id',$x)
        ->first();
        return view('itemgroup' ,['existingValue'=>$item]);

    }
    public function updateGroup(Request $request){
        // dd($request);
        $item = ItemGroup::find($request->id);
        $item->itemGroupName = $request->itemGroupName;
        $item->save();
        return redirect('/item-group');

    }

    // Items
    public function getItem($id = null){
        $data=Items::All();
        $group=ItemGroup::All();
        $existingValue = ($id) ? Items::findOrFail($id) : null;

        return view('items',['data'=>$data,'group'=>$group, 'existingValue'=>$existingValue]);

    }
    public function saveItem(Request $request){
        $data = Items::create([
            'itemName' => $request->itemName,
            'itemGroupNum' => $request->itemGroupNum,
            'price' => $request->price,
            'qty' => $request->qty,
            'color' => $request->color
         ]);
        $data->save();
        return redirect('/items');

    }
    public function delItem($x){
        $item = Items::find($x);
        $item->delete();
        return redirect('/items');

    }

    public function updateItem(Request $request){
        // dd($request);
        $item = Items::find($request->id);
        $item->itemName = $request->itemName;
        $item->itemGroupNum = $request->itemGroupNum;
        $item->price = $request->price;
        $item->qty = $request->qty;
        $item->color = $request->color;

        $item->save();
        return redirect('/items');

    }


}
