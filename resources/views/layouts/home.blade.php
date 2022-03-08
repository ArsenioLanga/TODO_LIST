@extends('layouts.main_layout')


@section('content')

    <div class="container-fluid">
        <div class="row">
        
            <div class="col">

                <h3>TODO LIST</h3>

                <hr>

                <div class="my-2">
                    <a href="{{route('new_task') }}" class="btn btn-primary">Create Task...</a>
                    <a href="{{route('list_hidden') }}" class="btn btn-primary">List hidden Tasks</a>
                </div>

                <hr>

                @if ($tasks->count() == 0)
                    <p>Nao existem terafas Pendentes!</p>
                @else
                
                    
                    <table class="table  table-striped">
                            <thead class="thead-dark">
                                <tr>
                                    <th>Task</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            
                            @foreach ($tasks as $taskers)
                                <tr>
                                    <td style="width: 65%">{{$taskers->task}}</td>
                                    <td>
                                        <!-- done/not dona -->
                                        @if ($taskers ->done == null)
                                            <a href="{{route('task_done',['id' => $taskers->id])}}" class="btn btn-primary btn-sm">
                                                <i class="fa fa-check"></i>
                                            </a>
                                        @else
                                            <a href="{{route('task_not_done',['id' => $taskers->id])}}" class="btn btn-success  btn-sm">
                                                <i class="fa fa-times "></i>
                                            </a>
                                        @endif

                                        <!-- editar -->
                                            <a href="{{route('edit_task',['id' => $taskers->id])}}" class="btn btn-primary  btn-sm"> 
                                                <i class="fa fa-pencil  "></i>
                                            </a> 

                                        <!-- visible/not visible --> 
                                        @if ($taskers ->visible  == 1)
                                            <a href="{{route('task_invisible',['id' => $taskers->id])}}" class="btn btn-primary btn-sm"> 
                                                <i class="fa fa-eye-slash"></i>
                                            </a>
                                        @else
                                            <a href="{{route('task_visible',['id' => $taskers->id])}}" class="btn btn-success  btn-sm"> 
                                                <i class="fa fa-eye"></i>
                                            </a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>

                    <hr>
                            <p>Total: <strong> {{$tasks->count()}}</strong> </p>
                        

                    @endif

                </div>

        </div>
        
    </div>

@endsection