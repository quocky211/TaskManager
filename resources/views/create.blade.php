
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="{{url('css/create.css')}}" type="text/css">
    <title>Create task</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <h4>Create Task</h4>
            <form action="{{route('task.store')}}" method="post">
                @csrf
                <div class="mb-3">
                    <label for="title" class="form-label ">Title</label>
                    <input type="text" class="form-control" id="title" name="title" >
                </div>
                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" rows="3" name="description"></textarea>
                </div>
                <a href="{{route('task.index')}}" class="btn btn-secondary mr-2">Back</a>
                <button type="submit" class="btn btn-primary">
                    Submit
                </button>
            <form>
        </div>
    </div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>

</html>