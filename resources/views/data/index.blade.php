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

  <link rel="stylesheet" href="{{asset('css/common.css')}}">
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
          <td>
            <form action="{{route('student/delete', $item->id)}}" method="POST">
              @csrf
              @method("DELETE")
              {{$loop->index + 1}}
              <button>x</button>
            </form>
          </td>
          <td>{{$item['name']}}</td>
          <td>{{$item['id']}}</td>
          <td>{{$item['avatar_type']}}</td>
          <td>
            <form action="{{route('student/scoreEdit', $item->id)}}" method="POST">
              @csrf
              @method("PATCH")
              <span class="minus bg-dark">-</span>
              <input type="number" class="count" name="score" value="{{$item['score']}}">
              <span class="plus bg-dark">+</span>
              <button>✓</button>
            </form>

          </td>
        </tr>
      </tbody>
      @endforeach
    </table>

    <div id="showAvatar">
    </div>

  </div>

  <div class="container well">
    <table class="table">
      <thead>
        <tr>
          <th>Score</th>
          <th>1</th>
          <th>2</th>
          <th>3</th>
          <th>4</th>
          <th>5</th>
          <th>6</th>
          <th>7</th>
          <th>8</th>
          <th>9</th>
          <th>10</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td>Count</td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
          <td></td>
        </tr>
      </tbody>
    </table>
  </div>

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

  $(document).ready(function() {
    $('.count').prop('disabled', true);
    $(document).on('click', '.plus', function() {
      $(this).parent().find('.count').val(parseInt($(this).parent().find('.count').val()) + 1);
      if ($(this).parent().find('.count').val() > 10) {
        $(this).parent().find('.count').val(10);
      }
    });
    $(document).on('click', '.minus', function() {
      $(this).parent().find('.count').val(parseInt($(this).parent().find('.count').val()) - 1);
      if ($(this).parent().find('.count').val() == 0) {
        $(this).parent().find('.count').val(1);
      }
    });
  });
</script>


</html>