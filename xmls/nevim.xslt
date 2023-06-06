<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" indent="yes"/>

  <xsl:template match="/">
    <html>
      <head>
        <title>Fakulta</title>
        <link rel="stylesheet" type="text/css" href="../style/styles.scss" />
      </head>
      <body>
        <h1>Fakulta</h1>
        <xsl:apply-templates select="/fakulta/katedra"/>
      </body>
    </html>
  </xsl:template>

  <xsl:template match="katedra">
    <h2>
      <xsl:value-of select="@zkratka_katedry"/>
    </h2>
    <p>
      Web: <a href="{@web}">
        <xsl:value-of select="@web"/>
      </a>
    </p>
    <h3>Vedoucí:</h3>
    <xsl:apply-templates select="vedouci"/>
    <h3>Zaměstnanci:</h3>
    <xsl:apply-templates select="zamestnanci/zamestnanec"/>
    <h3>Předměty:</h3>
    <xsl:apply-templates select="predmety/predmet"/>
  </xsl:template>

  <xsl:template match="vedouci">
    <p>
      Jméno: <xsl:value-of select="jmeno"/>
    </p>
    <p>
      Telefon: <xsl:value-of select="telefon"/>
    </p>
    <p>
      Email: <xsl:value-of select="email"/>
    </p>
    <p>
      Pozice: <xsl:value-of select="pozice"/>
    </p>
  </xsl:template>

  <xsl:template match="zamestnanec">
    <p>
      Jméno: <xsl:value-of select="jmeno"/>
    </p>
    <p>
      Telefon: <xsl:value-of select="telefon"/>
    </p>
    <p>
      Email: <xsl:value-of select="email"/>
    </p>
    <p>
      Pozice: <xsl:value-of select="pozice"/>
    </p>
  </xsl:template>

  <xsl:template match="predmet">
    <h4>
      <xsl:value-of select="nazev"/>
    </h4>
    <p>
      Zkratka: <xsl:value-of select="@zkratka"/>
    </p>
    <p>
      Popis: <xsl:value-of select="popis"/>
    </p>
  </xsl:template>

</xsl:stylesheet>
