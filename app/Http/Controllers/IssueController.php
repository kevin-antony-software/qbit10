<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Issue;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

class IssueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $arr['issues'] = Issue::All();
        //$arr['comments'] = Comment::all();
        return view('issue.index')->with($arr);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('issue.create');
       
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|unique:issues|max:255',
        ]);

        $issue = new Issue();
        $issue->title = $request->title;
        $issue->body = $request->body;
        $issue->save();
        return redirect()->route('issues.index');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function show(Issue $issue)
    {
        return Issue::where('id', $issue->id)->get();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function edit(Issue $issue)
    {
        $arr['issue'] = $issue;
        return view('issue.edit')->with($arr);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Issue $issue)
    {
        $validatedData = $request->validate([
            'title' => ['required', Rule::unique('issues', 'title')->ignore($issue->id)],
        ]);
        $issue->title = $request->title;
        $issue->body = $request->body;
        $issue->uuid = $request->uuid;
        $issue->slug = $request->slug;
        $issue->save();
        return redirect()->route('issues.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Issue  $issue
     * @return \Illuminate\Http\Response
     */
    public function destroy(Issue $issue)
    {
        $issue->delete();
        return redirect()->route('issues.index');
    }
}
