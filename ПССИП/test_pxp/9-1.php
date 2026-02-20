<?php
    header('Content-Type: text/html; charset=utf-8');

    function mb_strtolower_ru($str) {
        return mb_strtolower($str, 'UTF-8');
    }

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $N = 0;
        $answer1 = trim($_POST['q1'] ?? '');
        $correct1 = $_POST['q1_'] ?? 'Левшунов';
        if (mb_strtolower_ru($answer1) === mb_strtolower_ru($correct1)) {
            $N++;
        }

        $q21 = $_POST['q21'] ?? '';
        $q22 = $_POST['q22'] ?? '';
        $q23 = $_POST['q23'] ?? '';

        if ($q21 === 'Шутько Е.И.') $N++;
        if ($q22 === 'Бадай И.Н') $N++;
        if ($q23 === 'Калаева С.Г.') $N++;

        $q5 = $_POST['q5'] ?? '';
        if ($q5 === 'q52') $N++;

        $q4 = $_POST['q4'] ?? [];
        if (is_array($q4)) {
            $required = ['q41', 'q42', 'q45'];
            sort($q4);
            sort($required);
            if ($q4 === $required) {
                $N++;
            }
        }

        $drag1 = $_POST['drag1'] ?? '';
        $drag2 = $_POST['drag2'] ?? '';
        $drag3 = $_POST['drag3'] ?? '';

        if ($drag1 === '65' && $drag2 === '5' && $drag3 === '2') {
            $N++;
        }

        echo '<!DOCTYPE html><html lang="ru"><head><meta charset="UTF-8"><title>Результат теста</title></head><body>';
        echo '<p>Ваш результат: <strong>' . $N . ' баллов</strong> из 6.</p>';
        echo '</body></html>';
    } else {
        header('Location: 418.html');
        exit;
}
?>