<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <title>GETAPI</title>
</head>
<body>
    <h3>ID検索できちゃうよ</h3>
    <div class="form">
        <input class="input_text" type="text" style="width: 200px;height: 23px;">
        <button class="submit">送信</button>
    </div>
    <div class="result" style="margin-top: 50px;">
        
    </div>
    <script src="../../jquery.js"></script>
    <script>
        $(function() {
            $('.submit').on('click', function(){
                var id = $('.input_text').val();
                // console.log(text);
                $.ajax({
                    type: "POST",
                    url: "http://localhost:8888/test/json_hello/" ,
                    datatype: "json",
                    data: {id: id}
                })
                .done(function(response){
                    console.log(response);
                    $('.result').append('<p>' + id + ': ' + response.text + '</p>');
                });
            });
        });
    </script>
</body>
</html>
