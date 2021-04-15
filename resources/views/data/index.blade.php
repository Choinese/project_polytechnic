<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data List</title>
</head>

<body>

  <h1>Admin panel (GM)</h1>

  <table class="table table-hover" id=myTable>
    <thead>
      <tr>
        <th>Student Name</th>
        <th>Student Id</th>
        <th>Character ID</th>
        <th>Score (1-10)</th>
        <!-- <th>Avatar</th> -->
      </tr>
    </thead>
    @foreach ($data as $item)
    <tbody>
      <tr>
        <td>{{$item['name']}}</td>
        <td>{{$item['id']}}</td>
        <td>{{$item['avatar_type']}}</td>
        <td>{{$item['score']}}</td>
        <!-- <td><img src="{{asset("storage/"  . "c" . sprintf("%02d", $item->avatar_type) . "/" . "c" .  sprintf("%02d", $item->avatar_type) . "_lv" . sprintf("%03d", $item->score) . ".png")}}" alt="Avatar"></td> -->
      </tr>
    </tbody>
    @endforeach
  </table>

  <div id="showAvatar">

  </div>

  <!-- The expanding image container -->
  <div class="container">
    <!-- Close the image -->
    <span onclick="this.parentElement.style.display='none'" class="closebtn">&times;</span>

    <!-- Expanded image -->
    <img id="expandedImg" style="width:100%">

    <!-- Image text -->
    <div id="imgtext"></div>
  </div>


</body>

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

<script src="{{ asset('/js/myApp.js') }}"></script>

<script>
  function myFunction(imgs) {
    // Get the expanded image
    var expandImg = document.getElementById("expandedImg");
    // Get the image text
    var imgText = document.getElementById("imgtext");
    // Use the same src in the expanded image as the image being clicked on from the grid
    expandImg.src = imgs.src;
    // Use the value of the alt attribute of the clickable image as text inside the expanded image
    imgText.innerHTML = imgs.alt;
    // Show the container element (hidden with CSS)
    expandImg.parentElement.style.display = "block";
  }

  $('#myTable tbody tr').click(function() {
    $(this).addClass('bg-success').siblings().removeClass('bg-success');
  });

  function addRowHandlers() {
    var rows = document.getElementById("myTable").rows;
    for (i = 0; i < rows.length; i++) {
      rows[i].onclick = function() {
        return function() {
          var el = document.getElementById("showAvatar");
          el.innerHTML = '<img src="{{asset("storage/"  . "c" . sprintf("%02d", $data['+i+']["avatar_type"]) . "/" . "c" .  sprintf("%02d", $data['+i+']["avatar_type"]) . "_lv" . sprintf("%03d", $data['+i+']["score"]) . ".png")}}" alt="Avatar">'
        };
      }(rows[i]);
    }
  }
  window.onload = addRowHandlers();
</script>

</html>