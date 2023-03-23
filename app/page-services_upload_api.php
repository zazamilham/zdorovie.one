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
            <td>тип</td>
            <td>ID Medods</td>
            <td>ID WP</td>
            <td>Таксономия</td>
          </tr>
          <?

      // =======================================
      // ===============ВЫГРУЗКА================
      // =======================================

      // сначала получим все записи услуг и обнулим статус on/off

       $cats = get_pages([
        'sort_order'   => 'ASC',
        'sort_column'  => 'post_title',
        'hierarchical' => 1,
        'exclude'      => '',
        'include'      => '',
        'authors'      => '',
        'child_of'     => 0,
        'parent'       => -1,
        'exclude_tree' => '',
        'number'       => '',
        'offset'       => 0,
        'post_type'    => 'services',
        'post_status'  => 'publish,draft',
      ]);

       if ($cats) {
        foreach ($cats as $cat) {
         $my_post = [
            'ID' => $cat->ID,
            'meta_input' => [
              'services_active' => 'off',
            ],
          ];

          // Обновляем
          wp_update_post( wp_slash($my_post) );
        // wp_delete_post($cat->ID, false);
        }
      }

      // а теперь начинаем выгрузку
      $ERROR_count = 0;
      $POST_count = 0;

      // получаем пост из WP по искомому ID в Medods
      function find_WP_ID($meta_key, $meta_value)
      {
        // global $post;
        $WP_posts = get_posts([
          'posts_per_page' => -1,
          'post_type' => 'services',
          'post_status' => 'any',
          'meta_key' => $meta_key,
          'meta_value' => $meta_value
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
      // END получаем посты из WP

      // получаем врача из WP по искомому ID в Medods
      function find_Docs_ID($meta_value)
      {
        // global $post;
        $WP_posts = get_posts([
          'posts_per_page' => -1,
          'post_type' => 'doctors',
          'post_status' => 'any',
          'meta_key' => 'doctors_id',
          'meta_value' => $meta_value
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
      // END получаем врача из WP

      // создаем или обновляем запись в базе WP
      function array_print_categories($arr)
      {
        foreach ($arr as $item) {

          $find_item = find_WP_ID('services_id_cat', $item->id);
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
          $parentId = find_WP_ID('services_id_cat', $item->parentId)->ID;

          // $services_doc_ID_arr =[];
          // foreach ($item->userIds as $userID) {
          //   $services_doc_ID = find_Docs_ID($userID)->ID;
          //   array_push($services_doc_ID_arr, $services_doc_ID);
          // }

          // Создаем массив данных новой записи 
          $post_data = array(
            'ID'            => $ID,
            'post_title'    => $item->title,
            // 'post_name'     => $item->title,
            'post_status'   => $post_status,
            'post_type'     => 'services',
            'post_author'   => 6,
            'post_content' => $post_content,
            'post_parent'   => $parentId,
            'meta_input'   => array(
              'services_type' => 'category',
              'services_id_cat' => $item->id,
              'services_active' => 'on',
              // 'services_docs_id' => $services_doc_ID_arr
            ),
            // 'tax_input' => array( 'services_type' => 'category'),
          );

          // Вставляем запись в базу данных
          $post_id = wp_insert_post(wp_slash($post_data), true);

          if (is_wp_error($post_id)) {
            echo $post_id->get_error_message() . ': ' . $item->id . '<br>';
            // $ERROR_count = $ERROR_count + 1;
          } else {
            $tax_status = wp_set_object_terms( $post_id, 'category', 'services_type', false );
            echo '<tr style="outline: solid;">';
            echo '<td>' . $status . '</td>';
            echo '<td>' . $item->title . '</td>';
            echo '<td>' . 'категория' . '</td>';
            echo '<td>' .  $item->id . '</td>';
            echo '<td>' . $post_id . '</td>';
            echo '<td>';
            print_r($tax_status);
            echo '</td>';
            echo '</tr>';
          }

          if ($item->children) {
            array_print_categories($item->children);
          }
        }
      }
      function array_print_services($arr)
      {
        foreach ($arr as $item) {

          $find_item = find_WP_ID('services_id_serv', $item->id);
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
          $categoryId = find_WP_ID('services_id_cat', $item->categoryId)->ID;
          
          // $services_doc_ID_arr =[];
          // foreach ($item->userIds as $userID) {
          //   $services_doc_ID = find_Docs_ID($userID)->ID;
          //   array_push($services_doc_ID_arr, $services_doc_ID);
          // }
          // echo '<pre>';
          // print_r($item->userIds);
          // echo '</pre>';
          // Создаем массив данных новой записи
          $post_data = array(
            'ID'            => $ID,
            'post_title'    => $item->title,
            // 'post_name'     => $item->title,
            'post_status'   => $post_status,
            'post_type'     => 'services',
            'post_author'   => 6,
            'post_content' => $post_content,
            // 'post_category' => array('services'),
            'post_parent'   => $categoryId,
            'meta_input'   => array(
              'services_type' => 'service',
              'services_id_serv' => $item->id,
              'services_price' => $item->price,
              'services_active' => 'on',
              // 'services_docs_id' => $services_doc_ID_arr
            ),
            // 'tax_input' => array( 'services_type' => 'service'),
          );

          // Вставляем запись в базу данных
          $post_id = wp_insert_post(wp_slash($post_data), true);

          if (is_wp_error($post_id)) {
            echo $post_id->get_error_message() . ': ' . $item->id . '<br>';
            // $ERROR_count = $ERROR_count + 1;
          } else {
            $tax_status = wp_set_object_terms( $post_id, 'service', 'services_type', false );

            echo '<tr style="outline: solid;">';
            echo '<td>' . $status . '</td>';
            echo '<td>' . $item->title . '</td>';
            echo '<td>' . 'услуга' . '</td>';
            echo '<td>' .  $item->id . '</td>';
            echo '<td>' . $post_id . '</td>';
            echo '<td>';
            print_r($tax_status);
            echo '</td>';
            echo '</tr>';
          }

          if ($item->children) {
            array_print_services($item->children);
          }
        }
      }
      // END создаем или обновляем запись в базе WP



      // получаем список категорий из Medods
      $page = 0;
      while (true) {
        $header = ["alg" => "HS512", "typ" => "JWT"];
        $payload = ["iss" => 'c3f21da7-6943-4205-b6ea-f21d2813f05a', "iat" => time(), "exp" => time() + 64];
        $header_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($header)))));
        $payload_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($payload)), '=')));
        $signature_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(hash_hmac('sha512', $header_base64 . '.' . $payload_base64, 'aa7b81540d4fc02a708f332ea456eb651f0b8a60d9dc8b390cbbdc67e1931c06', true)), '=')));
        $apiKey = $header_base64 . '.' . $payload_base64 . '.' . $signature_base64;
        // echo 'ИТОГО: ' . $apiKey;
        $categories = wp_remote_get('https://mediczdrav.medods.ru/api/v2/entry_types/categories?onlineAccess=true&limit=100&offset=' . $page, array(  //задаем параметры запроса к API для списка услуг
          'headers' => array(
            'Authorization' => $apiKey
          )
        ));

        if (wp_remote_retrieve_response_code($categories) === 200) {
          // echo 'код 200<br>';
        }
        if (wp_remote_retrieve_response_code($categories) === 422) {
          echo 'Отсутствует обязательное поле или ошибка валидации<br>';
        }
        if (wp_remote_retrieve_response_code($categories) === 403) {
          echo 'Error: response status is 403<br>';
        }

        $categories_decode = json_decode(wp_remote_retrieve_body($categories, true))->data;  //декодируем ответ
        if ($categories_decode) {

          // создаем или обновляем запись в базе WP
          array_print_categories($categories_decode);

          $page = $page + 100;
          sleep(1);
        } else {
          break;
        }
      }
      // END получаем список категорий из Medods

      // получаем список услуг из Medods
      $page = 0;
      while (true) {
        $header = ["alg" => "HS512", "typ" => "JWT"];
        $payload = ["iss" => 'c3f21da7-6943-4205-b6ea-f21d2813f05a', "iat" => time(), "exp" => time() + 64];
        $header_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($header)))));
        $payload_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(json_encode($payload)), '=')));
        $signature_base64 = preg_replace('/\+/', '-', preg_replace('/\//', '_', trim(base64_encode(hash_hmac('sha512', $header_base64 . '.' . $payload_base64, 'aa7b81540d4fc02a708f332ea456eb651f0b8a60d9dc8b390cbbdc67e1931c06', true)), '=')));
        $apiKey = $header_base64 . '.' . $payload_base64 . '.' . $signature_base64;
        // echo 'ИТОГО: ' . $apiKey;
        $price = wp_remote_get('https://mediczdrav.medods.ru/api/v2/entry_types?onlineAccess=true&limit=100&offset=' . $page, array(  //задаем параметры запроса к API для списка услуг
          'headers' => array(
            'Authorization' => $apiKey
          )
        ));

        if (wp_remote_retrieve_response_code($price) === 200) {
          // echo 'код 200<br>';
        }
        if (wp_remote_retrieve_response_code($price) === 422) {
          echo 'Отсутствует обязательное поле или ошибка валидации<br>';
        }
        if (wp_remote_retrieve_response_code($price) === 403) {
          echo 'Error: response status is 403<br>';
        }

        $price_decode = json_decode(wp_remote_retrieve_body($price, true))->data;  //декодируем ответ
        if ($price_decode) {

          // создаем или обновляем запись в базе WP
          array_print_services($price_decode);
          // echo '<pre>';
          // print_r($price_decode);
          // echo '</pre>';

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