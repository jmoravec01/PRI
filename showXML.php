<head>
    <meta charset="UTF-8">
    <title>PRI show XML</title>
    <link rel="stylesheet" href="style/styles.scss">
</head>

<body>
    <main>
        <header>
            <section class="navigation">
                <div class="nav-container">
                    <div class="brand">
                        <img src="/files/icons8-homer-simpson.gif" alt="">
                        <a href="index.php">Split-Calculator</a>
                    </div>

                    <nav>
                        <div class="nav-mobile"><a id="navbar-toggle" href="#!"><span></span></a></div>
                        <ul class="nav-list">
                            <li>
                                <a href="#">Home</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </section>

        </header>

        <section>
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