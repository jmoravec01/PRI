<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
    <xsl:template match="/">
        <html>
            <head>
                <title>Fakulta</title>
                <link rel="stylesheet" type="text/css" href="../style/styles.scss" />
            </head>
            <body>
                <h1 class="heading">Fakulta</h1>
                <xsl:apply-templates select="//katedra"/>
            </body>
        </html>
    </xsl:template>
    
    <xsl:template match="katedra">
    <div class="show-center">
        <h2>
            <xsl:value-of select="@zkratka_katedry"/>
        </h2>
        <p>
            <strong>Vedoucí: </strong>
            <xsl:value-of select="vedoucí/jméno"/> (<xsl:value-of select="vedoucí/telefon"/>)
        </p>
        <p>
            <strong>Zaměstnanci: </strong>
            <xsl:apply-templates select="zaměstnanci/zaměstnanec"/>
        </p>
        <p>
            <strong>Předměty: </strong>
            <xsl:apply-templates select="předměty/předmět"/>
        </p>
        </div>
    </xsl:template>
    
    <xsl:template match="zaměstnanec">
        <ul>
            <li>
                <strong>Jméno: </strong>
                <xsl:value-of select="jméno"/>
            </li>
            <li>
                <strong>Telefon: </strong>
                <xsl:value-of select="telefon"/>
            </li>
            <li>
                <strong>Email: </strong>
                <xsl:value-of select="email"/>
            </li>
            <li>
                <strong>Pozice: </strong>
                <xsl:value-of select="pozice/*"/>
            </li>
        </ul>
    </xsl:template>
    
    <xsl:template match="předmět">
        <ul>
            <li>
                <strong>Zkratka: </strong>
                <xsl:value-of select="@zkratka"/>
            </li>
            <li>
                <strong>Název: </strong>
                <xsl:value-of select="název"/>
            </li>
            <li>
                <strong>Popis: </strong>
                <xsl:value-of select="popis"/>
            </li>
        </ul>
    </xsl:template>
    
</xsl:stylesheet>
