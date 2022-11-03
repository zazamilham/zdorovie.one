<?php get_header();  ?>
<!-- страница списка записей блога -->


<div data-menuanchor="p1" class="bg bg2"></div>
<!-- ИНДЕКС -->
<div class="fullpage">
  <div class="search__wrap">
    <div class="search__close-inner">
      <div class="search__close"></div>
    </div>
    <div class="search__inner">

      <i class="fas fa-search"></i>
      <?php echo do_shortcode('[wpdreams_ajaxsearchlite]'); ?>
    </div>
  </div>
  <section class="section">
    <div class="wrap">

      <div class="section__container" style="word-wrap: break-word;">
        <?
        $page = 0;
        while (true) {
          echo $page . '<br>';
          echo "время: " . time() . "<br>";
          echo "время2: " . time() + 64 . "<br>";


          // echo "<br><br><br>пробуем второй вариант<br><br>";

          $header = ["alg" => "HS512", "typ" => "JWT"];
          $payload = ["iss" => 'c3f21da7-6943-4205-b6ea-f21d2813f05a', "iat" => time(), "exp" => time() + 64];
          // $signature = 'HMACSHA512(' . base64_encode(json_encode($header)) . '.' . base64_encode(json_encode($payload)) . ', aa7b81540d4fc02a708f332ea456eb651f0b8a60d9dc8b390cbbdc67e1931c06)';

          $header_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($header)))));
          $payload_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($payload)), '=')));
          $signature_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(hash_hmac('sha512', $header_base64 . '.' . $payload_base64, 'aa7b81540d4fc02a708f332ea456eb651f0b8a60d9dc8b390cbbdc67e1931c06', true)), '=')));
          $apiKey = $header_base64 . '.' . $payload_base64 . '.' . $signature_base64;
          echo 'ИТОГО: ' . $apiKey;


          // =============================================

          echo '<br><br><br>';
          echo "<br><br><br> МЕДОДС <br><br><br>";

          $price = wp_remote_get('https://mediczdrav.medods.ru/api/v2/entry_types?onlineAccess=true&limit=100&offset=' . $page, array(  //задаем параметры запроса к API для списка услуг
            'headers' => array(
              'Authorization' => $apiKey
            )
          ));

          if (wp_remote_retrieve_response_code($price) === 200) {
            echo 'код 200<br>';
          }
          if (wp_remote_retrieve_response_code($price) === 422) {
            echo 'Отсутствует обязательное поле или ошибка валидации<br>';
          }
          if (wp_remote_retrieve_response_code($price) === 403) {
            echo 'Error: response status is 403<br>';
          }


          $price_decode = json_decode(wp_remote_retrieve_body($price, true))->data;  //декодируем ответ
          if ($price_decode) {
            echo "<pre>";
            print_r($price_decode);
            echo "</pre>";
            // print_r($price_decode . '<br>'); 

            $page = $page + 100;
            sleep(1);
          } else {
            break;
          }
        }



        ?>
      </div>
    </div>
  </section>





  <?php get_footer(); ?>