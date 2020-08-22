<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;
use App\Models\Subject;
use App\Models\SubjectMeta;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    
    public function get_syllabus(Request $request, $id) {
        $subject = DB::table('subjects')->find($id);
        if (!$subject) {
            return response(['message' => 'Subject with id = ' . $id . ' not found'], 400);
        }

        if (Storage::disk('local')->exists('syllabus/' . $subject->code . '.html')) {
            $syllabus = Storage::disk('local')->get('syllabus/' . $subject->code . '.html');
            return $syllabus;
        }
        else {
            return response(['message' => 'Syllabus for subject with id = ' . $id . ' not found'], 400);
        }
    }

    public function add_rating(Request $request, $id) {
        $subject = DB::table('subjects')->find($id);
        if (!$subject) {
            return response(['message' => 'Subject with id = ' . $id . ' not found'], 400);
        }

        $request->validate([
            'author_email' => 'required|email|regex:/^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/',
            'stars' => 'required|numeric|min:1|max:5',
            'comment' => 'nullable',
        ]);

        $data = ['stars' => $request->stars];
        if ($request->comment !== null) $data['comment'] = $request->comment;

        $rating = [
            'category' => 'rating',
            'author_email' => $request->author_email,
            'data' => json_encode($data),
            'subject_id' => $id,
            'created_at' => now(),
            'updated_at' => now()
        ];

        $rid = DB::table('subject_meta')->insertGetId($rating);
        // $rating['id'] = $rid;
        return SubjectMeta::find($rid);
    }
    
    public function get_ratings($id) {
        $subject = DB::table('subjects')->find($id);
        if (!$subject) {
            return response(['message' => 'Subject with id = ' . $id . ' not found'], 400);
        }

        $ratings = SubjectMeta::where([
            ['subject_id', '=', $id],
            ['category', '=', 'rating']
        ])->get();

        $points = 0; $rating = 0; $count = 0; $comments = 0;
        $ones = 0; $twos = 0; $threes = 0; $fours = 0; $fives = 0;
        if ($ratings->count() > 0) {
            foreach($ratings as $item) {
                // $data = json_decode($item->data);
                // $data = $item->data;
                switch ($item->data['stars']) {
                    case 1:
                        $ones++;
                        break;
                    case 2:
                        $twos++;
                        break;
                    case 3:
                        $threes++;
                        break;
                    case 4:
                        $fours++;
                        break;
                    case 5:
                        $fives++;
                        break;
                }
                if (array_key_exists('comment', $item->data)) $comments++;
            }
            $points = $ones + 2 * $twos + 3 * $threes + 4 * $fours + 5 * $fives;
            // $count = $ones + $twos + $threes + $fours + $fives;
            $rating = ceil($points / $ratings->count());
        }
        $summary = ['comments' => $comments, 'rating' => $rating, 'count' => $ratings->count(), 'ones' => $ones, 'twos' => $twos, 'threes' => $threes, 'fours' => $fours, 'fives' => $fives];
        return ['ratings' => $ratings, 'summary' => $summary];
    }


    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function show(Subject $subject)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function edit(Subject $subject)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Subject $subject)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Subject  $subject
     * @return \Illuminate\Http\Response
     */
    public function destroy(Subject $subject)
    {
        //
    }
}
