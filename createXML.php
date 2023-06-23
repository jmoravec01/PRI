<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>CREATE XML</title>
</head>

<body>
    <?php
    include 'template.html';
    ?>

    <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        // proměnné
        $dekan = $_POST['dekan'];
        $zkratka_katedry = $_POST['zkratka_katedry'];
        $webove_stranky = $_POST['webove_stranky'];
        $vedouci_jmeno = $_POST['vedouci_jmeno'];
        $vedouci_telefon = $_POST['vedouci_telefon'];
        $zamestnanec_jmeno = $_POST['zamestnanec_jmeno'];
        $zamestnanec_telefon = $_POST['zamestnanec_telefon'];
        $zamestnanec_email = $_POST['zamestnanec_email'];
        $zamestnanec_pozice = $_POST['zamestnanec_pozice'];
        $predmet_zkratka = $_POST['predmet_zkratka'];
        $predmet_nazev = $_POST['predmet_nazev'];
        $predmet_popis = $_POST['predmet_popis'];
        $nazev_souboru = $_POST['nazev_souboru'];

        // úložiště
        $savePath = './xmls/xml_saves/';
        $filePath = $savePath . $nazev_souboru . '.xml';

        // root
        $xml = new SimpleXMLElement('<?xml version="1.0" encoding="UTF-8"?><fakulta></fakulta>');
        $xml->addAttribute('děkan', $dekan);

        // katedra
        $katedra = $xml->addChild('katedra');
        $katedra->addAttribute('zkratka_katedry', $zkratka_katedry);
        $katedra->addAttribute('webové_stránky', $webove_stranky);

        // vedoucí
        $vedouci = $katedra->addChild('vedoucí');
        $vedouci->addChild('jméno', $vedouci_jmeno);
        $vedouci->addChild('telefon', $vedouci_telefon);

        // zaměstnanci
        $zamestnanci = $katedra->addChild('zaměstnanci');
        $zamestnanec = $zamestnanci->addChild('zaměstnanec');
        $zamestnanec->addChild('jméno', $zamestnanec_jmeno);
        $zamestnanec->addChild('telefon', $zamestnanec_telefon);
        $zamestnanec->addChild('email', $zamestnanec_email);
        $pozice = $zamestnanec->addChild('pozice');
        $pozice->addChild($zamestnanec_pozice);

        // předměty
        $predmety = $katedra->addChild('předměty');
        $predmet = $predmety->addChild('předmět');
        $predmet->addAttribute('zkratka', $predmet_zkratka);
        $predmet->addChild('název', $predmet_nazev);
        $predmet->addChild('popis', $predmet_popis);

        // TRANSFORMACE
        $xmlNew = $xml->asXML();
        $dom = new DOMDocument('1.0', 'UTF-8');
        $dom->preserveWhiteSpace = false;
        $dom->formatOutput = true;
        $dom->loadXML($xmlNew);
        $isValid = $dom->schemaValidate('./xmls/nevim.xsd');

        if ($isValid) {
            if (file_exists($filePath)) {
                echo '
                <div style="position: absolute">
                <div class="warning alert">
                <div class="content">
                <div class="icon">
                <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                </div>
                <p>SOUBOR JIŽ EXISTUJE</p>
                </div>
                <button class="close">
                <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
                </button>
                </div>
                </div>';
            } else {
                if ($dom->save($filePath)) {
                    echo '
                <div style="position: absolute">
                <div class="success alert">
                <div class="content">
                <div class="icon">
                <svg width="50" height="50" id="Layer_1" style="enable-background:new 0 0 128 128;" version="1.1" viewBox="0 0 128 128" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><g><circle fill="#fff" cx="64" cy="64" r="64"/></g><g><path fill="#3EBD61" d="M54.3,97.2L24.8,67.7c-0.4-0.4-0.4-1,0-1.4l8.5-8.5c0.4-0.4,1-0.4,1.4,0L55,78.1l38.2-38.2   c0.4-0.4,1-0.4,1.4,0l8.5,8.5c0.4,0.4,0.4,1,0,1.4L55.7,97.2C55.3,97.6,54.7,97.6,54.3,97.2z"/></g></svg>
                </div>
                <p>XML BYL VYTVOŘEN</p>
                </div>
                <button class="close">
                <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
                </button>
                </div>
                </div>';
                } else {
                    echo '
                <div style="position: absolute">
                <div class="danger alert">
                <div class="content">
                <div class="icon">
                <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                </div>
                <p>ERROR</p>
                </div>
                <button class="close">
                <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
                </button>
                </div>
                </div>';
                }
            }
        } else {
            echo '
                <div style="position: absolute">
                <div class="danger alert">
                <div class="content">
                <div class="icon">
                <svg height="50" viewBox="0 0 512 512" width="50" xmlns="http://www.w3.org/2000/svg"><path fill="#fff" d="M449.07,399.08,278.64,82.58c-12.08-22.44-44.26-22.44-56.35,0L51.87,399.08A32,32,0,0,0,80,446.25H420.89A32,32,0,0,0,449.07,399.08Zm-198.6-1.83a20,20,0,1,1,20-20A20,20,0,0,1,250.47,397.25ZM272.19,196.1l-5.74,122a16,16,0,0,1-32,0l-5.74-121.95v0a21.73,21.73,0,0,1,21.5-22.69h.21a21.74,21.74,0,0,1,21.73,22.7Z"/></svg>
                </div>
                <p>CHYBA VALIDACE</p>
                </div>
                <button class="close">
                <svg height="18px" id="Layer_1" style="enable-background:new 0 0 512 512;" version="1.1" viewBox="0 0 512 512" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path fill="#69727D" d="M437.5,386.6L306.9,256l130.6-130.6c14.1-14.1,14.1-36.8,0-50.9c-14.1-14.1-36.8-14.1-50.9,0L256,205.1L125.4,74.5  c-14.1-14.1-36.8-14.1-50.9,0c-14.1,14.1-14.1,36.8,0,50.9L205.1,256L74.5,386.6c-14.1,14.1-14.1,36.8,0,50.9  c14.1,14.1,36.8,14.1,50.9,0L256,306.9l130.6,130.6c14.1,14.1,36.8,14.1,50.9,0C451.5,423.4,451.5,400.6,437.5,386.6z"/></svg>
                </button>
                </div>
                </div>';
        }
    }
    ?>

    <main>
        <h1 class="heading">XML Creator</h1>
        <div class="center" style="overflow: auto; height: 100%; margin-top: 25px; margin-bottom: 25px">
            <form method="POST" action="" style="width: 80%; background-color: #333333aa; border-radius:50px;">

                <div style="color: white">
                    <label for="nazev_souboru">Název souboru</label>
                    <input type="text" name="nazev_souboru" id="nazev_souboru" required><br><br>

                    <label for="dekan">Děkan PŘF</label>
                    <input type="text" id="dekan" name="dekan" required><br><br>
                </div>

                <div class="create">
                    <div class="create-column">
                        <h3>KATEDRA</h3>
                        <label for="zkratka_katedry">zkratka</label>
                        <input type="text" id="zkratka_katedry" name="zkratka_katedry" required><br><br>

                        <label for="webove_stranky">web</label>
                        <input type="text" id="webove_stranky" name="webove_stranky" required><br><br>
                    </div>

                    <div class="create-column">
                        <h3>VEDOUCÍ</h3>
                        <label for="vedouci_jmeno">jméno</label>
                        <input type="text" id="vedouci_jmeno" name="vedouci_jmeno" required><br><br>

                        <label for="vedouci_telefon">telefon</label>
                        <input type="text" id="vedouci_telefon" name="vedouci_telefon" required><br><br>
                    </div>

                    <div class="create-column">
                        <h3>ZAMĚSTNANEC</h3>
                        <label for="zamestnanec_jmeno">jméno</label>
                        <input type="text" id="zamestnanec_jmeno" name="zamestnanec_jmeno"><br><br>

                        <label for="zamestnanec_telefon">telefon</label>
                        <input type="text" id="zamestnanec_telefon" name="zamestnanec_telefon"><br><br>

                        <label for="zamestnanec_email">email</label>
                        <input type="email" id="zamestnanec_email" name="zamestnanec_email"><br><br>

                        <label for="zamestnanec_pozice">pozice zaměstnance</label>
                        <select id="zamestnanec_pozice" name="zamestnanec_pozice">
                            <option value="lektor">Lektor</option>
                            <option value="odborný_asistent">Odborný asistent</option>
                        </select><br><br>
                    </div>

                    <div class="create-column">
                        <h3>PŘEDMĚT</h3>
                        <label for="predmet_zkratka">zkratka</label>
                        <input type="text" id="predmet_zkratka" name="predmet_zkratka"><br><br>

                        <label for="predmet_nazev">název</label>
                        <input type="text" id="predmet_nazev" name="predmet_nazev"><br><br>

                        <label for="predmet_popis">popis</label>
                        <input type="text" id="predmet_popis" name="predmet_popis"><br><br>
                    </div>
                </div>
                <input type="submit" value="Create XML" style="width: 100%">
            </form>
        </div>
    </main>
</body>

</html>