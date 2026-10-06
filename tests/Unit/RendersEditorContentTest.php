<?php

use App\Models\MembershipPaymentMethod;

function renderPaymentInstructions(?string $json): string
{
    return (new MembershipPaymentMethod(['instructions' => $json]))->instructionsHtml();
}

it('renders paragraph and header blocks', function () {
    $html = renderPaymentInstructions(json_encode([
        'blocks' => [
            ['type' => 'header', 'data' => ['text' => 'Payment steps', 'level' => 3]],
            ['type' => 'paragraph', 'data' => ['text' => 'Step one']],
        ],
    ], JSON_THROW_ON_ERROR));

    expect($html)->toBe('<h3>Payment steps</h3><p>Step one</p>');
});

it('renders list items stored as plain strings', function () {
    $html = renderPaymentInstructions(json_encode([
        'blocks' => [
            ['type' => 'list', 'data' => ['style' => 'unordered', 'items' => ['One', 'Two']]],
        ],
    ], JSON_THROW_ON_ERROR));

    expect($html)->toBe('<ul><li>One</li><li>Two</li></ul>');
});

it('renders list items stored as editorjs v2 objects', function () {
    $html = renderPaymentInstructions(json_encode([
        'blocks' => [
            ['type' => 'list', 'data' => ['style' => 'ordered', 'items' => [
                ['content' => 'First', 'meta' => []],
                ['content' => 'Second'],
                ['meta' => []],
            ]]],
        ],
    ], JSON_THROW_ON_ERROR));

    expect($html)->toBe('<ol><li>First</li><li>Second</li><li></li></ol>');
});

it('renders table blocks with a header row', function () {
    $html = renderPaymentInstructions(json_encode([
        'blocks' => [
            ['type' => 'table', 'data' => ['content' => [
                ['Bank', 'Account'],
                ['Example Bank', '1234567890'],
            ]]],
        ],
    ], JSON_THROW_ON_ERROR));

    expect($html)->toBe(
        '<table><tr><th>Bank</th><th>Account</th></tr>'
        .'<tr><td>Example Bank</td><td>1234567890</td></tr></table>'
    );
});

it('renders image blocks', function () {
    $html = renderPaymentInstructions(json_encode([
        'blocks' => [
            ['type' => 'image', 'data' => [
                'file' => ['url' => 'https://example.com/bkash.png'],
                'caption' => 'Bkash number',
            ]],
        ],
    ], JSON_THROW_ON_ERROR));

    expect($html)->toBe('<img src="https://example.com/bkash.png" alt="Bkash number">');
});

it('escapes plain text content', function () {
    expect(renderPaymentInstructions('<script>alert(1)</script>'))
        ->toBe('&lt;script&gt;alert(1)&lt;/script&gt;');
});

it('returns an empty string for empty instructions', function () {
    expect(renderPaymentInstructions(null))->toBe('')
        ->and(renderPaymentInstructions(''))->toBe('');
});
