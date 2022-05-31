<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

</head>
<body>
<div class="container ">
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="row">
        <div class="col-md-12">
            @if(session('status'))
                <h6 class="alert alert-sucess">{{session('status')}}</h6>
            @endif
            <div class="card">
                <div class="card-header">
                    <h4>Students Crud
                        <a class= "btn btn-danger float-end" href="{{route('student.index')}}">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                     <form action="{{ route('student.store') }}" method="post">
                         @csrf
                         <div class="form-group mb-3">
                           <label for="">First Name</label>
                                <input class="form-control" type="text" name="fname">
                         </div>

                         <div class="form-group mb-3">
                             <label for="">Last Name</label>
                             <input class="form-control" type="text" name="lname">
                         </div>

                         <div class="form-group mb-3">
                             <label for="">Email</label>
                             <input class="form-control" type="email" name="email">
                         </div>

                         <div class="form-group mb-3">
                             <label for="">Mobile No</label>
                             <input class="form-control" type="number" name="mob">
                             <span class="text-danger">{{ $errors->first('mob') }}</span>
                         </div>


                         <div class="form-group mb-3">
                             <label for="">Student Profile Image</label>
                             <input class="form-control" type="file" name="profile_image">
                         </div>

                         <div class="form-group mb-3">
                             <button class="btn btn-primary" type="submit">Save Student</button>

                         </div>

                     </form>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
