<?php get_header();  ?>
<!-- страница списка записей блога -->


<!-- ИНДЕКС -->
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

            <table>
                <tbody>
                    <tr style="outline: solid; background: lightgray;">
                        <td>статус</td>
                        <td>название</td>
                        <td>ID Medods</td>
                        <td>ID WP</td>
                    </tr>

                    <?

      // =======================================
      // ===============ВЫГРУЗКА================
      // =======================================

      // сначала получим все страницы врачей и обнулим статус on/off

       $docs = get_posts([
        'posts_per_page' => -1,
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'post_type'    => 'doctors',
        'post_status'  => 'any',
      ]);

       if ($docs) {
        foreach ($docs as $doc) {
         $my_post = [
            'ID' => $doc->ID,
            'meta_input' => [
              'doctors_active' => 'off',
            ],
          ];

          // Обновляем
          wp_update_post( wp_slash($my_post) );
        }
      }

      // // а теперь начинаем выгрузку
      $ERROR_count = 0;
      $POST_count = 0;

      // // получаем пост из WP по искомому ID в Medods
      function find_WP_ID($findID)
      {
        // global $post;
        $WP_posts = get_posts([
          'posts_per_page' => -1,
          'post_type' => 'doctors',
          'post_status' => 'any',
          'meta_key' => 'doctors_id',
          'meta_value' => $findID
        ]);

        if ($WP_posts) {
          // echo "<pre>";
          // print_r($WP_posts[0]);
          // echo "</pre>";
          return $WP_posts[0];
        } else {
          return null;
        }
        wp_reset_postdata();
      }
      // // END получаем посты из WP

      // // создаем или обновляем запись в базе WP
      function array_print_doctors($arr)
      {

          // echo '<pre>';
          // print_r($arr);
          // echo '</pre>';

        foreach ($arr as $item) {

          $find_item = find_WP_ID($item->id);
          if ($find_item) {
            $status = 'запись обновлена';
            $ID = $find_item->ID;
            $post_status = $find_item->post_status;
            $post_content = $find_item->post_content;
          }
          else {
            $status = 'запись добавлена';
            $ID = '';
            $post_status = 'draft';
            $post_content = '';
          }
         
          $doctors_spec_arr =  $item->specialties;
          $doctors_spec = '';
            foreach ($doctors_spec_arr as $spec) {
              if (!$doctors_spec){
                $doctors_spec .= $spec->title;
              }else {
                $doctors_spec .= ', ' . $spec->title;
              }
            }
          $name = $item->surname . ' ' . $item->name . ' ' . $item->secondName;
            //  echo 'find_item ' . $find_item . '<br>';
            //  echo 'ID ' . $ID . '<br>';
            //  echo 'post_status ' . $post_status . '<br>';
            //  echo 'post_content ' . $post_content . '<br>';
            //  echo 'doctors_spec ' . $doctors_spec . '<br>';
            //  echo 'name ' . $name . '<br>';
          // Создаем массив данных новой записи
          $post_data = array(
            'ID'            => $ID,
            'post_title'    => $name,
            'post_name'     => $name,
            'post_status'   => $post_status,
            'post_type'     => 'doctors',
            'post_author'   => 6,
            'post_content' => $post_content,
            'meta_input'   => array(
              'doctors_id' => $item->id,
              'doctors_clinics' => $item->clinicIds, 
              'doctors_spec' => $doctors_spec,
              'doctors_active' => 'on'
            ),
          );

          // Вставляем запись в базу данных
          $post_id = wp_insert_post(wp_slash($post_data), true);

          if (is_wp_error($post_id)) {
            echo $post_id->get_error_message() . ': ' . $item->id . '<br>';
            // $ERROR_count++;
          } else {

            echo '<tr style="outline: solid;">';
            echo '<td>' . $status . '</td>';
            echo '<td>' . $name . '</td>';
            echo '<td>' .  $item->id . '</td>';
            echo '<td>' . $post_id . '</td>';
            echo '</tr>';
          }
        }
      }
      // END создаем или обновляем запись в базе WP


      // получаем список врачей из Medods
      $page = 0;
      while (true) {
        $header = ["alg" => "HS512", "typ" => "JWT"];
        $payload = ["iss" => 'c3f21da7-6943-4205-b6ea-f21d2813f05a', "iat" => time(), "exp" => time() + 64];
        $header_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($header)))));
        $payload_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($payload)), '=')));
        $signature_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(hash_hmac('sha512', $header_base64 . '.' . $payload_base64, 'aa7b81540d4fc02a708f332ea456eb651f0b8a60d9dc8b390cbbdc67e1931c06', true)), '=')));
        $apiKey = $header_base64 . '.' . $payload_base64 . '.' . $signature_base64;
        // echo 'ИТОГО: ' . $apiKey;
        $doctors = wp_remote_get('https://mediczdrav.medods.ru/api/v2/users?status=active&hasAppointment=true&availabilityForOnlineRecording=available&limit=100&offset=' . $page, array(  //задаем параметры запроса к API для списка услуг
          'headers' => array(
            'Authorization' => $apiKey
          )
        ));

        if (wp_remote_retrieve_response_code($doctors) === 200) {
          // echo 'код 200<br>';
        }
        if (wp_remote_retrieve_response_code($doctors) === 422) {
          echo 'Отсутствует обязательное поле или ошибка валидации<br>';
        }
        if (wp_remote_retrieve_response_code($doctors) === 403) {
          echo 'Error: response status is 403<br>';
        }

        $doctors_decode = json_decode(wp_remote_retrieve_body($doctors, true))->data;  //декодируем ответ
        if ($doctors_decode) {

          // создаем или обновляем запись в базе WP
          array_print_doctors($doctors_decode);

          $page = $page + 100;
          sleep(1);
        } else {
          break;
        }
      }
      // END получаем список услуг из Medods

      // echo '<br>Успешно добавлено или обновлено: ' . $POST_count . '<br>';
      // echo '<br>Ошибок за цикл: ' . $ERROR_count . '<br>';
      ?>
                </tbody>
            </table>
        </div>
    </div>
</section>





<?php get_footer(); ?>