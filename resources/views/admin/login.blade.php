<!DOCTYPE html>
<html >
<head>
  <meta charset="UTF-8">
    <title>Login Form</title>
      <link rel="stylesheet" href="{{ url('admin_assets/css/login_style.css') }}">
</head>
<body>
    <html lang="en-US">
<head>
    <meta charset="utf-8">
        <title>Login</title>
        <base href="{{ asset('') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:400,700">
</head>
    <div id="login">
        @if(count($errors) >0 )
            <div class="alert alert-danger">
                @foreach($errors->all() as $err)
                {{ $err }} <br>
                @endforeach
            </div>
        @endif
        @if(session('thongbao'))
        <div class="alert alert-success">
            {{ session('thongbao') }}
        </div>
        @endif
        <form name='form-login' action="admin/login" method="POST">
            <span class="fontawesome-user"></span>
            <input type="text" id="user" placeholder="Email">
            <span class="fontawesome-lock"></span>
            <input type="password" id"pass" placeholder="Password">
            <input type="submit" value="Login">
        </form>
</body>
</html>
