<?php

require_once __DIR__.'/src/Fixer.php';
require_once __DIR__.'/src/FixerName.php';
require_once __DIR__.'/src/SpaceInsideParenthesisFixer.php';
require_once __DIR__.'/src/BlankLineAfterClassOpeningFixer.php';
require_once __DIR__.'/src/SpaceInsideBracketsFixer.php';

$finder = PhpCsFixer\Finder::create()
	->exclude('node_modules')
	->exclude('vendors')
	// ->notPath()
	->in(__DIR__)
;

$config = new PhpCsFixer\Config();
return $config
	->registerCustomFixers([
		new WeDevs\Fixer\SpaceInsideParenthesisFixer(),
		new WeDevs\Fixer\SpaceInsideBracketsFixer(),
		new WeDevs\Fixer\BlankLineAfterClassOpeningFixer(),
	])
	->setRiskyAllowed(true)
    ->setUsingCache(false)
	->setRules(
		WeDevs\Fixer\Fixer::rules()
	)
	// Use real tabs and not spaces
	->setIndent("	")
	->setLineEnding("\n")
	->setRiskyAllowed(true)
	->setFinder($finder)
;
