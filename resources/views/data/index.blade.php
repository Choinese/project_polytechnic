<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Data List</title>

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
</head>





<body>

  <h1>Admin panel (GM)</h1>

  <div class="container well">
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th>No.</th>
          <th>Student Name</th>
          <th>Student Id</th>
          <th>Character ID</th>
          <th>Score (1-10)</th>
        </tr>
      </thead>
      @foreach ($data as $item)
      <tbody>
        <tr onClick="changeImage('{{asset("storage/"  . "c" . sprintf("%02d", $item->avatar_type) . "/" . "c" .  sprintf("%02d", $item->avatar_type) . "_lv" . sprintf("%03d", $item->score) . ".png")}}')">
          <td>1</td>
          <td>{{$item['name']}}</td>
          <td>{{$item['id']}}</td>
          <td>{{$item['avatar_type']}}</td>
          <td>{{$item['score']}}</td>
        </tr>
      </tbody>
      @endforeach
    </table>

    <div id="showAvatar">
    </div>

  </div>

  <!-- insert table for tally here -->

</body>


<script>
  function changeImage(path) {
    var el = document.getElementById("showAvatar");
    el.innerHTML = '<img src="' + path + '" alt="Avatar" width="300" height="300">';
  }

  $('#myTable tbody td').click(function() {
    $('tr').removeClass('bg-success');
    $(this).parent().addClass('bg-success');
  });
</script>


</html>