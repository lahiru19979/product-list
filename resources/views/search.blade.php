<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    
</head>
<body>
   
    <div class="container">
    <div class="text-center">
     <div class="row">
        <div class="col-md-1"><button id="backButton" class="btn btn-danger">back</button></div>
        <div class="col-md-11"><h1>Product list</h1></div>
        </div>     

                                 <table class="table table-dark">
                                      <th>ID</th>
                                      <th>Product</th>
                                      <th>Description</th>
                                      <th>photo</th>
                                      <th>Action</th>
                                     

                                      @foreach($results as $task)
                       
                                    <tr>

                                    <td>{{$task->id}}</td>
                                    <td>{{$task->task}}</td>
                                    <td>{{$task->description}}</td>
                                     <td> @if($task->image)
                                         <img src="{{ asset('storage/' . $task->image) }}" class="img-image" alt="Image" width="150px">
                                         @endif
                                    </td>
                                    <td>
                                        <a href="/updatetask/{{$task->id}}"  class="btn btn-success">Update</a>
                                        @method('DELETE')<a href="/deletetask/{{$task->id}}"  class="btn btn-danger">Delete</a>  
                                     </td>
                                    </tr>
                                    @endforeach


                </div>
            </div>
</div>
</div>
<script>
    
    const backButton = document.getElementById('backButton');
    backButton.addEventListener('click', function() {
      window.history.back();
    });
  </script>