<?php

namespace App\Http\Controllers\Lesson;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Unit;
use App\Lesson;
use App\Comment;
use App\Reply;
use Auth;
use App\Role;
use App\Course;
use App\Evaluation;
use Storage ; 
use File ;

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
    public function create(Request $request)
    {
        $selectedCourse = request()->filled('selectedcourse') ? Course::findOrFail(request()->selectedcourse) : null ;
        $selectedUnit = request()->filled('selectedunit') ? Unit::findOrFail(request()->selectedunit) : null ;
        $units = Unit::all();
        $courses = Course::all();
        return view('admin.lessons.create',compact('selectedUnit','units','selectedCourse','courses'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Unit $unit = null, Course $course = null)
    {   
        $request->validate([
            'title' => 'required|max:200',
            'type' => 'required',
            'active' => 'required',
            'src' => '',
            'url_src' => '',
            'intro' => 'required'
        ]);

        
        //Prepare data to save 

        // $attributes['title'] = $request->title ; 
        // $attributes['type'] = $request->type ;
        // $attributes['active'] = $request->active ? true : false ;
        // $attributes['intro'] = $request->intro ;

        // //save File 
        // if($request->hasFile('src')){

        //     $attributes['src'] = $request->src->storeAs('public/lessons', $request->src->getClientOriginalName());

        // }

        //  //Persist data in the database 
        //  $lesson = Lesson::create($attributes);

        $lesson = new Lesson();

        $lesson->type = $request->type;
        //handle upload file to lesson or set URL
        if ($request->hasFile('src'))
          {
              $extention = $request->file('src')->getClientOriginalExtension();
              //dd($extention,$request->type);
               if($extention === 'jpg'&&$request->type ==='image'|| $extention === 'png' && $request->type ==='image') 
               {
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               }
               elseif($extention === 'pdf' && $request->type ==='pdf') 
               {
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               } 
               elseif($extention === 'docx' && $request->type ==='word')
               {
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               } 
               else
               {return redirect()->back()->withError('يرجى اختيار الملف من النوع المحدد');}
          }
          elseif($request->url_src != null) {
            $lesson->src = $request->url_src;
          }elseif($request->embadedCode_src) {
            $lesson->src = $request->embadedCode_src;
          }

        $lesson->title = $request->title;
        
        $lesson->active = $request->active;
        $lesson->intro = $request->intro;

        

        $lesson->save();
          
        
         if($request->unit_id != "-- اختر الوحدة --"&& $request->unit_id != null){
         
            //$arr= $lesson->fresh()->unit->pluck('pivot.lesson_order')->toArray();
            //$lesson->fresh()->units[1]->pivot->lesson_order = 1 ;
            $lesson->units()->syncWithoutDetaching($request->unit_id ,['pivot.lesson_order'=>1]);
         }
         
         
         if($request->course_id != "-- اختر الدورة --" && $request->course_id != null){
            $lesson->courses()->syncWithoutDetaching($request->course_id);
        }
        if(Auth::user()->hasRole(2)){
        $lesson->teachers()->syncWithoutDetaching(Auth::user()->id);
        //Auth::user()->lessons()->syncWithoutDetaching($lesson->id);
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
        $ratings = $lesson->evaluations;
        $studentEvaluation = null;
        $eva_value = 0;
        if (Auth::user()->hasRole(3)) {
            
            //$evaluations = Auth::user()->evaluations;
            $evaluations = Evaluation::whereHas('student', function($query) {
                $query->where('student_id', '=', Auth::user()->id);
            })->get();
            //dd( $evaluations);
            foreach($evaluations as $evaluation) {
                if($lesson->id === $evaluation->lesson_id) {
                    $studentEvaluation = $evaluation;
                    $eva_value = $evaluation->value;
                }
            }
        }
        
        return view('admin.lessons.show',compact('lesson', 'comments', 'ratings','studentEvaluation', 'eva_value'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  App\Lesson $lesson
     * @return \Illuminate\Http\Response
     */
    public function edit(Lesson $lesson)
    {
        $units = Unit::all();
        $courses = Course::all();
        return view('admin.lessons.edit',compact('lesson','units','courses'));
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

        //handle upload file to lesson or set URL
        if ($request->hasFile('src'))
          {
              $extention = $request->file('src')->getClientOriginalExtension();
              //dd($extention,$request->type);
               if($extention === 'jpg'&&$request->type ==='image'|| $extention === 'png' && $request->type ==='image') 
               {
                Storage::delete($lesson->src);
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               }
               elseif($extention === 'pdf' && $request->type ==='pdf') 
               {
                Storage::delete($lesson->src);
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               } 
               elseif($extention === 'docx' && $request->type ==='word')
               {
                Storage::delete($lesson->src);
                 $lesson->src = $request->src->storeAs('public/lessons', time().$request->src->getClientOriginalName());
               } 
               else
               {return redirect()->back()->withError('يرجى اختيار الملف من النوع المحدد');}
          }
          else {
            Storage::delete($lesson->src);
            $lesson->src = $request->url_src;
          }
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
        
        return redirect()->route('lesson.index', ['lesson' => $lesson->id])
                ->with('success','تم تفعيل الدرس بنجاح');
    }

     /**
      * Action to deactivate A lesson
      */
      public function deactivate(Lesson $lesson){
        $lesson->makeInactive();
        $lesson->save();

        return redirect()->route('lesson.index', ['lesson' => $lesson->id])
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

      public function createEvaluation(Request $request, $studentEvaluation) {
        DB::transaction(function (){
            $createEvaluation= Evaluation::create([
            'value' => $request->input('rate'),
            ]);
        });
      }

      public function editEvaluation(Request $request, $evaluation) {
        DB::transaction(function (){
            $evaluation->value = $request->rate;
            $evaluation->save();
        });
      }

}
