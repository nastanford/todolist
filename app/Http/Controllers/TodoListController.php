<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ListItem;

class TodoListController extends Controller
{

    public function index()
    {
        return view('todolist',['listItems'=>ListItem::where('is_complete',0)->get()]);
    }

    public function markComplete($id)
    {
        $listItem = ListItem::find($id);
        $listItem->is_complete = 1;
        $listItem->save();
        return redirect()->route('todolist');
    }

    public function saveItem(Request $request) {
        $item = new ListItem();
        $item->name = $request->listItem;
        $item->is_complete = 0;
        $item->save();
        // \Log::info(json_encode($request->all()));
        return redirect()->route('todolist');
    }
}
