<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ClientRequest;
use App\Models\Contact;
use DB;

class ContactController extends Controller
{
    public function index()
    {
        return view('form');
    }

    public function show()
    {
        return view('confirm');
    }

    public function complete()
    {
        return view('thanks');
    }

    public function overview()
    {
        $posts = Contact::Paginate(10);
        return view('management', ['posts' => $posts]);
    }

    public function check(Request $request)
    {
        $post = $request->session()->get("form_input");
        return view("confirm", ["post" => $post]);
    }

    public function confirm(ClientRequest $request)
    {
        $post = $request->all();
        $request->session()->put("form_input", $post);
        return redirect()->route('show.get');

    }

    public function store(Request $request)
    {
        if($request->has('send'))
        {
        $post = $request->session()->get("form_input");
        Contact::create($post);
        return redirect()->route('thanks.get');
        }
        elseif($request->has('revise'))
        {
        $post = $request->session()->get("form_input");
        return redirect('/')->withInput('$post');
        }
    }

    public function destroy(Int $id)
    {
        Contact::destroy($id);
        return redirect()->route('management.get');
    }

    // public function find(Request $request)
    // {
    //     $posts = Contact::where('fullname','LIKE',"%{$request->fullname}%")->get();
    //     $param = ['fullname' => $request->fullname, 'posts' => $posts];
    //     return view('management', $param);
    // }
    public function find(Request $request)
    {
        $posts = Contact::paginate(10);
        $fullname = $request->input('fullname');
        $query = Contact::query();
        if($fullname !== NULL){
            $spaceConversion = mb_convert_kana($fullname, 's');
            $wordArraySearched= preg_split('/[\s,]+/', $spaceConversion, -1, PREG_SPLIT_NO_EMPTY);
            foreach($wordArraySearched as $value) {
                $query->where('fullname', 'like', '%'.$value.'%');
            }
            $posts = $query->paginate(10);
        }
        return view('management')->with([
                'posts' => $posts,
                'fullname' => $fullname,
        ]);
    }

}
