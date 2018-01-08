$(document).ready(function(){  

    fetch_login_form();
    //loading nav
    //$("#leftnav").load("leftnav.html");
    
    //ON CLICK OF NAV TABS add active class to li whose url is hit
    var url=window.location.href;
    var spliturl=url.split("/");
    var l=spliturl.length;
    var page=spliturl[l-1].split(".")[0];


    $(document).on('click', '.home',function(e){
      e.preventDefault();
      window.location.href='login.php';
    });
    
	 

    /*for fetching data rows*/
     function fetch_login_form()  
      {    
           $.ajax({  
                url:"login.php",  
                method:"GET",  
                success:function(data){  
                     $('#forms').html(data);
                 }  
           });  
      } 

      //on login submit button
      
    $(document).on('click', '#login_check',function(e){
          e.preventDefault();

           var login = btoa($("#login").val());
           var password = btoa($("#password").val());
           var data = {
                    login: login,
                    password: password
                };
            
            //null, 4 for intensation
            var jsonHolidays=JSON.stringify(data, null, 4);
            console.log(jsonHolidays);
            
          $.ajax({
            type: 'post',
            url: 'http://test.vaibhavnidhi.com/api/users/auth',
            data: data,
            success: function (data) {             
              var decoded=decodeURIComponent(this.data)
              if(data.usertype=='Admin'){
                console.log("Hello admin");
                location.href = "home.php"
              }
              else{
                 alert("Sorry, Your credentials do not match!");
              }
            }//end of success
          });//end of ajax
  });//end of function on click of loginSubmit button
});
