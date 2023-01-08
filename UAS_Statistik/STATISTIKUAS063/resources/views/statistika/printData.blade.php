<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head>
<body>
	<style type="text/css">
		table tr td,
		table tr th{
			font-size: 8pt;
		}
	</style>
	<center>
		<h2 class="text-center text-primary">Dashboard Data</h3>
	</center>

	<table class="table table-bordered table-striped">
		<thead>

            <tr>
                <th scope="col">No</th>
                <th scope="col">NIM</th>
                <th scope="col">Name</th>
                <th scope="col">Score</th>
            </tr>
		</thead>

		<tbody>
        @php
            $i = 1;
        @endphp
        @foreach ($data as $s)
        <tr>
            <th scope="row">{{ $i }}</th>
            <td>{{ $s->NIM }}</td>
            <td>{{ $s->Name }}</td>
            <td>{{ $s->Score }}</td>
          </tr>
        @php
            $i++;
        @endphp
        @endforeach
		</tbody>
	</table>
</body>
</html>
