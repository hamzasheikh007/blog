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
  <div class="row">
     <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4>Students Crud
                    <a class= "btn btn-primary float-end" href="{{route('student.create')}}">Add Student</a>
                </h4>
            </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">First Name</th>
                                <th scope="col">Last Name</th>
                                <th scope="col">Email</th>
                                <th scope="col">Mobile</th>
                                <th scope="col">Image</th>
                                <th scope="col">Edit</th>
                                <th scope="col">Delete</th>
                            </tr>
                            </thead>
                            <tbody>

                            @foreach($student as $item)
                            <tr>
                                <td>{{$item->id}}</td>
                                <td>{{$item->fname}}</td>
                                <td>{{$item->lname}}</td>
                                <td>{{$item->email}}</td>
                                <td>{{$item->mob}}</td>
                                <td><img assest{{('uploads/students/'.$item->profile_image)}} width="70px" height="70px" alt="Image"></td>
                                <td>
                                    <a class="btn btn-primary" href="{{ route('student.edit',$item->id) }}">Edit</a>
                                </td>
                                <td>
                                    <a class="btn btn-danger" href="{{ route('student.destroy',$item->id) }}">Delete</a>
                                </td>

                            </tr>
                          @endforeach
                            </tbody>
                        </table>

                    </div>
        </div>
     </div>
   </div>
</div>
</body>
</html>

