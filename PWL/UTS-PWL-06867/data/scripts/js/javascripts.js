$(document).ready(function () {
    $('#password, #passwordConfirm').on('keyup', function (event) {
        event.preventDefault();
        var password = $('#password').val();
        var confirmPassword = $('#passwordConfirm').val();
        if (password.trim() !== '' || confirmPassword.trim() !== '') {
            if (password.length < 6 || confirmPassword.length < 6) {
                $('#password_err').text('Password must be at least 6 characters.');
                return false;
            } else if (password !== confirmPassword) {
                $('#password_err').text("Passwords doesn't match.");
                return false;
            } else {
                $('#password_err').text('');
                return true;
            }
        } else {
            $('#password_err').text('');
        }
    });

    /// USERID length and is_taken checker only for insert
    $('#insert_form, #edit_form').ready(function () {
        $('#userid').on('blur', function () {
            var userid = $('#userid').val();
            console.log(userid);
            if (userid.trim() !== '') {
                if (userid.length !== 14) {
                    $('#userid_err').text('14 character max is allowed.');
                    $('#userid').focus();
                }
                else {
                    $('#userid_err').text('');
                    $.ajax({
                        url: '../scripts/requestbase.php?req=useridchck',
                        type: 'POST',
                        data: {
                            userid: userid
                        },
                        success: function (response) {
                            const message = JSON.parse(response);
                            console.log(response);
                            if (message.message == 'taken') {
                                $('#userid_err').text('User ID is Taken');
                                $('#userid').focus();
                            } else {
                                $('#userid_err').text('');
                            }
                        },
                        error: function () {
                            alert("Server error. [req: useridchck]");
                        }
                    });
                }
            } else {
                $('#userid_err').text('');
            }
        })
    });

    /// file photo validaiton
    $('#pict').on('change', function (event) {
        event.preventDefault();
        var file = $(this)[0].files[0];
        if (file) {
            var allowedExtensions = ['jpg', 'jpeg', 'png'];
            var fileExtension = file.name.split('.').pop().toLowerCase();
            if (allowedExtensions.indexOf(fileExtension) === -1) {
                $('#file_err').text('Invalid file type. Please upload a JPG, JPEG, or PNG file.');
                return false;
            } else if (file.size > 2000000) { // 2MB limit
                $('#file_err').text('File size exceeds the 2MB limit.');
                return false;
            } else {
                $('#file_err').text('');
            }
        } else {
            $('#file_err').text('');
        }
    });
    /// submit prevention function
    $('#insert_form, #edit_form').submit(function (event) {
        var passwd = $('#password_err').text().trim() !== '';
        var uid = $('#id_err').text().trim() !== '';
        var file = $('#file_err').text().trim() !== '';
        if (passwd || uid || file) {
            event.preventDefault();
        } else {
            this.submit();
        }
    });
    ///table data search function
    $('#searchbox').on('keyup', function () {
        var value = $(this).val();
        $("#users_list tbody tr").filter(function () {
            $(this).toggle($(this).text().indexOf(value) > -1);
        });
    });
    ///data row deletion function
    $('#users_list tbody tr td').on('click', '#delete_btn', function () {
        var id = $(this).data('id');
        if (confirm("Are you sure to delete this row?")) {
            $.ajax({
                url: 'data/scripts/requestbase.php?req=deletethis',
                type: 'POST',
                data: {
                    id: id
                },
                success: function () {
                    location.reload();
                    alert("Data deleted succesfully.");
                },
                error: function () {
                    alert("Server error. [req: delete]");
                }
            });
        }
    });
    $('#cancel_btn').on('click', function () {
        window.history.back();
    });
});

