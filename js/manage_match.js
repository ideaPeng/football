$(document).ready(function () {
    $('.dbtn').click(function () {
        if (!confirm("Are you sure to DELETE the game? It is UNRECOVERBLE! ")) {
            return false;
        }

        $mid = $(this).parent().parent().parent().find('td').eq(0).text();
        $.ajax({
            type: "post",
            dataType: "html",
            url: './service/mdelete.php',
            data: {"mid": $mid},
            success: function (data) {
                alert(data);
                window.location.href = 'manage_match.php';
            }
        });
    });

    $('.ubtn').click(function () {
        $mid = $(this).parent().parent().parent().find('td').eq(0).text();
        window.location.href = "update_match.php?mid=" + $mid;
    });
});
