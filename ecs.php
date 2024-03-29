<?php

declare(strict_types=1);

use PhpCsFixer\Fixer\Alias\NoMixedEchoPrintFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoMultilineWhitespaceAroundDoubleArrowFixer;
use PhpCsFixer\Fixer\ArrayNotation\NormalizeIndexBraceFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoTrailingCommaInSinglelineArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\NoWhitespaceBeforeCommaInArrayFixer;
use PhpCsFixer\Fixer\ArrayNotation\TrimArraySpacesFixer;
use PhpCsFixer\Fixer\ArrayNotation\WhitespaceAfterCommaInArrayFixer;
use PhpCsFixer\Fixer\Basic\BracesFixer;
use PhpCsFixer\Fixer\Casing\MagicConstantCasingFixer;
use PhpCsFixer\Fixer\Casing\NativeFunctionCasingFixer;
use PhpCsFixer\Fixer\CastNotation\CastSpacesFixer;
use PhpCsFixer\Fixer\CastNotation\LowercaseCastFixer;
use PhpCsFixer\Fixer\CastNotation\NoShortBoolCastFixer;
use PhpCsFixer\Fixer\CastNotation\ShortScalarCastFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassAttributesSeparationFixer;
use PhpCsFixer\Fixer\ClassNotation\ClassDefinitionFixer;
use PhpCsFixer\Fixer\ClassNotation\NoBlankLinesAfterClassOpeningFixer;
use PhpCsFixer\Fixer\ClassNotation\NoUnneededFinalMethodFixer;
use PhpCsFixer\Fixer\ClassNotation\ProtectedToPrivateFixer;
use PhpCsFixer\Fixer\ClassNotation\SelfAccessorFixer;
use PhpCsFixer\Fixer\ClassNotation\SingleClassElementPerStatementFixer;
use PhpCsFixer\Fixer\Comment\NoEmptyCommentFixer;
use PhpCsFixer\Fixer\Comment\SingleLineCommentStyleFixer;
use PhpCsFixer\Fixer\ControlStructure\IncludeFixer;
use PhpCsFixer\Fixer\ControlStructure\NoTrailingCommaInListCallFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededControlParenthesesFixer;
use PhpCsFixer\Fixer\ControlStructure\NoUnneededCurlyBracesFixer;
use PhpCsFixer\Fixer\FunctionNotation\FunctionTypehintSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\MethodArgumentSpaceFixer;
use PhpCsFixer\Fixer\FunctionNotation\ReturnTypeDeclarationFixer;
use PhpCsFixer\Fixer\FunctionNotation\VoidReturnFixer;
use PhpCsFixer\Fixer\Import\NoLeadingImportSlashFixer;
use PhpCsFixer\Fixer\Import\NoUnusedImportsFixer;
use PhpCsFixer\Fixer\LanguageConstruct\DeclareEqualNormalizeFixer;
use PhpCsFixer\Fixer\NamespaceNotation\NoLeadingNamespaceWhitespaceFixer;
use PhpCsFixer\Fixer\NamespaceNotation\SingleBlankLineBeforeNamespaceFixer;
use PhpCsFixer\Fixer\Operator\BinaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\ConcatSpaceFixer;
use PhpCsFixer\Fixer\Operator\IncrementStyleFixer;
use PhpCsFixer\Fixer\Operator\NewWithBracesFixer;
use PhpCsFixer\Fixer\Operator\ObjectOperatorWithoutWhitespaceFixer;
use PhpCsFixer\Fixer\Operator\StandardizeIncrementFixer;
use PhpCsFixer\Fixer\Operator\StandardizeNotEqualsFixer;
use PhpCsFixer\Fixer\Operator\TernaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Operator\UnaryOperatorSpacesFixer;
use PhpCsFixer\Fixer\Phpdoc\GeneralPhpdocTagRenameFixer;
use PhpCsFixer\Fixer\Phpdoc\NoEmptyPhpdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAlignFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocAnnotationWithoutDotFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocIndentFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocInlineTagNormalizerFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAccessFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoAliasTagFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoEmptyReturnFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoPackageFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocNoUselessInheritdocFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocReturnSelfReferenceFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocScalarFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSeparationFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSingleLineVarSpacingFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocSummaryFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTrimFixer;
use PhpCsFixer\Fixer\Phpdoc\PhpdocTypesFixer;
use PhpCsFixer\Fixer\PhpTag\BlankLineAfterOpeningTagFixer;
use PhpCsFixer\Fixer\PhpUnit\PhpUnitFqcnAnnotationFixer;
use PhpCsFixer\Fixer\Semicolon\NoEmptyStatementFixer;
use PhpCsFixer\Fixer\Semicolon\NoSinglelineWhitespaceBeforeSemicolonsFixer;
use PhpCsFixer\Fixer\Semicolon\SemicolonAfterInstructionFixer;
use PhpCsFixer\Fixer\Semicolon\SpaceAfterSemicolonFixer;
use PhpCsFixer\Fixer\StringNotation\SingleQuoteFixer;
use PhpCsFixer\Fixer\Whitespace\BlankLineBeforeStatementFixer;
use PhpCsFixer\Fixer\Whitespace\NoExtraBlankLinesFixer;
use PhpCsFixer\Fixer\Whitespace\NoSpacesAroundOffsetFixer;
use PhpCsFixer\Fixer\Whitespace\NoWhitespaceInBlankLineFixer;
use Symfony\Component\DependencyInjection\Loader\Configurator\ContainerConfigurator;
use Symplify\EasyCodingStandard\ValueObject\Option;
use Symplify\EasyCodingStandard\ValueObject\Set\SetList;

