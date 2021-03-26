$(document).ready(function () {

  $('#regForm').submit(function (event) {
    event.preventDefault();
    let form = $(event.target);

    let formData = form.serializeArray();
    let data = [];

    for (let item in formData) {
      data[formData[item]['name']] = formData[item]['value'];
    }

    if (data['password'] != data['password_confirm']) {
      $(".pass_error").removeClass("d-none");
      setTimeout(function () {
        $(".pass_error").addClass("d-none");
      }, 3000);
      return false;
    }

    let obj = {};
    Object.assign(obj, data);
    console.log("before ajax");
    $.ajax({
      url: "/korotkov/NewHotel/reg/registration/",
      type: "POST",
      data: obj,
      dataType: "json",
      success: function (json) {
        console.log(json.error.length);
        if (json.error.length > 0) {
          console.log("bad");
          $(".server_error").text(json.error).removeClass("d-none");
        }
        else {
          console.log("good");
          let modal = `
                    <div class="modal" id="success_reg" tabindex="-1">
                        <div class="modal-dialog">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title">Добро пожаловать, ${obj.name}</h5>
                              <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <p>Регистрация прошла успешно.</p>
                            </div>
                            <div class="modal-footer">
                              <button type="button" class="btn btn-primary" data-dismiss="modal">OK</button>
                            </div>
                          </div>
                        </div>
                    </div>
                    `;
          $('body').append(modal);
          console.log("2good");
          let modalObj = new bootstrap.Modal(document.getElementById('success_reg'));
          modalObj.show();
          $('#success_reg').on('hide.bs.modal', function (event) {
            location.href = '/korotkov/NewHotel/lk/';
          })


        }
      },

    })
  })

})


function openDialogLogin() {

  console.log(window.BASE_DIR_AJAX + "/loginForm.php");

  $.ajax({
    url: window.BASE_DIR_AJAX + "/loginForm.php",
    dataType: "html",
    success: function (html) {
      console.log("Успех");
      $('body').append(html);
      console.log("2good");
      let modalObj = new bootstrap.Modal(document.getElementById('login_form'));

      $('#login_form').on('hide.bs.modal', function (event) {
        $(this).remove();
      })

      $('#login_form').submit(function (event) {
        globalLogin(event);
      })

      modalObj.show();
    }
  })

}

function globalLogin(event) {
  event.preventDefault();

  let form = $(event.target);

  let form_data = form.serializeArray();

  $.ajax({
    url: "/korotkov/NewHotel/reg/login/",
    type: "POST",
    data: form_data,
    dataType: "json",
    beforeSend: function () {
      console.log("bs");
      form.find('input').each(function (i, e) {
        $(e).attr('disabled', 'disabled');
      });

      form.find('.alert-danger').addClass('d-none')
      form.find('button[type="submit"]').hide();
      form.find('.loader12').removeClass('d-none');      
    },


    success: function (json) {

      if (json.error != '') {
        form.find('.alert-danger').removeClass('d-none').html(json.error);

        form.find('input').each(function (i, e) {
          $(e).removeAttr('disabled');
        });


        form.find('button[type="submit"]').show();
        form.find('.loader12').addClass('d-none');
      }else{
        location.reload();
      }

    },
  })

}