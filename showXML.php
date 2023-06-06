<?php
// XML content
$xmlContent = '<?xml version="1.0" encoding="UTF-8"?>
<root>
  <element attribute="Attribute 1">Value 1</element>
  <element attribute="Attribute 2">Value 2</element>
  <element attribute="Attribute 3">Value 3</element>
</root>';

// XSLT content
$xsltContent = '<?xml version="1.0" encoding="UTF-8"?>
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
</xsl:stylesheet>';

// Create the XML and XSLT documents
$xml = new DOMDocument();
$xml->loadXML($xmlContent);

$xslt = new DOMDocument();
$xslt->loadXML($xsltContent);

// Create the XSLT processor and import the XSLT stylesheet
$processor = new XSLTProcessor();
$processor->importStylesheet($xslt);

// Apply the XSLT transformation
$html = $processor->transformToXML($xml);
