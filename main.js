$(document).ready(function () {

    $(".newMessage").click(function () {

        if ($(".message").val() == '') {
            $("#alert").show()
            $("#alert").html("<span style='color:red'>This field must be filled</span>")
            $(".message").css("border-color", "red")
        } else {

            user = $(this).val();
            message = $(".message").val();
            $.post('modelChat.php', {
                type: 1,
                user: user,
                message: message,
            }, function (data) {
                if (data == 1) {
                    $("#alert").hide()
                    $(".message").css("border-color", "black")
                    $(".message").val("");
                    getChat()
                }
            });
        }

    });

    function getChat() {
        video = $(".videoNote").val();
        $.post("modelChat.php", {
            type: 2,
        }, function (resposta, resp) {
            $("#listChat").html(resposta, resp);
        });
    }
})