<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Tiny it - Free Url shortening service </title>
    <link rel="stylesheet" href="css/app.css">
</head>
<body>
    @yield('content')
</body>
<script>
    function copyUrl() {
      var copyText = document.getElementById("short-url");
      copyText.select();
      copyText.setSelectionRange(0, 99999)
      document.execCommand("copy");
    //   alert("Copied the text: " + copyText.value);
    }
</script>
</html>