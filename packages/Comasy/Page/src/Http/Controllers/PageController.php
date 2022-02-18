<?php

namespace Comasy\Page\Http\Controllers;

use Comasy\Page\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pages = CmsPage::paginate(15);
        return view('page::admin.index', ['pages' => $pages]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('page::admin.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'page_title' => 'required',
            'url_key' => 'unique:cms_pages,url_key'
        ]);
        $model = new CmsPage($request->only('page_title', 'html_content'));
        $model->active = $request->active ? 1 : 0;
        $model->url_key = $request->url_key ?: Str::slug($request->page_title, '-');
        $model->meta_title = $request->meta_title ?: $request->page_title;
        $model->save();
        return redirect(route('admin.pages.index'))->with('success', 'Page Created Successfully');
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
        $page = CmsPage::find($id);
        return view('page::admin.edit', ['data' => $page]);
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
        $model = CmsPage::find($id);
        $request->validate([
            'page_title' => 'required',
            'url_key' => 'unique:cms_pages,url_key,' . $id
        ]);
        $model->active = $request->active ? 1 : 0;
        $model->page_title = $request->page_title;
        $model->html_content = $request->html_content;
        if ($request->url_key) {
            $model->url_key = $request->url_key;
        }
        if ($request->meta_title) {
            $model->meta_title = $request->meta_title;
        }
        $model->save();
        return redirect(route('admin.pages.index'))->with('success', 'Page Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $model = CmsPage::find($id);
        $model->delete();
        return redirect(route('admin.pages.index'))->with('info', 'Page Deleted Successfully');
    }
}
