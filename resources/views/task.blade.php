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
        <form class="form-inline my-2 my-lg-0" method="get" action="/search">
        <div class="row">
        <div class="col-md-9"></div>
        <div class="col-md-2"><input type="text" name="keyword" class="form-control" placeholder="search"></div>
        <div class="col-md-1"><button class="btn btn-primary" type="submit">Search</button></div>
        </div>
        </form>
        <h1>Product list</h1>
            <div class="row">
                <div class="col-md-12">
                   @foreach($errors->all() as $error)
                   <div class="alert alert-danger" role="alert">
                    {{$error}}
                    </div>
                   @endforeach

                        <form method="post" action="/SaveTask" enctype="multipart/form-data" id="myForm">
                        {{csrf_field()}}
                            <div class="row">
                                <div class="col-md-3"><input type="text" class="form-control" id="product" name="task" placeholder="Enter your product here" required><br></div>
                                <div class="col-md-6"><input type="text" class="form-control" id="decription" name="description" placeholder="Enter your description here" required><br></div>
                                <div class="col-md-3"><input type="file" class="form-control" name="image" placeholder="add image here" required><br></div>
                            </div>
                             <input type="Submit" class="btn btn-primary" value="SAVE">
                             <button type="button" id="clearButton" class="btn btn-warning">Clear</button>

                        </form><br>

                                 <table class="table table-dark">
                                      <th>ID</th>
                                      <th>Product</th>
                                      <th>Description</th>
                                      <th>photo</th>
                                      <th>Action</th>
                                     

                                      @foreach($tasks as $task)
                       
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
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('#clearButton').click(function() {
            $('#myForm')[0].reset();
        });
    });
</script>

</body>
</html>