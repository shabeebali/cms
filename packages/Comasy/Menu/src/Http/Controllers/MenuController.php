<?php

namespace Comasy\Menu\Http\Controllers;

use Comasy\Menu\Models\Menu;
use Comasy\Menu\Models\MenuItem;
use Comasy\Page\Models\CmsPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::paginate(15);
        return view('menu::admin.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pages = CmsPage::select('id', 'page_title')->get();

        return view('menu::admin.create', ['pages' => $pages]);
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
            'name' => 'required|unique:menus,name'
        ]);
        $model = new Menu($request->only(['name']));
        $model->active = $request->active ? 1 : 0;
        $model->slug = Str::slug($request->name, '_');
        $model->save();
        foreach ($request->items as $item) {
            $itemModel = new MenuItem($item);
            $model->items()->save($itemModel);
        }
        return redirect(route('admin.menus.index'))->with('success', 'Menu Created Successfully');
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
        $pages = CmsPage::select('id', 'page_title')->get();
        $model = Menu::with('items')->find($id);
        return view('menu::admin.edit', ['menu' => $model, 'pages' => $pages]);
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
        $request->validate([
            'name' => 'required|unique:menus,name,' . $id
        ]);
        $model = Menu::find($id);
        $model->name = $request->name;
        $model->active = $request->active ? 1 : 0;
        $model->slug = Str::slug($request->name, '_');
        $model->save();
        $model->items()->delete();
        foreach ($request->items as $item) {
            $itemModel = new MenuItem($item);
            $model->items()->save($itemModel);
        }
        return redirect(route('admin.menus.index'))->with('success', 'Menu Updated Successfully');
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
