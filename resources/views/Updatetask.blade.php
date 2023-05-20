<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Update Task</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <br>
        <br>
        <br>
     <form action="/updatetaskagain" method="post" >
     {{csrf_field()}}
     <h4>product</h4><input type="text" class="form-control" name="task" value="{{$taskdata->task}}"/><br>
     <h4>description</h4><input type="text" class="form-control" name="description" value="{{$taskdata->description}}"/><br>
     <input type="hidden" name="id" value="{{$taskdata->id}}"/>
     <input type="Submit" class="btn btn-warning" value="Update"/>
     &nbsp;&nbsp;<button id="backButton" class="btn btn-danger">Cancel</button>

     </form>
    </div>
    <script>
    const backButton = document.getElementById('backButton');
    backButton.addEventListener('click', function() {
      window.history.back();
    });
  </script>
</body>
</html>