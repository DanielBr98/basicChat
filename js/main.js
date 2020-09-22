$(document).ready(function () {

    $(document).keypress(function (e) {
        if (e.which == 13) {

            if ($.trim($(".message").val()) == '') {

                $("#alert").show()
                $("#alert").html("<span>This field must be filled</span>")
                $(".message").css("border-color", "red")

            } else {

                $(".newMessage").click()
            }
        }
    })

    $(".newMessage").click(function () {
        if ($.trim($(".message").val()) != '') {

            user = $(this).val()
            message = $(".message").val()
            $.post('restrict/controller.php', {
                type: 1,
                user: user,
                message: message,
                form: "form"
            }, function (data) {
                if (data == 1) {
                    $("#alert").hide()
                    $(".message").css("border-color", "black")
                    $(".message").val("")
                    getChat()
                }
            })

        } else {

            $("#alert").show()
            $("#alert").html("<span>This field must be filled</span>")
            $(".message").css("border-color", "red")
        }
    })

    function getChat() {
        $.post("restrict/controller.php", {
            type: 2,
            form: "form"
        }, function (resposta, resp) {
            $("#listChat").html(resposta, resp)
        })
    }
})