<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
        <script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <title>Students | Ajax</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-10" style="padding-top: 20px">
                <div class="card">
                    <div class="card-header">
                        Students
                        <span>
                            <a href="#" class="btn btn-success" data-toggle="modal" data-target="#studentModal">Add New Student</a>
                        </span>
                    </div>
                    <div class="card-body">
                        <table class="table" id="studentTable">
                            <thead>
                                <tr>
                                    <th>First Name</th>
                                    <th>Last Name</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($students as $student)
                                    <tr id="sid{{ $student->id }}">
                                        <td>{{ $student->firstname }}</td>
                                        <td>{{ $student->lastname }}</td>
                                        <td>{{ $student->email }}</td>
                                        <td>{{ $student->contact }}</td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="editStudent({{ $student->id }})" class="btn btn-info">Edit</a>
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

  <!-- Add Student Modal -->
<div class="modal fade" id="studentModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" id="studentForm">
                    <div class="form-group">
                        <label for="firstname">First Name</label>
                        <input id="firstname" class="form-control" type="text" name="firstname">
                    </div>
                    <div class="form-group">
                        <label for="lastname">Last Name</label>
                        <input id="lastname" class="form-control" type="text" name="lastname">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="text" name="email">
                    </div>
                    <div class="form-group">
                        <label for="contact">Contact No.</label>
                        <input id="contact" class="form-control" type="text" name="contact">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
</div>



 <!-- Edit Student Modal -->
 <div class="modal fade" id="studentEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
 aria-hidden="true">
 <div class="modal-dialog" role="document">
     <div class="modal-content">
         <div class="modal-header">
             <h5 class="modal-title" id="exampleModalLabel">Add New Student</h5>
             <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                 <span aria-hidden="true">&times;</span>
             </button>
         </div>
         <div class="modal-body">
             <form action="" id="studentEditForm">
                @csrf
                <input type="hidden" name="id" id="id">
                 <div class="form-group">
                     <label for="firstname">First Name</label>
                     <input id="firstname2" class="form-control" type="text" name="firstname">
                 </div>
                 <div class="form-group">
                     <label for="lastname">Last Name</label>
                     <input id="lastname2" class="form-control" type="text" name="lastname">
                 </div>
                 <div class="form-group">
                     <label for="email">Email</label>
                     <input id="email2" class="form-control" type="text" name="email">
                 </div>
                 <div class="form-group">
                     <label for="contact">Contact No.</label>
                     <input id="contact2" class="form-control" type="text" name="contact">
                 </div>
                 <button type="submit" class="btn btn-primary">Submit</button>
             </form>
         </div>
     </div>
 </div>
</div>
</div>



<script>

    $.ajaxSetup({
    headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
    });

    $("#studentForm").submit(function(e){
    e.preventDefault();

    let firstname = $("#firstname").val();
    let lastname = $("#lastname").val();
    let email = $("#email").val();
    let contact = $("#contact").val();
    let _token = $("input[name = _token]").val();


    $.ajax({
        url : "{{ route('student.add') }}",
        type : 'POST',
        data : {
            firstname : firstname,
            lastname : lastname,
            email : email,
            contact : contact,
            _token : _token
        },
        success:function(response)
        {
            if(response)
            {
                $("#studentTable tbody").prepend('<tr><td>'+ response.firstname +'</td><td>'+ response.lastname +'</td><td>'+ response.email +'</td><td>'+ response.contact +'</td><td>'+  +'</td></tr>');
                $("#studentForm")[0].reset();
                $("#studentModal").modal('hide');
            }
        }
    });
});
</script>


<script>
    function editStudent(id)
    {
        $.get('/students/'+id,function(student){
            $("#id").val(student.id);
            $("#firstname2").val(student.firstname);
            $("#lastname2").val(student.lastname);
            $("#email2").val(student.email);
            $("#contact2").val(student.contact);
            $("#studentEditModal").modal('toggle');
        });
    }

    $("#studentEditForm").submit(function(e)
    {
        e.preventDefault();
        let id = $("#id").val();
        let firstname = $("#firstname2").val();
        let lastname = $("#lastname2").val();
        let email = $("#email2").val();
        let contact = $("#contact2").val();
        let _token = $("input[name = _token]").val();

        $.ajax({
            url : "{{ route('student.update') }}",
            type : "POST",
            data : {
                id : id,
                firstname : firstname,
                lastname : lastname,
                email : email,
                contact : contact,
                _token : _token
            },
            success : function(response){

                $('#sid' + response.id + ' td:nth-child(1)').text(response.firstname);
                $('#sid' + response.id + ' td:nth-child(2)').text(response.lastname);
                $('#sid' + response.id + ' td:nth-child(3)').text(response.email);
                $('#sid' + response.id + ' td:nth-child(4)').text(response.contact);
                $("#studentEditModal").modal('toggle');
                $("#studentEditForm")[0].reset();
            }
        });

    });



</script>


</body>

</html>
