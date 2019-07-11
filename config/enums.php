<?php

return [
    'receipt_types' => [
        0 => 'Geld uitgegeven',
        1 => 'Geld ontvangen',
    ],
    'vat_types' => [
        0 => 'Excl. BTW',
        1 => 'Incl. BTW',
    ],
    'ledger_categories' => [
        'BAL' => "Balans",
        'WV' => "Winst & Verlies",
        'CRE' => "Crediteuren",
        'DEB' => "Debiteuren",
        'BET' => "Betalingsmiddelen",
        'VB' => "Voorbelasting",
        'BTWH' => "BTW af te dragen Hoog",
        'BTWL' => "BTW af te dragen Laag",
        'BTWO' => "BTW af te dragen overig",
        'BTWRC' => "BTW R/C",
    ],
    'ledger_defaults' => [
        ['code' => '0130', 'description' => 'Inventarissen', 'category' => 'BAL'],
        ['code' => '0140', 'description' => 'Hardware', 'category' => 'BAL'],
        ['code' => '0740', 'description' => 'Langlopende leningen', 'category' => 'BAL'],
        ['code' => '1000', 'description' => 'Bank', 'category' => 'BET'],
        ['code' => '1010', 'description' => 'Kas', 'category' => 'BET'],
        ['code' => '1300', 'description' => 'Debiteuren', 'category' => 'DEB'],
        ['code' => '1400', 'description' => 'Beginkapitaal', 'category' => 'BAL'],
        ['code' => '1410', 'description' => 'Privé-opnamen en stortingen', 'category' => 'BAL'],
        ['code' => '1500', 'description' => 'Vorderingen (kortlopend)', 'category' => 'BAL'],
        ['code' => '1600', 'description' => 'Voorbelasting', 'category' => 'VB'],
        ['code' => '1630', 'description' => 'BTW af te dragen Hoog', 'category' => 'BTWH'],
        ['code' => '1631', 'description' => 'BTW af te dragen Laag', 'category' => 'BTWL'],
        ['code' => '1632', 'description' => 'BTW af te dragen overig', 'category' => 'BTWO'],
        ['code' => '1650', 'description' => 'BTW R/C', 'category' => 'BTWRC'],
        ['code' => '1700', 'description' => 'Crediteuren', 'category' => 'CRE'],
        ['code' => '1800', 'description' => 'Schulden (kortlopend)', 'category' => 'BAL'],
        ['code' => '2000', 'description' => 'Kruisposten', 'category' => 'BAL'],
        ['code' => '4335', 'description' => 'Afschr. Inventarissen', 'category' => 'WV'],
        ['code' => '4340', 'description' => 'Afschr. Hardware', 'category' => 'WV'],
        ['code' => '4500', 'description' => 'Contributies en abonnementen', 'category' => 'WV'],
        ['code' => '4510', 'description' => 'Reclame en advertenties', 'category' => 'WV'],
        ['code' => '4520', 'description' => 'Representatie en verteer', 'category' => 'WV'],
        ['code' => '4530', 'description' => 'Reis- en verblijfkosten', 'category' => 'WV'],
        ['code' => '4540', 'description' => 'Relatiegeschenken', 'category' => 'WV'],
        ['code' => '4550', 'description' => 'Bankkosten', 'category' => 'WV'],
        ['code' => '4590', 'description' => 'Overige verkoopkosten', 'category' => 'WV'],
        ['code' => '4600', 'description' => 'Kilometervergoeding', 'category' => 'WV'],
        ['code' => '4650', 'description' => 'Verzendkosten', 'category' => 'WV'],
        ['code' => '4700', 'description' => 'Kantoorbenodigdheden', 'category' => 'WV'],
        ['code' => '4740', 'description' => 'Drukwerk, porti en vrachten', 'category' => 'WV'],
        ['code' => '4750', 'description' => 'Telefoon en fax', 'category' => 'WV'],
        ['code' => '4790', 'description' => 'Overige kantoorkosten', 'category' => 'WV'],
        ['code' => '4810', 'description' => 'Accountants- en administratiekosten', 'category' => 'WV'],
        ['code' => '4850', 'description' => 'Cursussen/seminars', 'category' => 'WV'],
        ['code' => '4860', 'description' => 'Vakliteratuur', 'category' => 'WV'],
        ['code' => '4900', 'description' => 'Betalingsverschillen', 'category' => 'WV'],
        ['code' => '4950', 'description' => 'Oninbare vorderingen', 'category' => 'WV'],
        ['code' => '7000', 'description' => 'Inkopen', 'category' => 'WV'],
        ['code' => '8000', 'description' => 'Omzet groep 1', 'category' => 'WV'],
        ['code' => '9998', 'description' => 'Eindresultaat', 'category' => 'WV'],
        ['code' => '9999', 'description' => 'Verrekeningen', 'category' => 'BAL'],
    ],
];
