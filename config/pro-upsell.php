<?php
/**
 * PRO upsell content, generated from the plogins.com registry by
 * scripts/gen-pro-upsell.mjs. The admin upsell renders this; curate the
 * feature list to fit this plugin's settings screen (do not invent features).
 *
 * @package plogins-finder-pro
 */

defined('ABSPATH') || exit;

return [
    'name'       => 'Elektilo Pro',
    'url'        => 'https://plogins.com/plogins-finder-pro/pricing/',
    'campaign'   => 'plogins-finder',
    'locales'    => ['pl', 'de', 'es'],
    'sellable'   => true,
    'price_from' => 29,
    'currency'   => 'EUR',
    'lead'       => [
        'en' => 'Everything below ships in version 1.0.0.',
        'pl' => 'Wszystko poniżej jest dostępne w wersji 1.0.0.',
    ],
    'features'   => [
        [
            'en' => ['title' => 'Multiple quizzes', 'desc' => 'Create as many quizzes as you need under Elektilo > Quizzes. Each one has its own shortcode [elektilo_quiz id="..."] and an Elektilo quiz block. The free [elektilo] quiz keeps working next to them.'],
            'pl' => ['title' => 'Wiele quizów', 'desc' => 'Dowolna liczba quizów w Elektilo, Quizy. Każdy ma własny shortcode [elektilo_quiz id="..."] i blok Quiz Elektilo. Darmowy quiz [elektilo] działa dalej obok nich.'],
        ],
        [
            'en' => ['title' => 'Multiple-choice questions', 'desc' => 'For every question you choose whether the shopper picks one answer or several.'],
            'pl' => ['title' => 'Pytania wielokrotnego wyboru', 'desc' => 'Przy każdym pytaniu zaznaczasz, czy klient wybiera jedną odpowiedź, czy kilka.'],
        ],
        [
            'en' => ['title' => 'Points per answer', 'desc' => 'In the points table each answer gives points to a product or to a whole category. The products with the highest total win, negative points push a product down, and ties keep the order of the table.'],
            'pl' => ['title' => 'Punkty za odpowiedź', 'desc' => 'W tabeli punktów każda odpowiedź daje punkty produktowi albo całej kategorii. Wygrywają produkty z największą sumą, ujemne punkty spychają produkt w dół, a remis zachowuje kolejność tabeli.'],
        ],
        [
            'en' => ['title' => '1 to 12 products in the result', 'desc' => 'Set how many of the best products to show. Out-of-stock or hidden products are skipped and the next one takes their place. A fallback product covers answers that score nothing.'],
            'pl' => ['title' => 'Od 1 do 12 produktów w wyniku', 'desc' => 'Ustawiasz, ile najlepszych produktów pokazać. Produkty niedostępne albo ukryte są pomijane i ich miejsce zajmuje następny. Produkt zapasowy pojawia się, gdy nic nie zdobyło punktów.'],
        ],
        [
            'en' => ['title' => 'Email step with consent', 'desc' => 'An optional step before the result. A lead is saved only when the consent box is ticked, together with the consent text and the answers. The step can be required or skippable, and logged-in customers can skip it.'],
            'pl' => ['title' => 'Krok e-mail za zgodą', 'desc' => 'Opcjonalny krok przed wynikiem. Lead zapisuje się tylko po zaznaczeniu zgody, razem z treścią zgody i odpowiedziami. Krok może być wymagany albo do pominięcia, a zalogowani klienci mogą go pomijać.'],
        ],
        [
            'en' => ['title' => 'Leads in your own database', 'desc' => 'An Elektilo > Leads screen with a quiz filter, CSV export, a link to the customer account, and WordPress personal data export and erasure. Nothing is sent to any outside service.'],
            'pl' => ['title' => 'Leady w Twojej bazie', 'desc' => 'Ekran Elektilo, Leady z filtrem quizu, eksportem CSV, powiązaniem z kontem klienta oraz eksportem i usuwaniem danych osobowych w narzędziach WordPressa. Nic nie trafia do zewnętrznych usług.'],
        ],
        [
            'en' => ['title' => 'Quiz statistics', 'desc' => 'Starts, completions, completion rate, drop-off per step, answer distribution, emails left, and clicks and add-to-cart clicks on the result, over 7, 30, 90 or 365 days. Anonymous daily counts only.'],
            'pl' => ['title' => 'Statystyki quizu', 'desc' => 'Rozpoczęcia, ukończenia, współczynnik ukończeń, odpływ na każdym kroku, rozkład odpowiedzi, zostawione e-maile oraz kliknięcia w wynik i w Dodaj do koszyka, za 7, 30, 90 albo 365 dni. Tylko anonimowe dzienne liczniki.'],
        ],
        [
            'en' => ['title' => 'Rate limits', 'desc' => 'The public quiz endpoints check every answer against its quiz and are rate limited per visitor, adjustable with the elektilo-pro/rate_limit filter.'],
            'pl' => ['title' => 'Limity zapytań', 'desc' => 'Publiczne endpointy quizu sprawdzają każdą odpowiedź względem quizu i mają limit zapytań na odwiedzającego, zmieniany filtrem elektilo-pro/rate_limit.'],
        ],
    ],
];
