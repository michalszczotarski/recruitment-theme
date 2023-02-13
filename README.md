# Basic Recruitment Wordpress Theme

## Zadanie rekrutacyjne
Link for figma project: https://www.figma.com/file/EWS1GuEYbKxfHdca2a09bG/Zadanie-rekrutacyjne?node-id=1%3A580&t=Gx6GW3SKW8X8Syra-1

#### Specyfikacja techniczna
> Ogólne postanowienia:
> - Nie używamy bootstrap i innych bibliotek CSS - Tylko własne style
> - Wykorzystać CSS Flex i Grid
> - Style globalne w formie klas możliwych do wykorzystania w innych elementach (np. przyciski)

1. Header
    - Logo możliwe do zmiany w panelu Wordpress (dla ACF Pro stworzyć Options Page)
    - Menu pobierane z Wordpress
    - Wyszukiwarka tylko wizualnie
2. Siatka linków
   - 6 boxów z grafiką w tle i wyśrodkowanym tekstem
   - Każdy box jest linkiem
   - Zdjęcie i tekst są możliwe do zmiany
   - Mobile: Kafle zamieniają się w slider (jeden na widoku)
3. CTA
    - Możliwość zmiany koloru tła w ACF (radio button lub color picker)
    - Treść w formie edytora WYSIWYG
    - Dwa przyciski jako linki
4. Slider z opiniami
    - Slider zrealizowany z użyciem biblioteki [SplideJS](https://splidejs.com/)
    - minimum 3 slajdy
    - Treści: Opis, Imię i nazwisko, stanowisko
    - Slider przełącza się automatycznie
    - Niebieski box jest stały
    - Mobile: kolejność - Tytuł, niebieski box, slajder
5. Footer
   - Dane zaciągane z ACF: logo, opisy, social media (ikony, linki, itd)
   - Menu Quick Links - zaciągane z dedykowanego menu w Wordpress

#### Forma dostarczenia rozwiązania
- Kod źródłowy szablonu wystawiony za pomocą GIT na platformie GitHub.
- Wystawione pliki JSON z kodem źródłowym pól ACF **(tylko w przypadku użycia ACF Pro)**

## Instalacja webpack
Webpack pozwala nam pisać kod CSS z wykorzystaniem pre-procesora SCSS wraz z monifikacją plików JS i CSS.
Generuje folder `dist/` w głównym katalogu motywu.
Do działania wymaga zainstalowanego pakietu [NodeJS](https://nodejs.org/en/download/)
1. Zainstaluj wszystkie wymagane pakiety poleceniem:
`npm install` or `yarn install`
2. Uruchom webpack poleceniem: `npm run serve` or `yarn run serve`
3. Aby stworzyć zminifikowane wersje plików wpisz: `npm run dist` or `yarn run dist`

## Struktura plików szablonu
```bash
recruitment-theme/
|-- acf-json/                         // Zawiera definicje pól ACF (działa tylko z ACF Pro)
|-- dist/                             // Generuje się po uruchomieniu webpack-a, zawiera skompresowane pliki styli i skryptów motywu
|-- includes/                         // Zawiera dodatkowe pliki wykorzystywane w motywie
|   |-- blocks/                       // Zawiera wszystkie bloki ACF
|   |   |-- block-standard-text/      // Zawiera pliki bloku "standard text"
|   |   |-- ...
|   |-- acf_register_block.php        // Zaciąga informacje o blokach ACF z motywu
|   |-- enqueue.php                   // Definiuje pliki styli i skryptów, użytych w motywie
|-- src/                              // Zawiera wszystkie pliki źródłowe styli i skryptów
|   |-- js/                           // Zawiera pliki JS motywu
|   |   |-- app.js
|   |-- scss/                         // Zawiera pliki SCSS motywu
|   |   |-- app.scss
|-- footer.php                        // Stopka strony
|-- functions.php                     // Główny plik zarządzający mechanikami motywu oraz wsparcia funkcjonalności Wordpressa
|-- header.php                        // Nagłówek strony
|-- index.php                         // Główny plik motywu zawierający treść strony
|-- package.json                      // Plik wymagany do pobrania i uruchomienia webpack w motywie
|-- style.css                         // Plik deklaracyjny z informacjami o autorze i nazwie motywu
|-- webpack.config.js                 // Plik konfiguracyjny webpack
```

## Opcjonalnie: Bloki gutenberga
Wszystkie bloki gutenberga będziemy rejestrować w pliku `acf_register_block.php` zlokalizowanym w `<theme_path>/includes/acf_register_block.php`

przykład:
```bash
// Definicja bloku
add_action('acf/init', 'acf_blocks_init');
function acf_blocks_init() {
  require get_template_directory() . '/includes/blocks/block-standard-text/register_block.php';
}
```

W lokalizacji `/includes/blocks` tworzymy nowy folder zawierający następującą strukturę plików

```bash
blocks/
|-- block-name-of-block/
|   |-- block.php               // block content
|   |-- register_block.php      // block definition
|   |-- _style.scss             // block styles
|   |-- scripts.js              // block scripts
|
```

Przykładowy plik `register_block.php` (z obrazkiem podglądowym):

```bash
<?php
acf_register_block_type(
    array(
        'name'				=> 'block-standard-text',
        'title'				=> __('Standard text', 'theme-domain'),
        'description'		=> __('Standard text', 'theme-domain'),
        'render_template'   => dirname(__FILE__) . '/block.php',
        'category'			=> 'layout',
        'icon'				=> 'admin-comments',
        'keywords'			=> array( 'text', 'standard' ),
        'mode'				=> 'edit',
        'example'  => array(
            'attributes' => array(
                'mode' => 'preview',
                'data' => array(
                    'preview_image_help'   => get_template_directory_uri()  . "/includes/blocks/block-standard-text/img.png",
                )
            )
        )
    )
);
```

Przykład pliku `block.php` (z obrazkiem podglądowym):

```bash
<?php
/**
 * @var array $block
 */

$id = 'blockStandardText-' . $block['id'];
$block_standard_text = get_field('block-standard-text');

if( isset( $block['data']['preview_image_help'] )  ) :
    echo '<img src="'. $block['data']['preview_image_help'] .'" style="width:100%; height:auto;">';
else : ?>
    <section class="section blockStandardText" id="<?= $id; ?>">
        <div class="wrapper">
            <?=$block_standard_text['wysiwyg'];?>
        </div>
    </section>
<?php endif; ?>
```
Wszystkie pola używane w bloku muszą być zdefiniowane w ustawieniach pól wtyczki ACF