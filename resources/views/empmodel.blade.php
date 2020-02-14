<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css">
    <title>Document</title>
</head>
<body>
<!-- ADD Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{action('EmployeeController@store')}}" method="POST">
                @csrf
                <div class="modal-body">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" class="form-control"
                               placeholder="Enter First Name"/>

                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" class="form-control"
                               placeholder="Enter Last Name"/>

                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" class="form-control"
                               placeholder="Enter Address"/>
                    </div>
                    <div class="form-group">
                        <label>Phone #</label>
                        <input type="text" name="mobile" class="form-control"
                               placeholder="Enter Phone Number"/>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save changes</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--End Add Modal--}}

<!-- Edit Modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/employee" method="POST" id="editForm">
                @csrf
                {{method_field('PATCH')}}
                <div class="modal-body">

                    <div class="form-group">
                        <label>First Name</label>
                        <input type="text" name="fname" id="fname" class="form-control"
                               placeholder="Enter First Name"/>

                    </div>
                    <div class="form-group">
                        <label>Last Name</label>
                        <input type="text" name="lname" id="lname" class="form-control"
                               placeholder="Enter Last Name"/>

                    </div>
                    <div class="form-group">
                        <label>Address</label>
                        <input type="text" name="address" id="address" class="form-control"
                               placeholder="Enter Address"/>
                    </div>
                    <div class="form-group">
                        <label>Phone #</label>
                        <input type="text" name="mobile" id="mobile" class="form-control"
                               placeholder="Enter Phone Number"/>

                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--End Edit Modal--}}


<!-- Delete Modal -->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Delete Data Modal</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/employee" method="POST" id="deleteForm">
                @csrf
                {{method_field('DELETE')}}
                <div class="modal-body">

                    <input type="hidden" name="_method" value="DELETE" />
                    <p>Are you sure? You want to delete data.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Delete</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--End Delete Modal--}}


<div class="container">
    <h1>Laravel</h1>

    <div class="container">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @if(\Session::has('success'))
            <div class="alert alert-success">
                <p>{{\Session::get('success')}}</p>
            </div>
    @endif


    <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
            Add Data
        </button>
        <p></p>
        <table id="datatable" class="table table-dark">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">First</th>
                <th scope="col">Last</th>
                <th scope="col">ADDRESS</th>
                <th scope="col">PHONE #</th>
                <th scope="col">ACTION</th>
            </tr>
            </thead>
            <tbody>
            @foreach($employees as $employee)
                <tr>
                    <th scope="row">{{$employee->id}}</th>
                    <td>{{$employee->fname}}</td>
                    <td>{{$employee->lname}}</td>
                    <td>{{$employee->address}}</td>
                    <td>{{$employee->mobile}}</td>
                    <td>
                        <a href="#" class="btn btn-success edit">EDIT</a>
                        <a href="#" class="btn btn-danger delete">DELETE</a>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js"
        integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.20/js/dataTables.bootstrap4.min.js"></script>

<script type="text/javascript">
    $(document).ready(function () {
        //Edit Record
        var table = $('#datatable').DataTable();
        table.on('click', '.edit', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#address').val(data[3]);
            $('#mobile').val(data[4]);

            $('#editForm').attr('action', '/employee/' + data[0]);
            $('#editModal').modal('show');
        });
        //End Edit Record


        //Delete Record
        var table = $('#datatable').DataTable();
        table.on('click', '.delete', function () {
            $tr = $(this).closest('tr');
            if ($($tr).hasClass('child')) {
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);

            // $('#id').val(data[0]);

            $('#deleteForm').attr('action', '/employee/' + data[0]);
            $('#deleteModal').modal('show');
        });
        //End Delete Record

    });
</script>


</body>
</html>
