$(document).ready(function(){

    $.ajaxSetup({
        headers:{
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    })
    //-------------------- Show Teacher data-----------------------
    function readTeacher(){
        $.ajax({
            type: "GET",
            url: "teacher/show",
            dataType: "json",
            success: function (response) {
                $('tbody#teachersShow').empty();
                var n = 1;
                $.each(response, function (key, value) {
                     $('<tr>').html(
                        '<td>'+n+'</td>'+
                        '<td>'+value.name+'</td>'+
                        '<td>'+value.title+'</td>'+
                        '<td>'+value.institute+'</td>'+
                        '<td>'+
                        '<a href="" data-id="'+value.id+'" class="btn teacherEdit btn-sm btn-primary mr-1">Edit</a>'+
                        '<a href="" data-id="'+value.id+'" class="btn teacherDelete btn-sm btn-danger">Delete</a>'+
                        '</td>'
                     ).appendTo('tbody#teachersShow');
                     n++;
                })
                // Edit button click
                $('.teacherEdit').click(function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                    editTeacher(id);
                    $('#getEditId').val(id);
                    $('#editTeacherModal').modal('show');
                });

                // Update button click
                $('.teacherDelete').click(function(e){
                    e.preventDefault();
                    var id = $(this).data('id');
                   deleteTeacher(id);
                });

            }
        });
    }
    readTeacher();
    // ---------------------Data Clear-----------------------
    function clearTeacher(){
        $('#teacherName').val('');
        $('#teacherTitle').val('');
        $('#teacherIstitute').val('');
    }
    // --------------------Add Teacher Data----------------------
    $('#addTeacherBtn').click(function(e){
        e.preventDefault();
        $('#addTeacherModal').modal('show');
    })
    $('#addButton').click(function (e) {
        e.preventDefault();
        addTeacher();
    });
    function addTeacher(){
        var teacherName = $('#teacherName').val();
        var teacherTitle = $('#teacherTitle').val();
        var teacherIstitute = $('#teacherIstitute').val();

        $.ajax({
            type: "POST",
            url: "teacher/add",
            data: {
                name: teacherName,
                title: teacherTitle,
                institute: teacherIstitute
            },
            dataType: "json",
            success: function (response) {
                $('#addTeacherModal').modal('hide');
                clearTeacher();
                readTeacher();

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Teacher added successfull',
                    showConfirmButton: false,
                    timer: 1500
                  })
            },
            error: function (error) {
                $('#nameError').text(error.responseJSON.errors.name);
                $('#titleError').text(error.responseJSON.errors.title);
                $('#instituteError').text(error.responseJSON.errors.institute);
            }
        });
    }

    // ---------------------Edit Teacher-----------------------
    function editTeacher(id){
        $.ajax({
            type: "GET",
            url: "teacher/edit/"+id,
            dataType: "json",
            success: function (response) {
                $('#editTeacherModal #teacherName').val(response.name);
                $('#editTeacherModal #teacherTitle').val(response.title);
                $('#editTeacherModal #teacherIstitute').val(response.institute);
            }
        });
    }
    // -------------------Update Teacher------------------------
    $('#updateButton').click(function(e){
        e.preventDefault();
        var id = $('#editTeacherModal #getEditId').val();
        updateTeacher(id)
    });
    function updateTeacher(id){
        var teacherName = $('#editTeacherModal #teacherName').val();
        var teacherTitle = $('#editTeacherModal #teacherTitle').val();
        var teacherIstitute = $('#editTeacherModal #teacherIstitute').val();
        $.ajax({
            type: "POST",
            url: "teacher/update/"+id,
            data: {
                name: teacherName,
                title: teacherTitle,
                institute: teacherIstitute
            },
            dataType: "json",
            success: function (response) {
                clearTeacher();
                readTeacher();

                $('#editTeacherModal').modal('hide');

                Swal.fire({
                    toast: true,
                    position: 'top-end',
                    icon: 'success',
                    title: 'Teacher updated Successfull',
                    showConfirmButton: false,
                    timer: 1500
                  })
            },
            error: function (error) {
                $('#nameError').text(error.responseJSON.errors.name);
                $('#titleError').text(error.responseJSON.errors.title);
                $('#instituteError').text(error.responseJSON.errors.institute);
            }
        });
    }

    // -------------------Delete Teacher------------------------
    function deleteTeacher(id){

        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
          }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: "GET",
                    url: "teacher/delete/"+id,
                    dataType: "json",
                    success: function (response) {
                        clearTeacher();
                        readTeacher();
                    }
                });

              Swal.fire(
                'Deleted!',
                'Your file has been deleted.',
                'success'
              )
            }
          })
    }




});