return static function (ContainerConfigurator $containerConfigurator): void {
    // A. Imports
    $containerConfigurator->import(SetList::CLEAN_CODE);
    $containerConfigurator->import(SetList::COMMON);
    $containerConfigurator->import(SetList::PSR_12);
    $containerConfigurator->import(SetList::SYMFONY);
    $containerConfigurator->import(SetList::SYMFONY_RISKY);

    // B. Services
    $services = $containerConfigurator->services();

    $services->set(BracesFixer::class)
        ->call('configure', [
            [
                'allow_single_line_closure' => true,
            ],
        ]);
    $services->set(BlankLineAfterOpeningTagFixer::class);
    $services->set(ConcatSpaceFixer::class)
        ->call('configure', [
            [
                'spacing' => 'one',
            ],
        ]);
    $services->set(NewWithBracesFixer::class);
    $services->set(PhpdocAlignFixer::class)
        ->call('configure', [
            [
                'tags' => [
                    'method',
                    'param',
                    'property',
                    'return',
                    'throws',
                    'type',
                    'var',
                ],
            ],
        ]);
    $services->set(BinaryOperatorSpacesFixer::class);
    $services->set(IncrementStyleFixer::class)
        ->call('configure', [
            [
                'style' => 'post',
            ],
        ]);
    $services->set(UnaryOperatorSpacesFixer::class);
    $services->set(BlankLineBeforeStatementFixer::class);
    $services->set(CastSpacesFixer::class);
    $services->set(DeclareEqualNormalizeFixer::class);
    $services->set(FunctionTypehintSpaceFixer::class);
    $services->set(SingleLineCommentStyleFixer::class)
        ->call('configure', [
            [
                'comment_types' => [
                    'hash',
                ],
            ],
        ]);
    $services->set(IncludeFixer::class);
    $services->set(LowercaseCastFixer::class);
    $services->set(ClassAttributesSeparationFixer::class)
        ->call('configure', [
            [
                'elements' => [
                    'method' => 'one',
                ],
            ],
        ]);
    $services->set(NativeFunctionCasingFixer::class);
    $services->set(NoBlankLinesAfterClassOpeningFixer::class);
    $services->set(NoEmptyCommentFixer::class);
    $services->set(NoEmptyPhpdocFixer::class);
    $services->set(PhpdocSeparationFixer::class);
    $services->set(NoEmptyStatementFixer::class);
    $services->set(NoExtraBlankLinesFixer::class)
        ->call('configure', [
            [
                'tokens' => [
                    'curly_brace_block',
                    'extra',
                    'parenthesis_brace_block',
                    'parenthesis_brace_block',
                    'square_brace_block',
                    'throw',
                    'use',
                ],
            ],
        ]);
    $services->set(NoLeadingNamespaceWhitespaceFixer::class);
    $services->set(NoMultilineWhitespaceAroundDoubleArrowFixer::class);
    $services->set(NoShortBoolCastFixer::class);
    $services->set(NoSinglelineWhitespaceBeforeSemicolonsFixer::class);
    $services->set(NoSpacesAroundOffsetFixer::class);
    $services->set(NoTrailingCommaInListCallFixer::class);
    $services->set(NoTrailingCommaInSinglelineArrayFixer::class);
    $services->set(NoUnneededControlParenthesesFixer::class);
    $services->set(NoWhitespaceBeforeCommaInArrayFixer::class);
    $services->set(NoWhitespaceInBlankLineFixer::class);
    $services->set(NormalizeIndexBraceFixer::class);
    $services->set(ObjectOperatorWithoutWhitespaceFixer::class);
    $services->set(PhpdocAnnotationWithoutDotFixer::class);
    $services->set(PhpdocIndentFixer::class);
    $services->set(PhpdocNoAccessFixer::class);
    $services->set(PhpdocNoEmptyReturnFixer::class);
    $services->set(PhpdocNoPackageFixer::class);
    $services->set(PhpdocNoUselessInheritdocFixer::class);
    $services->set(PhpdocReturnSelfReferenceFixer::class);
    $services->set(PhpdocScalarFixer::class);
    $services->set(PhpdocSingleLineVarSpacingFixer::class);
    $services->set(PhpdocSummaryFixer::class);
    $services->set(PhpdocTrimFixer::class);
    $services->set(PhpdocTypesFixer::class);
    $services->set(ReturnTypeDeclarationFixer::class);
    $services->set(SelfAccessorFixer::class);
    $services->set(ShortScalarCastFixer::class);
    $services->set(SingleQuoteFixer::class);
    $services->set(SpaceAfterSemicolonFixer::class);
    $services->set(StandardizeNotEqualsFixer::class);
    $services->set(TernaryOperatorSpacesFixer::class);
    $services->set(TrimArraySpacesFixer::class);
    $services->set(WhitespaceAfterCommaInArrayFixer::class);
    $services->set(ClassDefinitionFixer::class)
        ->call('configure', [
            [
                'single_line' => true,
            ],
        ]);
    $services->set(MagicConstantCasingFixer::class);
    $services->set(MethodArgumentSpaceFixer::class);
    $services->set(NoMixedEchoPrintFixer::class)
        ->call('configure', [
            [
                'use' => 'echo',
            ],
        ]);
    $services->set(NoLeadingImportSlashFixer::class);
    $services->set(NoUnusedImportsFixer::class);
    $services->set(PhpUnitFqcnAnnotationFixer::class);
    $services->set(PhpdocNoAliasTagFixer::class);
    $services->set(ProtectedToPrivateFixer::class);
    $services->set(SingleBlankLineBeforeNamespaceFixer::class);
    $services->set(SingleClassElementPerStatementFixer::class);

    // new since PHP-CS-Fixer 2.6
    $services->set(NoUnneededCurlyBracesFixer::class);
    $services->set(NoUnneededFinalMethodFixer::class);
    $services->set(SemicolonAfterInstructionFixer::class);

    // new since PHP-CS-Fixer 2.9
    $services->set(PhpdocInlineTagNormalizerFixer::class);
    $services->set(GeneralPhpdocTagRenameFixer::class);

    // new since 2.11
    $services->set(StandardizeIncrementFixer::class);

    // C. Parameters
    $parameters = $containerConfigurator->parameters();

    // Paths
    $parameters->set(Option::PATHS, [
        __DIR__ . '/src',
        __DIR__ . '/ecs.php',
    ]);
    $parameters->set(Option::CACHE_DIRECTORY, 'var/cache/ecs');
    $parameters->set(Option::SKIP, [
        VoidReturnFixer::class => [
            __DIR__ . '/src/Model/**/*',
        ],
    ]);

    // Enable Parallel Runs
    $parameters->set(Option::PARALLEL, true);
};
