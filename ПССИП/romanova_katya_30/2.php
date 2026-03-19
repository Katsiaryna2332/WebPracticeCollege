<?php
    $client_id = '8135251'; // ID приложения
    $client_secret = 'dYjfUZwZmlJJ1FIqQFAj'; // Защищенный ключ $redirect_uri= 'http://localhost/vk-auth/vk.php';
    // Адрес страницы сайта на локальном сервере

    $vkApiUrl = 'https://oauth.vk.com/authorize';
    $params = array( 
        'client_id' => $client_id, 
        'redirect_uri' => $redirect_uri, 
        'response_type' => 'code', 
        'scope' => 'email' // для получения адреса e-mail
        ); 
    echo $link = '<p><a href="' .$vkApiUrl .'?' .urldecode(http_build_query($params)) .'"> Аутентификация через ВК </a></p>';

    if(isset($_GET['code'])) {
        $params = array(
            'client_id' => $client_id,
            'client_secret' => $client_secret,
            'code' => $_GET['code'],
            'redirect_uri' => $redirect_uri
        ); 
        $token = json_decode(file_get_contents('https://oauth.vk.com/access_token' . '?' . urldecode(http_build_query($params))), true);
        $email = $token['email'];
        echo $email.'<br>'; // вывод е-mail пользователя
    }

    if(isset($token['access_token'])) 
    { 
        $params = array(
            'uids' => $token['user_id'],
            'fields' => 'uid,first_name,last_name,screen_name,sex,bdate,photo_big',
            'access token' => $token['access_token'],
            'v' => '5.131'  // обязательный параметр версия ВК АРІ
        );
    } 
    $userInfo = json_decode(file_get_contents ('https://api.vk.com/method/users.get'.'?'.urldecode(http_build_query($params))), true);
    if(isset($userInfo['response'] [0] ['id'])) $userInfo = $userInfo['response'][0];

    echo "Социальный ID пользователя: ".$userInfo['id'].'<br>';
    echo "Имя пользователя: ".$userInfo['first_name'].'<br>';
    echo "Фамилия пользователя: ".$userInfo['last_name'].'<br>';
    echo "Имя профиля пользователя: ".$userInfo['screen_name'].'<br>';
    echo "Пол пользователя: ".$userInfo['sex'].'<br>';
    echo "День Рождения: ".$userInfo['bdate'].'<br>';
    echo '<img src="'.$userInfo['photo_big'].'">';
?>
