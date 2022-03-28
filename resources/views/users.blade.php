<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>User List</title>
</head>
<body>
<div class="shadow p-3 mb-5 bg-body rounded row" >
<h1 class="col">User List</h1>

    <div class="d-grid gap-2 d-md-flex justify-content-md-end col">
        <button class="btn btn-primary me-md-2" type="button">Button</button>
        <button class="btn btn-primary" type="button">Button</button>
    </div>
    </div>

<table class="table table-hover" >
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Surname</th>
        <th scope="col">Email</th>
    </tr>
    </thead>
    <tbody>
    @foreach($users as $user)
        <tr>
        <th scope="row">{{$user->id}}</th>
        <td>{{$user->name}}</td>
        <td>{{$user->surname}}</td>
        <td>{{$user->email}}</td>
    </tr>
    @endforeach
    </tbody>
</table>


</body>
</html>
