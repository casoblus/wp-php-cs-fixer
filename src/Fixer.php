<?php

namespace WeDevs\Fixer;


/**
 * The fixer utility class.
 */
class Fixer
{
    public static function rules()
    {
        return  [
			'@PSR2' => true,
            '@PhpCsFixer:risky' => true,
            'align_multiline_comment' => true,
            /*
             * Arrays must be declared using
             * long array syntax.
             */
            'array_syntax' => ['syntax' => 'long'],
            'binary_operator_spaces' => [
                'operators' => [
                    // Use real tabs and not spaces,
                    // Exception: if you have a block of code 
                    // that would be more readable if things
                    // are aligned, use spaces
					'=' => 'align_single_space',
                    '=>' => 'align_single_space_minimal',
                    /*
                     * Always put spaces on both sides of 
                     * logical, comparison, string and 
                     * assignment operators.
                     */
					'*' => 'single_space',
					'/' => 'single_space',
					'%' => 'single_space',
					'<' => 'single_space',
					'>' => 'single_space',
					'|' => 'single_space',
					'^' => 'single_space', 
					'+' => 'single_space',
					'-' => 'single_space',
					'&' => 'single_space',
					'&=' => 'single_space',
					'&&' => 'single_space',
					'||' => 'single_space',
					'.=' => 'single_space',
					'/=' => 'single_space',
					'==' => 'single_space',
					'>=' => 'single_space',
					'===' => 'single_space',
					'!=' => 'single_space',
					'<>' => 'single_space',
					'!==' => 'single_space',
					'<=' => 'single_space',
					'and' => 'single_space',
					'or' => 'single_space',
					'xor' => 'single_space',
					'-=' => 'single_space',
					'%=' => 'single_space',
					'*=' => 'single_space',
					'|=' => 'single_space',
					'+=' => 'single_space',
					'<<' => 'single_space',
					'<<=' => 'single_space',
					'>>' => 'single_space',
					'>>=' => 'single_space',
					'^=' => 'single_space',
					'**' => 'single_space',
					'**=' => 'single_space',
					'<=>' => 'single_space',
					'??' => 'single_space',
					'??='=> 'single_space',
				],
            ],
            'blank_line_after_opening_tag' => true,
            'blank_line_before_statement' => [
                'statements' => [
                    'break', 
					'case',
                    'continue',
                    'declare', 
					'do', 
					'for', 
					'foreach',
					'if', 
					'return',
                    'throw', 
					'try', 
					'while',
				],
            ],
            'braces' => [
                'position_after_functions_and_oop_constructs' => 'same',
                'allow_single_line_closure' => false,
            ],
            'cast_spaces' => ['space' => 'single'],
            'class_attributes_separation' => [
				'elements' => [
					'method' => 'one',
					'const' => 'one',
					'property' => 'one',
				],
			],
            'class_definition' => ['single_line' => true],
            'concat_space' => ['spacing' => 'one'],
            'constant_case' =>  false,
            'dir_constant' => true,
            'echo_tag_syntax' => true,
            /*
             * Use elseif, not else if
             */
            'elseif' => true,
            'full_opening_tag' => true,
            'fully_qualified_strict_types' => true,
            'function_declaration' => true,
            'WeDevs/space_inside_brackets' => true,
            'WeDevs/space_inside_parenthesis' => true,
            'WeDevs/blank_line_after_class_opening' => true,
			'no_spaces_inside_parenthesis' => false,
			'no_blank_lines_after_class_opening' => false,
            'function_typehint_space' => true,
            'global_namespace_import' => ['import_classes' => true],
            'header_comment' => [
                'header' => 'Made with love.',
                'comment_type' => 'PHPDoc',
                'location' => 'after_open',
                'separate' => 'bottom',
            ],
            'include' => true,
            'line_ending' => true,
            'list_syntax' => ['syntax' => 'long'],
            'lowercase_cast' => true,
            'lowercase_keywords' => true,
            'lowercase_static_reference' => true,
            'magic_constant_casing' => false,
            'magic_method_casing' => true,
            'method_argument_space' => true,
            'method_chaining_indentation' => true,
            'native_constant_invocation' => true,
            'native_function_casing' => true,
            'native_function_type_declaration_casing' => true,
            'new_with_braces' => true,
            /*
             * You are free to use the alternative syntax 
             * for control structures especially in your 
             * templates where PHP code is embedded within
             * HTML.
             */
            'no_alternative_syntax' => false,
            'no_blank_lines_after_class_opening' => false,
            'no_blank_lines_after_phpdoc' => true,
            'no_empty_comment' => true,
            'no_empty_phpdoc' => true,
            'no_empty_statement' => true,
            'no_extra_blank_lines' => ['tokens' => [
                'extra',
                'parenthesis_brace_block',
                'square_brace_block',
                'throw',
                'use',
            ]],
            'no_leading_import_slash' => true,
            'no_leading_namespace_whitespace' => true,
            'no_mixed_echo_print' => true,
            'no_multiline_whitespace_around_double_arrow' => true,
            'no_short_bool_cast' => true,
            /*
             * Never use shorthand PHP start tags
             */
			'echo_tag_syntax' => ['format' => 'long'],
            'no_singleline_whitespace_before_semicolons' => true,
            'no_spaces_around_offset' => ['positions' => ['outside']],
            'no_spaces_inside_parenthesis' => false,
            'no_superfluous_phpdoc_tags' => ['allow_mixed' => true, 'allow_unused_params' => true],
            'no_trailing_comma_in_list_call' => true,
            'no_trailing_comma_in_singleline_array' => true,
            /*
             * Remove trailing whitespace 
             * at the end of each line of code
             */
            'no_trailing_whitespace' => true,
            'no_unneeded_control_parentheses' => true,
            'no_unneeded_curly_braces' => true,
            'no_unneeded_final_method' => true,
            'no_unused_imports' => true,
            'no_whitespace_before_comma_in_array' => true,
            'no_whitespace_in_blank_line' => true,
            'normalize_index_brace' => true,
            'not_operator_with_successor_space' => true,
            'object_operator_without_whitespace' => true,
            'ordered_imports' => true,
            'php_unit_fqcn_annotation' => true,
            'phpdoc_align' => [
                'align' => 'vertical',
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
            'phpdoc_annotation_without_dot' => true,
            'phpdoc_indent' => true,
            'phpdoc_inline_tag_normalizer' => true,
            //'phpdoc_inline_tag' => true,
            'phpdoc_no_access' => true,
            'phpdoc_no_alias_tag' => true,
            'phpdoc_no_package' => false,
            'phpdoc_no_useless_inheritdoc' => true,
            'phpdoc_return_self_reference' => true,
            'phpdoc_scalar' => true,
            'phpdoc_separation' => true,
            'phpdoc_single_line_var_spacing' => true,
            'phpdoc_to_comment' => false,
            'phpdoc_trim' => true,
            'phpdoc_trim_consecutive_blank_line_separation' => true,
            'phpdoc_types' => true,
            'phpdoc_types_order' => [
                'null_adjustment' => 'always_last',
                'sort_algorithm' => 'none',
            ],
            'phpdoc_var_without_name' => true,
            'return_type_declaration' => true,
            'semicolon_after_instruction' => true,
            'short_scalar_cast' => true,
            'single_blank_line_before_namespace' => true,
            'single_class_element_per_statement' => true,
            'single_line_comment_style' => true,
            'single_line_comment_spacing'=> true,
            'single_line_throw' => true,
            //If you’re not evaluating anything in the string, use single quotes.
            'single_quote' => true,
            'single_trait_insert_per_statement' => true,
            'space_after_semicolon' => [
                'remove_in_empty_for_expressions' => true,
            ],
            'ternary_to_elvis_operator' => false, 
            'ternary_to_null_coalescing' => true,
            'standardize_increment' => true,
            'standardize_not_equals' => true,
            'strict_comparison' => true,
            'ternary_operator_spaces' => true,
            // 'trailing_comma_in_multiline_array' => true,
			'trailing_comma_in_multiline' => [
				'elements' => ['arrays'],
                'after_heredoc' => true,
			],
            
            'trim_array_spaces' => false,
            'whitespace_after_comma_in_array' => true,
			'yoda_style' => [
				'always_move_variable' => true,
			],
		];
    }
}
