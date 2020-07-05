<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\generalModels as gm;
use Illuminate\Support\Facades\DB;

class articleController extends Controller
{
    protected $table = "articles";

    public function index()
    {
        $table = $this->table;

        $read = gm::read($table);
        return view('article.index', compact('read'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $read = gm::read("tags");
        return view('article.create', compact('read'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $insert = function () {
        $data = $request->all();
        unset($data["_token"]);
        $data['slug'] = Str::slug($data['title']);
        $table = $this->table;
        foreach ($data['tag'] as $t) {
            $data['tag'] = $t;
            $data['user_id'] = 1;
            gm::insert($table, $data);
        }
        return redirect('/');
        // };
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $article = gm::readId("articles", $id);
        $read = gm::read("tags");
        return view('article.edit', with([
            'read' => $read,
            'article' => $article
        ]));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {
        $data = $request->all();
        unset($data["_token"]);
        $update = gm::update($this->table, $id, $data);
        if ($update) {
            return redirect("/artikel");
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
