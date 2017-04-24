$(document).ready(function () {
    $('.ujoin').click(function () {
        $mid = $(this).parent().parent().find('td').eq(0).text();
        $uname = $(this).parent().parent().find('td').eq(1).text();
        $.ajax({
            type: "post",
            dataType: "html",
            url: './service/user_join.php',
            data: {"mid": $mid, "uname": $uname},
            success: function (data) {
                alert(data);
                window.location.href = 'player_home.php';
            }
        });
    });

    $('.uquit').click(function () {
        if (!confirm("Are you sure to QUIT the match?")) {
            return false;
        }
        $mid = $(this).parent().parent().find('td').eq(0).text();
        $uname = $(this).parent().parent().find('td').eq(1).text();

        $.ajax({
            type: "post",
            dataType: "html",
            url: '/service/user_quit.php',
            data: {"mid": $mid, "uname": $uname},
            success: function (data) {
                alert(data);
                window.location.href = '/player_home.php';
            }
        });
    });
});
