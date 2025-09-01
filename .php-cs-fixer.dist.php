<?php

declare(strict_types=1);

$finder = PhpCsFixer\Finder::create()
    ->in(['src', 'tests', 'fixtures'])
    ->exclude('vendor');

return (new PhpCsFixer\Config())
    ->setRiskyAllowed(true)  // Allow risky fixers like declare_strict_types
    ->setRules([
        '@PSR12' => true,
        'array_syntax' => ['syntax' => 'short'],
        'ordered_imports' => true,
        'no_unused_imports' => true,
        'single_quote' => true,
        'no_trailing_whitespace' => true,
        'no_whitespace_in_blank_line' => true,
        'blank_line_before_statement' => true,
        'binary_operator_spaces' => ['default' => 'align_single_space'],
        'cast_spaces' => ['space' => 'none'],
        'declare_strict_types' => true,
        'function_declaration' => ['closure_function_spacing' => 'none'],
        'class_attributes_separation' => ['elements' => ['method' => 'one']],
        'method_argument_space' => ['on_multiline' => 'ensure_fully_multiline'],
        'no_extra_blank_lines' => ['tokens' => ['extra']],
        'no_empty_statement' => true,
        'no_leading_import_slash' => true,
        'no_trailing_comma_in_singleline' => true,
        'phpdoc_align' => ['align' => 'left'],
        'phpdoc_trim' => true,
        'phpdoc_no_access' => true,
        'phpdoc_no_package' => true,
        'phpdoc_order' => true,
    ])
    ->setFinder($finder);
