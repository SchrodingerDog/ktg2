<?php

class NewsController extends \BaseController {

	public function __construct()
    {
        // $this->beforeFilter('auth|admin', array('except' => 'index'));
        $this->beforeFilter('admin', array('except' => 'index'));

        $this->beforeFilter('csrf', array('except' => ['index', 'create', 'show', 'edit', 'delete']));
    }


	/**
	 * Display a listing of news
	 *
	 * @return Response
	 */
	public function index()
	{
		$news = News::all();

		return View::make('news.index', compact('news'));
	}

	/**
	 * Show the form for creating a new news
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('news.create');
	}

	/**
	 * Store a newly created news in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$news = new News;
		if ($news->save()) {
            return Redirect::route('news.index')->with('message', ['success','News stworzony!']);
        } else {
            return Redirect::to(URL::previous())->withErrors($news->errors());
        }
		return Redirect::route('news.index');
	}

	/**
	 * Display the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$news = News::findOrFail($id);

		return View::make('news.show', compact('news'));
	}

	/**
	 * Show the form for editing the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$news = News::find($id);

		return View::make('news.edit', compact('news'));
	}

	/**
	 * Update the specified news in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$news = News::findOrFail($id);
		if ($news->save()) {
            return Redirect::route('news.index')->with('message', ['success','News zaktualizowany!']);
        } else {
            return Redirect::to(URL::previous())->withErrors($news->errors());
        }

		return Redirect::route('news.index');
	}

	/**
	 * Show the form for editing the specified news.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function delete($id)
	{
		$news = News::find($id);

		return View::make('news.delete', compact('news'));
	}

	/**
	 * Remove the specified news from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		News::destroy($id);

		return Redirect::route('news.index')->with('message', ['success','News usunięty!']);
	}

}
