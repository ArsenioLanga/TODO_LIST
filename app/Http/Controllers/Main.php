<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Task;

class Main extends Controller{

    public function list_hidden(){
        //  get invisble tasks
        $task = Task::where('visible', 0)
                ->OrderBy('created_at', 'desc')
                ->get();
        return view('layouts/home', ['tasks' => $task]); 
    }

    public function home(){

        //  get invisble tasks
        //  $task = Task::where('visible', 1)
        //          ->OrderBy('created_at', 'desc')
        //          ->get();
        $task = Task::all();
         return view('layouts/home', ['tasks' => $task]); 
    }

    public function new_task(){
        return view('layouts/new_task_form');
    }

    public function new_task_submit(Request $resq){

        //VERIFICAR SE O FORMULARIO FOI SUBMENTIDO
        // if(!$resq->isMethod('post')){
        //     die('URL INVALIDA');
        // }

            //TRAZER TODOS DADOS DO INPUT OU TODOS DO FORMULARIO

       // echo "<pre>";
        //print_r($resq->input());
        //print_r($resq->all());
        

        //get new task definition
        $new_task = $resq->input('text_new_task');


         //save task in to database
         $task = new Task();
          $task->task = $new_task;
         $task->save();

         //return to the main page

         return redirect()->route('home');
    }

    public function task_done($id_task){
            // update to the task  done
           $task = Task::find($id_task);
           $task->done = new \DateTime();
           $task->save();

           return redirect()->route('home');
     }

    public function task_not_done($id_task){
        // update to the task not done
        $task = Task::find($id_task);
        $task->done = null;
        $task->save();

        return redirect()->route('home');
     }

    public function edit_task($id){
         $task = Task::find($id);
        return view('layouts/edit_task_form', ['task' => $task]);
    }

    public function edit_task_submit(Request $request){

        //get form inputs
         $id_task = $request->input('id_task');
         $edit_task = $request->input('text_edit_task');

        // update task
         $task = Task::find($id_task);
         $task->task = $edit_task;
         $task->save();

         //display tasks table

         return redirect()->route('home');
    }

    public function task_visible($id_task){
         // update to the task visible 
         $task = Task::find($id_task);
         $task->visible = 1;
         $task->save();
 
         return redirect()->route('home');
    }

    public function task_invisible($id_task){
        // update to the task visible 
        $task = Task::find($id_task);
        $task->visible = 0;
        $task->save();

        return redirect()->route('home');
   }
}
