<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Student</title>
</head>
<body>
    @include('sweetalert::alert')
    <form class="row" action="{{route('store')}}"  method="POST"
    enctype="multipart/form-data">
      @csrf
        <div class="col-md-4 ms-5 mt-5">
            <label for="validationDefault01" class="form-label">First name</label>
            <input type="text" class="form-control" id="validationDefault01" name="firstname" required>
        </div>
        <div class="col-md-4 ms-5 mt-5">
            <label for="validationDefault02" class="form-label">Last name</label>
            <input type="text" class="form-control" id="validationDefault02" name="lastname">
        </div>
        <div class="col-md-4 ms-5 mt-3">
            <label for="validationDefault03" class="form-label">Address</label>
            <input type="text" class="form-control" id="validationDefault03" name="address" required>
        </div>
        <div class="col-md-4 ms-5 mt-3">
            <label for="validationDefault05" class="form-label">Phone</label>
            <input type="number" class="form-control" id="validationDefault05" name="phone" required>
        </div>
        <div class="col-md-4 ms-5 mt-3">
            <label for="validationDefault06" class="form-label">Date</label>
            <input type="date" class="form-control" id="validationDefault06" name="date" required>
        </div>
        <div class="col-12 mt-4 ms-5">
            <button class="btn btn-primary bg-primary" type="submit">Submit</button>
        </div>
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>
</html>
