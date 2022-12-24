// $(document).ready(function() {
//     $("#admin-header-menu-icon").click(function() {
//         $(".admin-notes-main-left-div").toggle();
//     });
// });

$(document).ready(function() {
    $("#admin-header-menu-icon").click(function() {
        $(".admin-notes-main-left-div").animate({
            width: "toggle"

        });
        $("#admin-main-right-div").removeClass();
        // $("#admin-main-right-div").removeClass(".col-md-10");
        // $("#admin-main-right-div").removeClass(".admin-main-right-div-after");
        $("#admin-main-right-div").addClass("admin-main-right-div-after");
        $("#admin-main-right-div").addClass("col-md-12");

    });

    $(".note-container").click(function() {

        // $("#myModal").toggle();
    });

    $(".update-btn").click(function() {

        var popuptitle = document.getElementById("popup-header-title").value;
        var popupdata = document.getElementById("popup-bodynote-data").innerText;
        var popupid = document.getElementById("popup-hidden-id").innerText;
        $.ajax({
            url: "update-note.php",

            dataType: "text",
            data: {
                title: popuptitle,
                id: popupid,
                dataa: popupdata,

            },
            success: function(data) {
                // $('#alert_message').html("<div class='col-sm-4 alert alert-success' ><b>Edit</b> data successfully</div>");
                // fetchdata(data);
                alert('ok');
            }
        });
        setInterval(function() {
            $("#alert_message").html('');
        }, 3000);
    });

    $("#myModal").on("hidden.bs.modal", function() {
        document.getElementById("popup-header-title").value = '';
        document.getElementById("popup-bodynote-data").innerText = '';
        document.getElementById("popup-hidden-id").innerText = '';
    });
});

$(document).ready(function() {
    // CKEDITOR.config.removePlugins = 'Save,Print,Preview,Find,About,Maximize,ShowBlocks';
});