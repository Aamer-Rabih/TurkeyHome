<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\unit;
use App\Lesson;
use App\Comment;
use App\Reply;
use Auth;
use App\Role;

class LessonsController extends Controller
{

    public function __construct()
    {
    
    $this->middleware('auth');
    
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lessons = Lesson::latest()->get();
        return view('admin.lessons.index',compact('lessons'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $selectedUnit = request()->filled('selectedunit') ? Unit::findOrFail(request()->selectedunit) : null ;
        $units = Unit::all();
        return view('admin.lessons.create',compact('selectedUnit','units'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,Unit $unit = null)
    {
        $request->validate([
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => 'required',
            'intro' => 'required'
        ]);

        
        //Prepare data to save 

        $attributes['title'] = $request->title ; 
        $attributes['type'] = $request->type ;
        $attributes['active'] = $request->active ? true : false ;
        $attributes['intro'] = $request->intro ;

        //save File 
        if($request->hasFile('src')){

            $attributes['src'] = $request->src->store('public/lessons');

        }

         //Persist data in the database 
         $lesson = Lesson::create($attributes);

         if($unit != null){
             $unit->lessons()->attach($lesson);
         }

         //Return redirect 
        return redirect()
        ->route('lesson.show', ['lesson' => $lesson->id])
        ->with('success', 'تم إنشاء الدرس بنجاح');
    }

    /**
     * Display the specified resource.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function show(Lesson $lesson)
    {
        $comments = $lesson->comments()->with('commenter')->get();
        //$comments = Comment::where('lesson_id',$lesson->id)->get();
        return view('admin.lessons.show',compact('lesson','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        
        return view('admin.lessons.edit',compact('lesson'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lesson $lesson)
    {
        $request->validate([
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => '',
            'intro' => 'required'
        ]);

        $lesson->title = $request->title ;
        $lesson->type = $request->type ;
        $lesson->intro =$request->intro;  
        $lesson->active = $request->active ? true : false ;  

        if($request->hasFile('src')) {
            Storage::delete($lesson->src);
            $lesson->src = $request->src->store('public/lessons');
        }

        $lesson->save();

        //Return redirect 
        return redirect()
            ->route('lesson.show', ['lesson' => $lesson->id])
            ->with('success', 'تم تعديل الدرس بنجاح');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lesson $lesson)
    {
        //Delete The lesson file
        Storage::delete($lesson->src);

        //Delete lesson from db
        $lesson->delete();

        return redirect()->back()
       ->with('success','تم حذف الدرس بنجاح');
    }

    public function activate(Lesson $lesson){

        $lesson->makeActive();
        
        $lesson->save();
        
        return redirect()->route('lesson.show', ['lesson' => $lesson->id])
                ->with('success','تم تفعيل الدرس بنجاح');
    }

     /**
      * Action to deactivate A lesson
      */
      public function deactivate(Lesson $lesson){
        $lesson->makeInactive();
        $lesson->save();

        return redirect()->route('lesson.show', ['lesson' => $lesson->id])
                ->with('success', 'تم إلغاء تفعيل الدرس بنجاح');

      }

      public function addComment(Request $request,Lesson $lesson)
      {
         $request->validate([
             'content' => 'required'
         ]);
         $user = Auth::user();
         $comment = new Comment();
         $comment->content = $request->content;
         $comment->commenter_id = $user->id;

         if($user->hasRole(Role::ADMIN))
         {
             $comment->commenter_type = 'admin';
         }elseif($user->hasRole(Role::MANAGER))
         {
            $comment->commenter_type = 'manager'; 
         }elseif($user->hasRole(Role::TEACHER))
         {
            $comment->commenter_type = 'teacher'; 
         }elseif($user->hasRole(Role::STUDENT))
         {
            $comment->commenter_type = 'student'; 
         }

         $comment->lesson_id = $lesson->id;
         $comment->save();

         
         
         //$lesson->comment()->attach($comment);

           //Return redirect 
        return redirect()
        ->route('lesson.show', ['lesson' => $lesson->id])
        ->with('success', 'تم إضافة تعليق بنجاح');

      }


      public function updateComment(Request $request, Comment $comment ,Lesson $lesson)
      {
        $request->validate([
            'content' => 'required'
        ]);

        $comment->content = $request->content;
        $comment->save();

         //Return redirect 
         return redirect()
         ->route('lesson.show', ['lesson' => $lesson->id])
         ->with('success', 'تم تعديل التعليق بنجاح');
      }

      public function deleteComment(Comment $comment,Lesson $lesson)
      {
          $comment->delete();

           //Return redirect 
         return redirect()
         ->route('lesson.show', ['lesson' => $lesson->id])
         ->with('success', 'تم حذف التعليق بنجاح');
      }



      public function addReply(Request $request,Comment $comment,Lesson $lesson)
      {
         $request->validate([
             'content' => 'required'
         ]);

         $user = Auth::user();

         $reply = new Reply();
         $reply->content = $request->content;
         $reply->replyer_id = $user->id;

         if($user->hasRole(Role::ADMIN))
         {
             $reply->replyer_type = 'admin';
         }elseif($user->hasRole(Role::MANAGER))
         {
            $reply->replyer_type = 'manager'; 
         }elseif($user->hasRole(Role::TEACHER))
         {
            $reply->replyer_type = 'teacher'; 
         }elseif($user->hasRole(Role::STUDENT))
         {
            $reply->replyer_type = 'student'; 
         }

         $reply->save();

         
         
         $comment->replies()->attach($reply);

           //Return redirect 
        return redirect()
        ->route('lesson.show', ['lesson' => $lesson->id])
        ->with('success', 'تم إضافة رد بنجاح');

      }


      public function updateReply(Request $request, Reply $reply ,Comment $comment)
      {
        $request->validate([
            'content' => 'required'
        ]);

        $reply->content = $request->content;
        $reply->save();

         //Return redirect 
         return redirect()
         ->route('lesson.show', ['lesson' => $lesson->id])
         ->with('success', 'تم تعديل الرد بنجاح');
      }

      public function deleteReply(Reply $reply,Comment $comment,Lesson $lesson)
      {
          
          $reply->delete();

           //Return redirect 
         return redirect()
         ->route('lesson.show', ['lesson' => $lesson->id])
         ->with('success', 'تم حذف الرد بنجاح');
      }



}
