<head>
    <meta charset="UTF-8">
    <title>XML</title>
</head>

<body>
    <?php
    include 'template.html';
    ?>
    <main>
        <?php
        if (file_exists("xmls/nevim.xml")) {
            $dom = new DOMDocument();
            $dom->load("xmls/nevim.xml");

            $xslDoc = new DOMDocument();
            $xslDoc->load('xmls/nevim.xsl');

            $processor = new XSLTProcessor();
            $processor->importStylesheet($xslDoc);

            $html = $processor->transformToXML($dom);
            echo $html;
        } else {
            echo "Soubor neexistuje!";
        }
        ?>
    </main>
</body>

</html>