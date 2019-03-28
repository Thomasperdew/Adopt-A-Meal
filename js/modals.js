$(function () {
    $('button.delete').click(function (e) {
        e.preventDefault();
        //grab specific button that was pressed
        var link = this;
        var deleteModal = $("#deleteMealModal");
        // store the ID of meal idea, taken from button, inside the modal's form
        deleteModal.find('input[name=id]').val(link.dataset.id);
        // open modal
        document.getElementById("deleteMealModal").style.display = "block";
    });
});


$(function () {
    $('button.restore').click(function (e) {
        e.preventDefault();
        //grab specific button that was pressed
        var link = this;
        var deleteModal = $("#restoreMealModal");
        // store the ID of meal idea, taken from button, inside the modal's form
        deleteModal.find('input[name=id]').val(link.dataset.id);
        // open modal
        document.getElementById("restoreMealModal").style.display = "block";
    });
    
});

$(function () {
    $('button.deleteAdmin').click(function (e) {
        e.preventDefault();
        //grab specific button that was pressed
        var link = this;
        var deleteModal = $("#deleteAdminModal");
        // store the ID of meal idea, taken from button, inside the modal's form
        deleteModal.find('input[name=id]').val(link.dataset.id);
        // open modal
        document.getElementById("deleteAdminModal").style.display = "block";
    });
});

$(function () {
    $('button.changePermission').click(function (e) {
        e.preventDefault();
        //grab specific button that was pressed
        var link = this;
        var deleteModal = $("#changePermissionModal");
        // store the ID of meal idea, taken from button, inside the modal's form
        deleteModal.find('input[name=change]').val(link.dataset.id);
        // open modal
        document.getElementById("changePermissionModal").style.display = "block";
    });
});
// $(function () {
//     $('button.deleteAdmin').click(function (e) {
//         e.preventDefault();
//         //grab specific button that was pressed
//         var link = this;
//         var deleteModal = $("#deleteAdminModal");
//         // store the ID of meal idea, taken from button, inside the modal's form
//         deleteModal.find('input[name=id]').val(link.dataset.id);
//         // open modal
//         document.getElementById("deleteAdminModal").style.display = "block";
//     });
    
// });

$(function () {
    $('button.change').click(function (e) {
        // open modal
        document.getElementById("changePasswordModal").style.display = "block";

        $('#oldPassword, #confirmPassword').on('keyup', function () {
            if ($('#oldPassword').val() == $('#confirmPassword').val()) {
                $('#message').html('Matching').css('color', 'green');
            } else 
                $('#message').html('Not Matching').css('color', 'red');
        });
    
        // $('button.enter').click(function (e) {
        //     var password = $("#newPassword").val();
        //     if($('#oldPassword').val() != $('#confirmPassword').val()){
        //         document.getElementById("changePasswordModal").style.display = "block";
        //     }
        //     else{
        //         $.post("changePasswordHandler.php", {
        //             password: password
        //         });
        //     }
        // });
    });
});


function addAdminModal() {
    document.getElementById("addAdminModal").style.display = "block";
}

function addSuperUserModal() {
    document.getElementById("addSuperUserModal").style.display = "block";
}

$(function () {
    $('a.signOut').click(function (e) {
        document.getElementById("signOutModal").style.display = "block";
    });
});

function closeChangePasswordModal() {
    document.getElementById("changePasswordModal").style.display = "none";
}

function closeRestoreModal() {
    document.getElementById("restoreMealModal").style.display = "none";
}

function closeDeleteModal() {
    document.getElementById("deleteMealModal").style.display = "none";
}

function closeSignOutModal() {
    document.getElementById("signOutModal").style.display = "none";
}

function closeAddAdminModal() {
    document.getElementById("addAdminModal").style.display = "none";
}

function closeAddSuperUserModal() {
    document.getElementById("addSuperUserModal").style.display = "none";
}

function closeDeleteAdminModal() {
    document.getElementById("deleteAdminModal").style.display = "none";
}

function closeChangePermissionModal() {
    document.getElementById("changePermissionModal").style.display = "none";
}