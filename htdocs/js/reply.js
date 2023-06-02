$(function(){
    $("#rep_btn").click(function(){
        $.ajax({
            url : "reply_ok.php",
            type : "post",
            date : {
                "bno" : $(".bno").val(),
                "dat_user" : $(".dat_user").val(),
                "dat_pw" : $(".dat_pw").val(),
                "rep_con" : $(".rep_con").val(),
            },
            success : function(data){
                alert("댓글이 작성되었습니다");
                location.reload();
            }
        });
    });

    $(".dat_del_btn").click(function(){
        $("#rep_modal_del").modal();
    });
});