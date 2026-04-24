<?php

use Illuminate\Support\Facades\Route;

Route::view('/', 'welcome')->name('home');

Route::get('/print/code-breaker', function () {
    $message = request()->query('message', '');
    $decoded = base64_decode(urldecode($message));
    $allEmojis = [];
    $emojiPool = [
        'a' => '😀', 'b' => '😎', 'c' => '🌈', 'd' => '🎯', 'e' => '⭐',
        'f' => '🌙', 'g' => '🔥', 'h' => '🎀', 'i' => '🎁', 'j' => '🐾',
        'k' => '🎮', 'l' => '🦋', 'm' => '🎄', 'n' => '🌸', 'o' => '🌻',
        'p' => '🎃', 'q' => '🎲', 'r' => '🎳', 's' => '🎱', 't' => '🌷',
        'u' => '🍄', 'v' => '🌵', 'w' => '🎋', 'x' => '🎍', 'y' => '🎎',
        'z' => '🎐',
    ];

    if (! empty($decoded)) {
        $words = explode(' ', $decoded);

        foreach ($words as $wordIndex => $word) {
            $chars = preg_split('//u', $word, -1, PREG_SPLIT_NO_EMPTY);

            foreach ($chars as $char) {
                $lower = mb_strtolower($char);
                if (isset($emojiPool[$lower])) {
                    $allEmojis[] = $emojiPool[$lower];
                }
            }

            if ($wordIndex < count($words) - 1) {
                $allEmojis[] = ' ';
            }
        }
    }

    return view('livewire.code-breaker-print', [
        'allEmojis' => $allEmojis,
        'originalMessage' => $decoded,
    ]);
})->name('code-breaker.print');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::view('dashboard', 'dashboard')->name('dashboard');
});

require __DIR__.'/settings.php';
