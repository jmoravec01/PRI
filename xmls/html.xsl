<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
  <xsl:output method="html" indent="yes" />
  <xsl:template match="/">
    <html>
      <head>
        <title>XML to HTML Transformation</title>
      </head>
      <body>
        <h1>XML to HTML Transformation</h1>
        <xsl:apply-templates />
      </body>
    </html>
  </xsl:template>
  <xsl:template match="element">
    <div>
      <h2>
        <xsl:value-of select="@attribute" />
      </h2>
      <p>
        <xsl:value-of select="." />
      </p>
    </div>
  </xsl:template>
</xsl:stylesheet>