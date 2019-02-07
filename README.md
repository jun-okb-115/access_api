# access_api

非同期であるjqueryのajaxとPHPのモジュールcurlで自作したAPIを叩く。

使用環境<br><br>

CodeIgniter '3.2.0-dev'<br>　
php '7.1'<br>
mysql '5.7'v
<br><br>
ローカル環境<br>
docker<br> nginx<br>
<br>
application/views/get_api.php<br>
Ajaxを使用してAPIにアクセス<br>
 ```<script src="../../jquery.js"></script>
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
    
   vff

