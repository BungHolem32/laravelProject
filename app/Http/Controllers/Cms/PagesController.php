<?php

namespace app\Http\Controllers\Cms;

use App\Http\Models\DataMapper\PagesModel;
use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Routing\Controller;

/**
 * @property PagesModel model
 * @property array controllerPath
 * @property array controllerName
 */
class PagesController extends Controller
{
    /**
     * PagesController constructor.
     */
    public function __construct(PagesModel $pagesModel)
    {
        $this->model = $pagesModel;
        $this->controllerPath = $this->model->getControllerPath();
        $this->controllerName = $this->model->getControllerName();

    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()

    {
        return view('cms.pages.main.pages.index', [
            'controllerName' => $this->controllerName,
            'controllerPath' => $this->controllerPath
        ]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        dd($request);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
