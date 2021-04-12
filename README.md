# access_api

jqueryのajaxとPHPcurlで自作したAPIを叩く。

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

```
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
```
<br>
application/controllers/welcome.php<br>
PHPモジュールのcurlを使用してGETで叩く<br>
<br>


```
public function curl_get()
{
      $base_url = 'http://web/test/json_hello/';
      $id = 1;

      $curl = curl_init();

      $option = [
                  CURLOPT_URL => $base_url.$id,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false,
                  CURLOPT_SSL_VERIFYHOST => false
                  ];

      curl_setopt_array($curl, $option);

      header('Content-Type: application/json; charset=utf-8');
      $response = curl_exec($curl);
      var_dump($response);

      curl_close($curl);
}

```
同じくPOSTで叩く
```
public function curl_post()
{
      $base_url = 'http://web/test/json_hello';
      // $base_url = 'http://web/try/';

      $data = ['id' => 2];

      $curl = curl_init();

      $option = [
                  CURLOPT_URL => $base_url,
                  CURLOPT_RETURNTRANSFER => true,
                  CURLOPT_SSL_VERIFYPEER => false,
                  CURLOPT_SSL_VERIFYHOST => false,
                  CURLOPT_POST => true,
                  CURLOPT_POSTFIELDS => http_build_query($data),
                  CURLOPT_FOLLOWLOCATION => true
                  ];

      curl_setopt_array($curl, $option);

      $response = (array)json_decode(curl_exec($curl));
      var_dump($response);
      extract($response);
      echo $text;
}
    
```
