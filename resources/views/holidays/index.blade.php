<!DOCTYPE html>
<html>
<head>
    <title>Holiday Calendar</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Holiday Calendar</h1>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Name</th>
                <th>Date</th>
                <th>Type</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($holidays as $holiday)
                <tr>
                    <td>{{ $holiday->name }}</td>
                    <td>{{ $holiday->date }}</td>
                    <td>{{ $holiday->type }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</div>
</body>
</html>
