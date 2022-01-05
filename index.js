$(document).ready(function () {
    $("#backBtn").click(function() {
        $("#subTitle").nextAll().remove();
        $("#menuDiv").show();
        $("#resultDiv").css('visibility', 'hidden');
    });

    $("#reRecommandBtn").click(function() {
      $("#subTitle").nextAll().remove();
      $.get(
        "./normalRecommand.php",
        function(data){
          $("#resultDiv").append(data);
        });
    });

    $("#normalMenu").click(function() {
        $("#subTitle").nextAll().remove();
        $("#menuDiv").css('display', 'none');
        $("#resultDiv").css('visibility', 'visible');
        $("#reRecommandBtn").show();
        $.get(
          "./normalRecommand.php",
          function(data){
            $("#resultDiv").append(data);
          });
    });
    
    $("#weatherMenu").click(function() {
        $("#subTitle").nextAll().remove();
        $("#menuDiv").css('display', 'none');
        $("#resultDiv").css('visibility', 'visible');
        $.get(
          "./weatherRecommand.php",
          function(data){
            alert(data);
          });
    });
    
    $("#kakaoMessageSendBtn").click(function() {
        $.post(
          "./sendMessage.php",
          {
            name1: $("#menu1_1").text(),
            name2: $("#menu1_2").text()
          },
          function(data) {
            alert(data);
          }
        )
    });

    $("#logoutBtn").click(function() {
        $.post(
          "./logout.php",
          {

          },
          function(data) {
            $(location).attr('href', './login.php');
          }
        )
    });

  });
