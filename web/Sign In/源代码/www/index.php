<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sign In</title>
    <script type="text/javascript">
        window.oncontextmenu = function () {return false};
        window.onselectstart = function () {return false};
        window.onkeydown = function () {
            if(event.keyCode == 123){
                event.keyCode = 0;
                event.returnValue = false;
            }
        }
    </script>
</head>
<body>
<h1>开启你的Web之旅的吧</h1>
<!-- TYCTF{test_flag}-->
</body>
</html>
