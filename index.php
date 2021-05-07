<?php
require("dbconnection.php");
?>

<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-eOJMYsd53ii+scO/bJGFsiCZc+5NDVN2yr8+0RDqr0Ql0h+rP48ckxlpbzKgwra6" crossorigin="anonymous">

  <title>Quick Searach</title>
  <style>
    ul {
      list-style: none;
      text-decoration: none;
      background-color: sandybrown;
    }

    body div1 {
      display: flex;
      justify-content: center;
      align-item: center;
      flex-direction: row;
    }
  </style>
</head>

<body>
  <div class="div1">
    <h2>Search bar</h2>
    <input type="text" id="name" class="sm-form-control" name="name" onkeyup="callme(this.value)" placeholder="name" require>
    <ul id="list">
    </ul>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script>
    function callme(e) {
      if(val == 0){
        var val = document.getElementById('name').value;
      }
      else
      {
      document.getElementById("list").innerHTML = ``;
      $.ajax({
        url: "search.php",
        type: "post",
        data: {
          "name": e
        },
        success: function(response) {
          // console.log(response);
          let data = JSON.parse(response);
          // console.log(data);
          for (x in data) {
            // console.log(data[x]['name']); 
            document.getElementById("list").innerHTML +=
              `<a href=""><li>${data[x]['name']}</li></a>`;
          }
        },
        error: function(jqXHR, textStatus, errorThrown) {
          //    console.log(textStatus, errorThrown);
        }
      });
      }
    }
  </script>

</body>

</html>
<!-- <?php
      require("search.php");
      ?> -->