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
                window.location.href = 'admin_home.php';
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
            url: './service/user_quit.php',
            data: {"mid": $mid, "uname": $uname},
            success: function (data) {
                alert(data);
                window.location.href = 'admin_match.php';
            }
        });
    });

    $('.uadmin').click(function () {
        $current_user = $(this).parent().parent().find('td').eq(0).text();
        $uname = $(this).parent().parent().find('td').eq(1).text();
        if( $current_user =='superadmin'){
            $.ajax({
                type: "post",
                dataType: "html",
                url: './service/add_admin.php',
                data: {"uname": $uname},
                success: function (data) {
                    alert(data);
                    window.location.href = 'manage_user.php';
                }
            });
        }else{
            alert("Only Super Administrator can add Administrator");
            window.location.href = 'manage_user.php';
        }

    });

    $('.udelete').click(function () {
        $uname = $(this).parent().parent().find('td').eq(1).text();
        if ($uname === "superadmin") {
            alert("You can not delete the Super Administrator");
            window.location.href = 'manage_user.php';
        } else {
            if (!confirm("Warning! You are DELETING a user!")) {
                return false;
            }
            $.ajax({
                type: "post",
                dataType: "html",
                url: './service/user_delete.php',
                data: {"uname": $uname},
                success: function (data) {
                    alert(data);
                    window.location.href = 'manage_user.php';
                }
            });
        }
    });
});
