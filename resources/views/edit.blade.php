<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Task Page</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar navbar-expand-lg bg-light">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">Task Management System</a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="{{url('/task')}}">Task</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="{{url('/project')}}">Project</a>
              </li>
              
            </ul>
            
          </div>
        </div>
      </nav>
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card-title">
                    <h6>  Edit Task</h6>
                </div>

                @if(session('success'))
              <div class="alert alert-primary" role="alert">
                  {{session('success')}}
              </div>
              @endif
              @if ($errors->any())
              <div class="alert alert-danger">
                  <ul>
                      @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                      @endforeach
                  </ul>
              </div>
          @endif
                <div class="card-body">

                    <form action=" " method="POST">
                        @method("PUT")
                        @csrf
                        <div class="mb-3">
                          <label for="Task_name" class="form-label"> Task Name</label>
                          <input type="text" class="form-control" id="task_name" value="{{$task->task_name}}" name="task_name" aria-describedby="task_name">
                          
                        </div>
                        <div class="mb-3">
                          <label for="priority" class="form-label">priority</label>
                          <input type="priority" class="form-control" name="priority" value="{{$task->priority}}" id="priority">
                        </div>
                       
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                </div>

                
            </div>
            
        </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
  </body>
</html>