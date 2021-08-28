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
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">

  <link rel="stylesheet" href="{{asset('css/common.css')}}">
</head>





<body>

  <h1 align="left">Admin panel (GM)</h1>

  @auth
  <p>Logged in as: {{Auth::user()->email}}</p>
  @endauth

  <form action="{{route('logout')}}" method="POST">
    @csrf
    <button>Log Out</button>
  </form>


  <div class="container">
    <div class="row">
      <div class="col-sm">
        No.
      </div>
      <div class="col-sm">
        Student Name
      </div>
      <div class="col-sm">
        Student Id
      </div>
      <div class="col-sm">
        Character ID
      </div>
      <div class="col-sm">
        Score (1-10)
      </div>
    </div>
  </div>


  <!-- <div class="container well">
    <table class="table table-hover" id="myTable">
      <thead>
        <tr>
          <th>No.</th>
          <th>Student Name</th>
          <th>Student Id</th>
          <th>Character ID</th>
          <th>Score (1-10)</th>
        </tr>
      </thead> -->

  @php
  $counter = array_fill(0,10,0);
  @endphp

  @foreach ($students as $item)

  @php
  $counter[$item->score-1]++;
  @endphp

  <div class="container">
    <div class="row" onClick="changeImage('{{asset("storage/"  . "c" . sprintf("%02d", $item->avatar_type) . "/" . "c" .  sprintf("%02d", $item->avatar_type) . "_lv" . sprintf("%03d", $item->score) . ".png")}}')">
      <div class="col-sm">
        <form action="{{route('student/delete', $item->id)}}" method="POST">
          @csrf
          @method("DELETE")
          {{$loop->index + 1}}
          <button>x</button>
        </form>
      </div>
      <div class="col-sm">
        {{$item['name']}}
      </div>
      <div class="col-sm">
        {{$item['id']}}
      </div>
      <div class="col-sm">
        {{$item['avatar_type']}}
      </div>
      <div class="col-sm">
        <form action="{{route('student/scoreEdit', $item->id)}}" method="POST">
          @csrf
          @method("PATCH")
          <span class="minus bg-dark">-</span>
          <input type="number" readonly="true" class="count" name="score" value="{{$item['score']}}">
          <span class="plus bg-dark">+</span>
          <button type="submit">✓</button>
        </form>
      </div>
    </div>
    <div class="row">
      <div id="showAvatar">
    </div>
    </div>
  </div>

  <!-- <tbody>
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
          <input type="number" readonly="true" class="count" name="score" value="{{$item['score']}}">
          <span class="plus bg-dark">+</span>
          <button type="submit">✓</button>
        </form>
      </td>
    </tr>
  </tbody> -->

  @endforeach


  <div class="container well">
    <table class="table table-bordered">
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
          <td align="left">Student Count</td>
          @foreach($counter as $score)
          <td>{{$score}}</td>
          @endforeach
        </tr>
      </tbody>
    </table>
  </div>


  <!-- Message -->
  @if(Session::has('message'))
  <p>{{ Session::get('message') }}</p>
  @endif

  <div>
    <!-- Form -->
    <form method='post' action='/uploadFile' enctype='multipart/form-data'>
      {{ csrf_field() }}
      <label for="file">Select file to import</label>
      <input type='file' name='file'>
      <input type='submit' name='submit' value='Import'>

    </form>
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