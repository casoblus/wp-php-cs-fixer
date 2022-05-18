<?php

declare(strict_types=1);

namespace WeDevs\Fixer;

use PhpCsFixer\AbstractFixer;
use PhpCsFixer\FixerDefinition\CodeSample;
use PhpCsFixer\FixerDefinition\FixerDefinition;
use PhpCsFixer\Tokenizer\CT;
use PhpCsFixer\FixerDefinition\FixerDefinitionInterface;
use PhpCsFixer\Tokenizer\Tokens;

/**
 * There must be a space inside the brackets indexes.
 *
 * @author Carlos A. Sobrino <casobrinolusquinos@gmail.com>
 */
final class SpaceInsideBracketsFixer extends AbstractFixer
{
    use FixerName;

    private $singleLineWhitespaceOptions = " \t";

    /**
     * {@inheritdoc}
     */
    public function getDefinition(): FixerDefinitionInterface
    {
        return new FixerDefinition(
            'There MUST be a space after the opening brackets and a space before the closing brakets, on array index notation.',
            [
                new CodeSample("<?php \$a[1]; ?>"),
                new CodeSample("<?php \$a[ \$b ]; ?>"),
                new CodeSample("<?php \$a['b']; ?>"),
            ]
        );
    }

    /**
     * {@inheritdoc}
     *
     * Must run before FunctionToConstantFixer, GetClassToClassKeywordFixer, StringLengthToEmptyFixer.
     * Must run after CombineConsecutiveIssetsFixer, CombineNestedDirnameFixer, LambdaNotUsedImportFixer, ModernizeStrposFixer, NoTrailingCommaInSinglelineFunctionCallFixer, NoUselessSprintfFixer, PowToExponentiationFixer.
     */
    public function getPriority(): int
    {
        return 2;
    }

    /**
     * {@inheritdoc}
     */
    public function isCandidate(Tokens $tokens): bool
    {
        return $tokens->isTokenKindFound('[');
    }

    /**
     * {@inheritdoc}
     */
    protected function applyFix(\SplFileInfo $file, Tokens $tokens): void
    {
        foreach ($tokens as $index => $token) {
            if (!$token->equals('[')) {
                continue;
            }

            
            $nextMeaningfulTokenIndex = $tokens->getNextMeaningfulToken($index);
            $nextMeaningfulTokenContent = $tokens[$nextMeaningfulTokenIndex]->getContent();
            // don't process if the next token is `]`
			if (']' === $nextMeaningfulTokenContent
            || "$" !== mb_substr($nextMeaningfulTokenContent, 0, 1, "UTF-8")) {
                continue;
            } 

            // if ("'" === mb_substr($nextMeaningfulTokenContent, 0, 1, "UTF-8")) {
            //     continue;
            // }

            $endBracketIndex = $tokens->findBlockEnd(Tokens::BLOCK_TYPE_INDEX_SQUARE_BRACE, $index);

            $afterBracketIndex = $tokens->getNextNonWhitespace($endBracketIndex);
            $afterBracketToken = $tokens[$afterBracketIndex];


            if ($afterBracketToken->isGivenKind(CT::T_USE_LAMBDA)) {
                $useStartBracketIndex = $tokens->getNextTokenOfKind($afterBracketIndex, ['[']);
                $useEndBracketIndex = $tokens->findBlockEnd(Tokens::BLOCK_TYPE_INDEX_SQUARE_BRACE, $useStartBracketIndex);

                // add single-line edge whitespaces inside use parentheses
                $this->fixBracketInnerEdge($tokens, $useStartBracketIndex, $useEndBracketIndex);
            }

            // add single-line edge whitespaces inside parameters list parentheses
            $this->fixBracketInnerEdge($tokens, $index, $endBracketIndex);
        }
    }

    private function fixBracketInnerEdge(Tokens $tokens, int $start, int $end): void
    {
        // add single-line whitespace before )
        if (!$tokens[$end - 1]->isWhitespace($this->singleLineWhitespaceOptions) && false === strpos($tokens[$end - 1]->getContent(), "\n")) {
            $tokens->ensureWhitespaceAtIndex($end, 0, ' ');
        }

        // add single-line whitespace after (
        if (!$tokens[$start + 1]->isWhitespace($this->singleLineWhitespaceOptions) && false === strpos($tokens[$start + 1]->getContent(), "\n")) {
            $tokens->ensureWhitespaceAtIndex($start, 1, ' ');
        }
    }
}
