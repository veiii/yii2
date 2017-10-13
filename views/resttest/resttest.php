<html>
<head>
    <title>jQuery Test</title>
    <script type="text/javascript" src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {

            $("#submit").click(function(){

                $.ajax({
                    url: "resttest/create",
                    type: "POST",
                    data: {
                        id: $("#id").val(),
                        name: $("#name").val(),
                    },
                    dataType: "JSON",
                    success: function (jsonStr) {
                        $("#result").text(JSON.stringify(jsonStr));
                    }
                });

            });

        });
    </script>
</head>
<body>
<div id="result"></div>
<form name="contact" id="contact" method="post">
    Amount : <input type="text" name="id" id="id"/><br/>
    firstName : <input type="text" name="name" id="name"/><br/>
    <input type="button" value="Get It!" name="submit" id="submit"/>
</form>

</body>
</html>