<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Task Manager</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="dashboard">Dashboard</a>
            <a class="d-flex badge text-bg-info text-white p-3" href="logout" style="text-decoration:none">Logout</a>
        </div>
    </nav>
    <div class="container p-5">
        <div>
            <div class="float-start">
                <h4 class="pb-3">My Task</h4>
            </div>
            <div class="float-end">
                <a href="{{route('task.create')}}" class="btn btn-info">
                    Create Task
                </a>
            </div>
            <div class="clearfix"></div>
        </div>
        @foreach($data as $task)
        <div class="card mt-3">
            <h5 class="card-header">
                @if($task->status === "Incompleted")
                    {{$task->title}}
                @else
                    <del>
                        {{$task->title}}
                    </del>
                @endif
                <span class="badge text-bg-warning">{{$task->created_at->diffForHumans()}}</span>
            </h5>
            <div class="card-body">
                <div class="card-text">
                    <div class="float-start">
                        @if($task->status === "Incompleted")
                            {{$task->description}} 
                        @else
                            <del>{{$task->description}} </del>
                        @endif
                        <br>
                        @if($task->status === "Completed")
                            <span class="badge text-bg-success text-white">
                                Completed
                            </span>
                        @else
                            <span class="badge text-bg-danger text-white">
                                Incompleted
                            </span>
                        
                        @endif
                        
                        <small>Last updated - {{$task->updated_at->diffForHumans()}}</small>
                    </div>
                    <div class="float-end">
                        <a href="{{route('task.edit',$task->id)}}" class="btn btn-success">
                            Edit
                        </a>
                        <form action="{{route('task.destroy',$task->id)}}" method="post" style="display:inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Delete
                            </button>
                        </form>
                    </div>
                    <div class="clearfix"></div>
                </div>
            </div>
        </div>
        @endforeach

        @if(count($data)===0)
            <div class="alert alert-danger p-2">
                No task found. Please create one task !!!
            </div>
        @endif
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</html>