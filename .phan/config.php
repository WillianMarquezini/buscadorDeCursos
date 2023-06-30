<?php

return [
  "target_php_version" => '8.2',
  'directory_list' => [
    'src',
    'vendor/symfony/dom-crawler',
    'vendor/guzzlehttp/guzzle',
    'vendor/psr/http-message'
  ],
  'exclude_analysis_directory_list' => [
    'vendor/'
  ],
  'plugins' => [
    'AlwaysReturnPlugin',
    'DollarDollarPlugin',
    'DuplicateArrayKeyPlugin',
    'DuplicateExpressionPlugin',
    'PregRegexCheckerPlugin',
    'PrintfCheckerPlugin',
    'SleepCheckerPlugin'
  ]
];