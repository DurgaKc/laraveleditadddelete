<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css"
        integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <title>Student</title>
</head>

<body>
    @include('sweetalert::alert')
    <div class="">
        <a href="{{ route('create') }}" class="btn bg-primary text-white mx-3 my-3 text-align-end">Add New</a>
    </div>
    <table class="table">
        <thead>
            <tr>
                <th>s.no</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Phone</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($students as $student)
                <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $student->firstname ?? '' }}</td>
                    <td>{{ $student->lastname ?? '' }}</td>
                    <td>{{ $student->address ?? '' }}</td>
                    <td>{{ $student->phone ?? '' }}</td>
                    <td>{{ $student->date ?? '' }}</td>
                    <td>
                        <a href="{{ route('edit', $student) }}">
                            <i class="fa fa-pencil text-dark" aria-hidden="true"></i>
                        </a>

                        <a href="{{ route('delete', $student) }}">
                            <i class="fa fa-trash  mx-3 text-dark" aria-hidden="true"></i>
                        </a>

                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    {{-- {{$students->links()}} --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <div id="piechart" style="width: 900px; height: 500px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <canvas id="Pie"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="Bar"></canvas>
            </div>
            <div class="col-md-4">
                <canvas id="chart"></canvas>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('Pie').getContext('2d');
            const dates = <?php echo json_encode($dates); ?>;
            const phones = <?php echo json_encode($phones); ?>;

            const config = {
                type: 'pie',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Visits per dates',
                        data: phones,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Customer Visits per Date'
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });
        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('Bar').getContext('2d');
            const dates = <?php echo json_encode($dates); ?>;
            const phones = <?php echo json_encode($phones); ?>;

            const config = {
                type: 'bar',
                data: {
                    labels: dates,
                    datasets: [{
                        label: 'Phone Count',
                        data: phones,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });

        document.addEventListener('DOMContentLoaded', function() {
            const ctx = document.getElementById('chart').getContext('2d');
            const dates = <?php echo json_encode($dates); ?>;
            const phones = <?php echo json_encode($phones); ?>;

            const config = {
                type: 'doughnut',
                data: {
                    labels: dates, // Assuming dates are labels
                    datasets: [{
                        label: 'Phone Count',
                        data: phones,
                        backgroundColor: [
                            'rgba(255, 99, 132, 0.2)',
                            'rgba(255, 159, 64, 0.2)',
                            'rgba(255, 205, 86, 0.2)',
                            'rgba(75, 192, 192, 0.2)',
                            'rgba(54, 162, 235, 0.2)',
                            'rgba(153, 102, 255, 0.2)',
                            'rgba(201, 203, 207, 0.2)'
                        ],
                        borderColor: [
                            'rgb(255, 99, 132)',
                            'rgb(255, 159, 64)',
                            'rgb(255, 205, 86)',
                            'rgb(75, 192, 192)',
                            'rgb(54, 162, 235)',
                            'rgb(153, 102, 255)',
                            'rgb(201, 203, 207)'
                        ],
                        borderWidth: 1
                    }]
                },
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            position: 'top',
                        },
                        title: {
                            display: true,
                            text: 'Chart.js Doughnut Chart'
                        }
                    }
                }
            };

            new Chart(ctx, config);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>




</body>

</html>
