<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
    function validateXmlAgainstDtd()
    {
        $xmlFilePath = '/xmls/nevim.xml';
        $dtdFilePath = '/xmls/nevim.dtd';
        libxml_use_internal_errors(true);

        // Create a DOMDocument with the XML file
        $domXml = new DOMDocument();
        $domXml->load($xmlFilePath);

        // Create a DOMImplementation
        $implementation = new DOMImplementation();

        // Create a DOMDocumentType and associate the DTD file
        $doctype = $implementation->createDocumentType('root', '', $dtdFilePath);
        $domXml->appendChild($doctype);

        // Validate XML against DTD
        $isValid = $domXml->validate();

        libxml_clear_errors();
        return $isValid;
    }

    if (validateXmlAgainstDtd()) {
        echo '<p>jes</p>';
    }
    ?>
</body>

</html>