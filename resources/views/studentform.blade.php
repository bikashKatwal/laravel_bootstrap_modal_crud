<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css"
          integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Ajax-Laravel</title>
</head>
<body>


<!-- Add Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Student Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="addForm">
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
                            <label>Course</label>
                            <input type="text" name="course" class="form-control"
                                   placeholder="Enter Course"/>
                        </div>
                        <div class="form-group">
                            <label>Section</label>
                            <input type="text" name="section" class="form-control"
                                   placeholder="Enter Section"/>

                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save Data</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

{{--End Add Modal--}}


<!-- Edit Modal -->
<div class="modal fade" id="studenteditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Student Data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editFormID">
                <div class="modal-body">

                    @csrf
                    {{method_field('PUT')}}

                    <input type="hidden" name="user_id" id="id"/>
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
                        <label>Course</label>
                        <input type="text" name="course" id="course" class="form-control"
                               placeholder="Enter Course"/>
                    </div>
                    <div class="form-group">
                        <label>Section</label>
                        <input type="text" name="section" id="section" class="form-control"
                               placeholder="Enter Section"/>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary ">Update Data</button>
                </div>
            </form>
        </div>
    </div>
</div>

{{--End Edit Modal--}}


<div class="container">
    <h1>Ajax-Laravel</h1>

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
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">
        Add Student Data
    </button>

    <p></p>

    <table id="datatable" class="table table-dark">
        <thead>
        <tr>
            <th scope="col">ID</th>
            <th scope="col">First</th>
            <th scope="col">Last</th>
            <th scope="col">Course</th>
            <th scope="col">Section</th>
            <th scope="col">ACTION</th>
        </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->fname}}</td>
                <td>{{$student->lname}}</td>
                <td>{{$student->course}}</td>
                <td>{{$student->section}}</td>
                <td>
                    <a href="#" class="btn btn-success editbtn">EDIT</a>
                    <a href="#" class="btn btn-danger deletebtn">DELETE</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

</div>
<script
    src="https://code.jquery.com/jquery-3.4.1.min.js"
    integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
    crossorigin="anonymous"></script>

{{--<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>--}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.9.0/moment.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"
        integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6"
        crossorigin="anonymous"></script>


<script type="text/javascript">
    $(document).ready(function () {
        $('.editbtn').on('click', function () {
            $('#studenteditModal').modal('show');

            $tr = $(this).closest('tr');
            var data = $tr.children("td").map(function () {
                return $(this).text();
            }).get();

            console.log(data);

            $('#id').val(data[0]);
            $('#fname').val(data[1]);
            $('#lname').val(data[2]);
            $('#course').val(data[3]);
            $('#section').val(data[4]);
        });

        $('#editFormID').on('submit', function (e) {
            e.preventDefault();
            var id = $('#id').val();
            $.ajax({
                type: 'PUT',
                url: "/studentupdate/" + id,
                data: $('#editFormID').serialize(),
                success: function (response) {
                    console.log(response);
                    $('#studenteditModal').modal('hide');
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                }
            });
        });

    });
</script>

<script>
    $(document).ready(function () {
        $('#addForm').on('submit', function (e) {
            e.preventDefault();
            $.ajax({
                type: "POST",
                url: "/studentadd",
                data: $('#addForm').serialize(),
                success: function (response) {
                    // console.log(response);
                    $('#studentaddmodal').modal('hide')
                    location.reload();
                },
                error: function (error) {
                    console.log(error);
                    alert("Data not saved");
                }
            });
        });
    });
</script>

</body>
</html>
