<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TODO list - create</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>

<body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
       
            <h2 class="text-center">To Do List </h2>

        
    
    <div class="card">
       
        <div class="card-body">
            <a href="{{url('active')}}" class="btn btn-primary">Back</a>
        </div>
    </div>
    <!-- form create -->
    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-6">

                    <form action="{{url('create')}}" method="POST">
                        @csrf
                    <div class="mb-3">
                            <label for="exampleInputEmail1" class="form-label">Task</label>
                            <input type="name" name="name" class="form-control" value="{{old ('name')}}" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </section>
</body>

</html>