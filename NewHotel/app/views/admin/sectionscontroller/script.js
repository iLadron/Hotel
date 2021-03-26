$(document).ready(function () {

    $('#form_new_section').submit(function (event) {
        event.preventDefault();

        let depth_level = $('#form_new_section select option:selected').data("depth-level") + 1;
        console.log(depth_level);
        $('#form_new_section input[name = "depth_level"]').val(depth_level);



        let data = $('#form_new_section').serializeArray();
        console.log(data);
        //return;

        $.ajax({
            url: window.BASE_DIR + "sections/add/",
            data: data,
            dataType: "json",
            type: "POST",
            beforeSend: function () {
                console.log(window.BASE_DIR + "sections/add/");
            },
            success: function (json) {
                console.log("ffff");
                if (json.error) {
                    console.log('no ss');

                    $("#new_section_modal .error_danger").show();
                } else {
                    console.log('ss');
                    location.reload();
                }
            }
        })



    })





})



function sectionEdit() {



    let depth_level = $('#form_edit_section select option:selected').data("depth-level") + 1;
    console.log(depth_level);
    $('#form_edit_section input[name = "depth_level"]').val(depth_level);



    let data = $('#form_edit_section').serializeArray();
    console.log(data);
    //return;

    $.ajax({
        url: window.BASE_DIR + "sections/edit/",
        data: data,
        dataType: "json",
        type: "POST",
        success: function (json) {
            console.log("ffff");
            if (json.error) {
                console.log('no ss');

                $("#form_edit_section .error_danger").show();
            } else {
                console.log('ss');
                location.reload();
            }
        }
    })


}

function sectionDelete(id, name) {
    if (confirm("Вы уверены, что хотите удалить категорию " + name + "?")) {
        $.ajax({
            url: window.BASE_DIR + "sections/del/",
            data: { id: id },
            dataType: "json",
            type: "POST",
            beforeSend: function () {
                console.log(window.BASE_DIR + "sections/del/");
            },
            success: function (json) {
                console.log("ffff");
                if (json.error > 0) {
                    console.log('no ss');
                    alert("Ошибка");
                } else {
                    console.log('ss');
                    location.reload();
                }
            }
        })
    }
}


function getEditFormById(id) {


    $.ajax({
        url: window.BASE_DIR + `sections/getEditFormById/${id}/`,
        dataType: "html",
        type: "POST",
        success: function (html) {
            console.log("ffff");
            $('div.main').append(html);

            $('#edit_section_modal').on("hidden.bs.modal", function (e) {
                $(e.target).remove();
            });

            $('#edit_section_modal').modal("show");



        }
    })


}


