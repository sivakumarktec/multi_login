<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Repositories\CommentRepository;
use App\Validators\CommentValidator;
use \Prettus\Validator\Exceptions\ValidatorException;
use Response;
use Flash;

class CommentsController extends Controller
{

    private $commentRepository;
    private $commentValidator;

    public function __construct(CommentRepository $commentRepository, CommentValidator $commentValidator)
    {
        $this->commentRepository = $commentRepository;
        $this->commentValidator = $commentValidator;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return 22;
        $comments = $this->commentRepository->all()->toJson();
        // var_dump($comments);
        // die();
        // $comment = $comments[0];
        // return print_r($comment,true);
        // $comments = $this->commentRepository->scopeQuery(function($query){
        //     return $query->orderBy('sort_order','asc');
        // })->all();
        // return $comments;
        // $comments = $this->commentRepository->paginate($limit = 10, $columns = ['*']);
        return view('comments.table',['comments'=>json_decode($comments)]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $this->commentValidator->with( $request->all() )->passesOrFail();
            $comment = $this->commentRepository->create( $request->all() );

            
            return redirect()->back()->with('status', 'Comments added');

        } catch (ValidatorException $e) {

            return redirect()->back()->with('error', 'Unxepected Error');

        }
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
        //
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
