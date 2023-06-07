<head>
    <meta charset="UTF-8">
    <title>XML</title>
</head>

<body>
    <?php
    include 'template.html';
    ?>
    <main style="color: white">
        <section class="center">
            <?php
            if (file_exists("xmls/nevim.xml")) {
                $dom = new DOMDocument();
                $dom->load("xmls/nevim.xml");

                $xslDoc = new DOMDocument();
                $xslDoc->load('xmls/nevim.xslt');

                $processor = new XSLTProcessor();
                $processor->importStylesheet($xslDoc);

                $html = $processor->transformToXML($dom);
                echo $html;
            } else {
                echo "File doesn't exist";
            }
            ?>
        </section>
    </main>
</body>

</html>