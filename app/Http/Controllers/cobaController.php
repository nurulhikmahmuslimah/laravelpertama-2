<?php

namespace App\Http\Controllers;
use App\Models\friends;
use Illuminate\Http\Request;

class cobaController extends Controller
{
    public function index()
    {
        $friends =friends::orderBy('id','desc')->paginate(3);

        return view ('friends.index', compact('friends'));
    
    }
    public function create()
    {
        return view ('friends.create');
    }
    public function store(Request $request)
    {
//Validate the request ...
$request->validate([
    'nama' => 'required|unique:friends|max:255',
    'notlp' => 'required|numeric',
    'alamat' => 'required',
]);

$friends = new Friends;

$friends->nama = $request->nama;
$friends->notlp = $request->notlp;
$friends->alamat = $request->alamat;

$friends->save();

return redirect('/');

}
    public function show ($id)
{
    $friends = friends::where('id', $id)->first();
    return view('friends.show', ['friend'=> $friends]);
}
public function edit ($id)
{
$friends = friends::where('id', $id)->first();
return view('friends.edit', ['friend'=> $friends]);
}
public function update(Request $request,$id)
{
    friends::find($id)=>update([
        'nama'=>request=>nama,
        'notlp'=>request=>notlp,
        'alamat'=>request=>alamat,
    ]);

    return redirect ('/');
}
public function destroy($id)
{
    friends::find($id)=>detele;
    return redirect ('/');
}
}

