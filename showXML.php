<head>
    <meta charset="UTF-8">
    <title>XML</title>
    <link rel="icon" href="./files/earth.svg" type="image/x-icon">
    <link rel="stylesheet" href="style/styles.scss">
</head>

<body>
    <main>
        <header>
            <section class="navigation">
                <div class="nav-container">
                    <div class="brand">
                        <img src="./files/earth.svg" alt="cs" width="55" height="55">
                        <a href="index.php">PRI</a>
                    </div>

                    <nav>
                        <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
                        <ul class="nav-list">
                            <li>
                                <a href="index.php">Home</a>
                            </li>
                            <li>
                                <a href="showXML.php">XML</a>
                            </li>
                            <li>
                                <a href="showXML.php">Formulář</a>
                            </li>
                            <li>
                                <a href="showXML.php">DB</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>
        </header>

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