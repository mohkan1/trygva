$(document).ready(function() {
    // Getting the input data when the submit button is clicked
    // Sign in Ajax
    $("#submit_sign_in").click(function() {
      var name = $("#name2").val();
      var phone_number = $("#phone_number2").val();
      var email = $("#email2").val();
      var password = $("#password2").val();
      // if (name == "" || email == "" || password == "") {
      //   alert("Please fill all fields!");
      //   return false;
      // }
      // Ajax POST Call
      $.ajax({
        type: "post",
        url: "<?php echo base_url("/public/users/create"); ?>",
        data: {
          "name": name,
          "phone_number": phone_number,
          "email": email,
          "password": password,
        },
        cache: false,
        success: function(data) {
          alert(data);
        },
        error: function(e, status, error) {
          console.error(e);
        },
      });
    });

    // Logga in Ajax
    $("#submit_logga_in").click(function() {
      var email = $("#email1").val();
      var password = $("#password1").val();
      // if (name == "" || email == "" || password == "") {
      //   alert("Please fill all fields!");
      //   return false;
      // }
      // Ajax POST Call
      $.ajax({
        type: "post",
        url: "<?php echo base_url("/public/users/check"); ?>",
        data: {
          "email": email,
          "password": password,
        },
        cache: false,
        success: function(data) {
          alert(JSON.stringify(data));
        },
        error: function(e, status, error) {
          console.error(e);
        },
      });
    });

    function getUsers() {
      axios.post('http://localhost/CodeIgniter/public/users')
        .then((response) => {
          $("#listOfUsers").empty();
          for (let user of response.data) {
            console.log("UserName: " + user.name + "  UserEmail: " + user.email);
            $("#listOfUsers").append(`<li class="list-group-item">UserName: ${user.name}</li>`);
            $("#listOfUsers").append(`<li class="list-group-item">UserEmail: ${user.email}</li>`);
            $("#listOfUsers").append(`<br>`);
          }
        }, (error) => {
          console.log(error);
        });

    }

    // Get list of all the users
    var state = true
    $("#showUsers").on("click", function() {
      if (state) {
        getUsers();
        state = false
      } else {
        $("#listOfUsers").empty();
        state = true
      }
    });


  });