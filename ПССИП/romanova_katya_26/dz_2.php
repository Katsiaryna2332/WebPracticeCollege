<?php
    $text = 'What is Symfony. Symfony is a set of PHP Components, a Web Application framework, a
    Philosophy, and a Community - all working together in harmony.
    Symfony Framework. The leading PHP framework to create websites and web applications.
    Built on top of the Symfony Components.
    Symfony Components. A set of decoupled and reusable components on which the best PHP
    applications are built, such as Drupal, phpBB, and eZ Publish.
    Symfony Community. A passionate group of over 600,000 developers from more than 120
    countries, all committed to helping PHP surpass the impossible.
    Symfony Philosophy. Embracing and promoting professionalism, best practices,
    standardization and interoperability of applications.';

    // a)
    function highlightSymfony($text) {
        $count = preg_match_all('/\bSymfony\b/', $text, $matches);
        $highlighted = preg_replace('/\bSymfony\b/', '<span style="background-color: yellow;">Symfony</span>', $text);
        return [$count, $highlighted];
    }

    // b)
    function getTextStats($text) {
        $paragraphs = array_filter(preg_split('/\r\n|\n|\r/', trim($text)), fn($p) => trim($p) !== '');
        $paragraphCount = count($paragraphs);

        $textOneLine = str_replace(["\r", "\n"], ' ', $text);
        preg_match_all('/[^.!?]+[.!?]/u', $textOneLine, $sentences);
        $sentenceCount = count($sentences[0]);

        $words = preg_split('/\W+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $wordCount = count($words);

        $charCount = mb_strlen($text);

        return [
            'paragraphs' => $paragraphCount,
            'sentences' => $sentenceCount,
            'words' => $wordCount,
            'characters' => $charCount
        ];
    }

    // c)
    function findLongestWords($text) {
        $words = preg_split('/\W+/u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $maxLength = 0;
        $longestWords = [];

        foreach ($words as $word) {
            $len = mb_strlen($word);
            if ($len > $maxLength) {
                $maxLength = $len;
                $longestWords = [$word];
            } elseif ($len === $maxLength) {
                if (!in_array($word, $longestWords)) {
                    $longestWords[] = $word;
                }
            }
        }

        return [$maxLength, $longestWords];
    }

    // d)
    function countCharsSorted($text) {
        $chars = preg_split('//u', $text, -1, PREG_SPLIT_NO_EMPTY);
        $counts = [];

        foreach ($chars as $ch) {
            $counts[$ch] = ($counts[$ch] ?? 0) + 1;
        }

        ksort($counts);

        return $counts;
    }


    list($symfonyCount, $highlightedText) = highlightSymfony($text);
    $stats = getTextStats($text);

    echo "<b>a) Слово 'Symfony' встречается $symfonyCount раз в тексте.</b><br><br>";
    echo "<div style='white-space: pre-wrap;'>$highlightedText</div><br><hr>";

    echo "<b>b) Статистика текста:</b><br>";
    echo "Абзацев: " . $stats['paragraphs'] . "<br>";
    echo "Предложений: " . $stats['sentences'] . "<br>";
    echo "Слов: " . $stats['words'] . "<br>";
    echo "Символов: " . $stats['characters'] . "<br><hr>";

    list($maxLength, $longestWords) = findLongestWords($text);
    echo "<b>c) Самое длинное слово(а) (длина $maxLength символов):</b><br>";
    echo implode(', ', $longestWords) . "<br><hr>";

    $charCounts = countCharsSorted($text);
    echo "<b>d) Частота каждого символа (отсортировано по символам):</b><br>";
    echo "<pre>";
    foreach ($charCounts as $char => $count) {
        $displayChar = $char === ' ' ? '[пробел]' : $char;
        echo "'$displayChar' : $count\n";
    }
    echo "</pre>";
?>