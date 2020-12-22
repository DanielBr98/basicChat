$(document).ready(function () {

    $(document).keypress(function (e) {
        if (e.which == 13) {

            if ($.trim($("#message").val()) == '') {

                $("#alert").show()
                $("#alert").html("<span>This field must be filled</span>")
                $("#message").css("border-color", "red")

            } else {

                $("#submit").click()
            }
        }
    })

    $('#submit').click(function () {

        if ($.trim($("#message").val()) != '') {

            $(".loading").html("<div style='margin-left:50%' class='spinner-border' role='status'><span class='sr-only'>Loading...</span></div>")
            user = $('#user').val()
            message = $("#message").val()
            $("#message").val("")

            setTimeout(function () {
                $.post('controller/controller.php', {
                    type: 1,
                    user: user,
                    message: message,
                    form: "form"
                }, function (data) {
                    if (data == 1) {
                        $("#alert").hide()
                        $("#message").css("border-color", "black")
                        getChat()
                    }
                })
                $(".loading").html('')
            }, 500);

        } else {

            $(".loading").html('')
            $("#alert").show()
            $("#alert").html("<span>This field must be filled</span>")
            $("#message").css("border-color", "red")
        }
    })

    function getChat() {
        $.post("controller/controller.php", {
            type: 2,
            form: "form"
        }, function (resposta, resp) {
            $("#listChat").html(resposta, resp)
        })
    }
})