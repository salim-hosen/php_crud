$(document).ready(function(){

  var delId,pageNum = 0;

  // Login Form Functionality

  $("#loginForm").submit(function(){
    var username = $("#username").val();
    var password = $("#password").val();
    var form = $("#login").val();

    var dataValue = "username="+username+"&password="+password+"&loginForm="+form;

    $.ajax({
      url: "main.php",
      type: "POST",
      dataType: "html",
      data: dataValue,
      success: function(data){
        if(data == "success"){
          window.location = "index.php";
        }else{
          $(".allErrors").html(data).fadeIn("slow");
        }
      }
    });

    setTimeout(function(){
      $(".allErrors,.allSuccess").fadeOut("slow");
    },3000);
    return false;
  });

  // Add Employee To the Table

  $(document).on('submit',"#empForm",function(){
    var name = $("#name").val();
    var id = $("#id").val();
    var emId = $("#emid").val();
    var phone = $("#phone").val();
    var email = $("#email").val();
    var designation = $("#designation").val();
    var form = $("#addEmp").val();

    var dataValue = "em_id="+emId+"&name="+name+"&id="+id+"&phone="+phone+"&email="+email+
    "&designation="+designation+"&empForm="+form;

    $.ajax({
      url: "main.php",
      type: "POST",
      dataType: "html",
      data: dataValue,
      success: function(data){
        window.scrollTo(0,0);
        if(data.startsWith("<tr>")){
          $(".allSuccess").html("Inserted Successfully.").fadeIn("slow");
          $("tbody").html(data);
        }else{
          $(".allErrors").html(data).fadeIn("slow");
        }
      }
    });

    setTimeout(function(){
      $(".allErrors,.allSuccess").fadeOut("slow");
    },3000);
    return false;
  });

  // Delete Employee Data
  $(document).on('click',".delete,#yes,#no",function(event){
    $("#confirm-box").show("slow");
    var confirm;
    if(event.target.id === "yes" || event.target.id === "no"){
      confirm = event.target.id;
    }else{
      delId = event.target.id;
    }

    if(confirm === "yes"){
      $("#confirm-box").hide("slow");

      var dataValue = "id="+delId+"&action=delete";

      $.ajax({
        url: "main.php",
        type: "POST",
        dataType: "html",
        data: dataValue,
        success: function(data){
          window.scrollTo(0,0);
          if(data.startsWith("<tr>")){
            $(".allSuccess").html("Deleted Successfully.").fadeIn("slow");
            $("tbody").html(data);
          }else{
            $(".allErrors").html(data).fadeIn("slow");
          }
        }
      });
    }else if(confirm === "no"){
      $("#confirm-box").hide("slow");
      window.scrollTo(0,0);
      $(".allNotice").html("You didn't Delete Employee.").fadeIn("slow");
    }

    setTimeout(function(){
      $(".allErrors,.allSuccess,.allNotice").fadeOut("slow");
    },3000);
    event.preventDefault();
    return false;
  });

  $(document).on('click','.edit',function(e){
    var id = $(this).attr("id");
    e.preventDefault();
    var dataValue = "id="+id+"&action=edit";

    $.ajax({
      url: "main.php",
      type: "POST",
      dataType: "html",
      data: dataValue,
      success: function(data){
        if(data == "fail"){
          alert("Failed to Fetch Employee Data.");
        }else{
          var jsonObj = JSON.parse(data);
          $("#upname").val(jsonObj.name);
          $("#upid").val(jsonObj.id);
          $("#emid").val(jsonObj.em_id);
          $("#upphone").val(jsonObj.phone);
          $("#upemail").val(jsonObj.email);
          $("#updesignation").val(jsonObj.designation);

          $("#custom-modal").slideDown("slow");
        }
      }
    });

    return false;
  });

  $("#close").click(function(){
    $("#custom-modal").slideUp();
  });

  // Update Employee Data
  $(document).on('submit','#upEmpForm',function(){
    var name = $("#upname").val();
    var id = $("#upid").val();
    var emId = $("#emid").val();
    var phone = $("#upphone").val();
    var email = $("#upemail").val();
    var designation = $("#updesignation").val();
    var form = $("#upEmp").val();

    var dataValue = "em_id="+emId+"&name="+name+"&id="+id+"&phone="+phone+"&email="+email+
    "&designation="+designation+"&upForm="+form;

    $.ajax({
      url: "main.php",
      type: "POST",
      dataType: "html",
      data: dataValue,
      success: function(data){
        if(data == "success"){
          window.scrollTo(0,0);
          $(".upSuccess").html("Updated Successfully.").fadeIn();
          setTimeout(function(){
            $(".upSuccess").fadeOut("slow");
            $("#custom-modal").fadeOut();
            location.reload();
          },2000);
        }else{
          window.scrollTo(0,0);
          $(".upFail").html(data).fadeIn();
          setTimeout(function(){
            $(".upFail").fadeOut("slow");
          },2000);
        }
      }
    });

    return false;
  });

  $(document).on("click","#next,#prev",function(event){
    var totPage = $("#totPage").val();

    if(event.target.id === "next"){
      pageNum++;
    }else if(event.target.id === "prev"){
      pageNum--;
    }

    var dataValue = "pageNum="+pageNum+"&action=pagination";

    $.ajax({
      url: "main.php",
      type: "POST",
      dataType: "html",
      data: dataValue,
      success: function(data){
        if(data === "fail"){
          alert("Failed to Fetch Data.");
        }else{
          $("tbody").html(data);
        }
      }
    });
    if(pageNum > 0){
      $("#prev").show();
    }else{
      $("#prev").hide();
    }
    if(pageNum+1 == totPage){
      $("#next").hide();
    }else{
      $("#next").show();
    }
    return false;
  });

  // Search Field
  $(document).on("keyup","#search",function(){
    var value = $(this).val();
    if(value !== ""){
      var dataValue = "search="+value+"&action=search";

      $.ajax({
        url: "main.php",
        type: "POST",
        data: dataValue,
        dataType: "html",
        success: function(data){
          if(data === "fail"){
            $("tbody").html("<tr><td colspan='7'>No Data Available</td></tr>");
          }else{
            $("tbody").html(data);
          }
        }
      });
      $("#prev,#next").hide();
    }else{
      location.reload();
    }
    return false;
  });

});
