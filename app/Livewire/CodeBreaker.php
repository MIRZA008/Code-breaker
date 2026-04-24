<?php

namespace App\Livewire;

use Livewire\Component;

class CodeBreaker extends Component
{
    public string $message = '';

    public string $riddleAnswer = '';

    public bool $codeRevealed = false;

    public bool $showRiddle = false;

    public bool $originalRevealed = false;

    public string $riddleError = '';

    public ?string $currentRiddle = null;

    private array $emojiPool = [
        'a' => '😀', 'b' => '😎', 'c' => '🌈', 'd' => '🎯', 'e' => '⭐',
        'f' => '🌙', 'g' => '🔥', 'h' => '🎀', 'i' => '🎁', 'j' => '🐾',
        'k' => '🎮', 'l' => '🦋', 'm' => '🎄', 'n' => '🌸', 'o' => '🌻',
        'p' => '🎃', 'q' => '🎲', 'r' => '🎳', 's' => '🎱', 't' => '🌷',
        'u' => '🍄', 'v' => '🌵', 'w' => '🎋', 'x' => '🎍', 'y' => '🎎',
        'z' => '🎐',
    ];

    private array $riddles = [
        [
            'question' => 'I speak without a mouth and hear without ears. I have no body, but I come alive with wind. What am I?',
            'hint' => '💡 HINT: You hear me in mountains and canyons...',
            'answers' => ['echo', 'an echo', 'the echo'],
        ],
        [
            'question' => 'I have cities, but no houses. I have mountains, but no trees. I have water, but no fish. What am I?',
            'hint' => '💡 HINT: You look at me every day on maps...',
            'answers' => ['map', 'a map', 'the map'],
        ],
        [
            'question' => 'The more you take, the more you leave behind. What am I?',
            'hint' => '💡 HINT: You use them every day on the ground...',
            'answers' => ['footsteps', 'steps', 'footprints'],
        ],
        [
            'question' => 'I can fly without wings. I cry without eyes. Wherever I go, darkness follows me. What am I?',
            'hint' => '💡 HINT: Look up at the night sky...',
            'answers' => ['cloud', 'a cloud', 'the cloud'],
        ],
        [
            'question' => 'I have keys but no locks. I have space but no room. You can enter but cannot go inside. What am I?',
            'hint' => '💡 HINT: I help you type on a machine...',
            'answers' => ['keyboard', 'a keyboard', 'the keyboard'],
        ],
        [
            'question' => 'I am not alive, but I grow. I don\'t have lungs, but I need air. I don\'t have a mouth, but water kills me. What am I?',
            'hint' => '💡 HINT: I start as a tiny spark...',
            'answers' => ['fire', 'a fire', 'the fire'],
        ],
        [
            'question' => 'I have hands but cannot clap. I have a face but cannot smile. I tell you something but never speak. What am I?',
            'hint' => '💡 HINT: Time is always with me...',
            'answers' => ['clock', 'a clock', 'the clock', 'watch', 'a watch'],
        ],
        [
            'question' => 'I am born in darkness, live in light. I make shadows dance, yet I am the shadow itself. What am I?',
            'hint' => '💡 HINT: You see me when the sun shines...',
            'answers' => ['light', 'sunlight', 'beam', 'ray'],
        ],
    ];

    public function getEncodedMessageProperty(): string
    {
        if (empty($this->message)) {
            return '';
        }

        $result = '';
        $chars = str_split(strtolower($this->message));

        foreach ($chars as $char) {
            if (isset($this->emojiPool[$char])) {
                $result .= $this->emojiPool[$char];
            }
        }

        return $result;
    }

    public function getVisibleMessageProperty(): string
    {
        if (empty($this->message)) {
            return '';
        }

        $result = '';
        $chars = str_split($this->message);

        foreach ($chars as $char) {
            if (ctype_alpha($char) || $char === ' ') {
                $result .= $char;
            } else {
                $result .= '▪';
            }
        }

        return $result;
    }

    public function getRandomRiddle(): array
    {
        return $this->riddles[array_rand($this->riddles)];
    }

    public function updatedMessage()
    {
        $this->originalRevealed = false;
        $this->codeRevealed = false;
        $this->showRiddle = false;
        $this->riddleAnswer = '';
        $this->riddleError = '';
        $this->currentRiddle = null;
    }

    public function toggleRiddle()
    {
        $this->showRiddle = ! $this->showRiddle;
        if ($this->showRiddle && ! $this->currentRiddle) {
            $this->currentRiddle = json_encode($this->getRandomRiddle());
        }
    }

    public function checkRiddle()
    {
        if (! $this->currentRiddle) {
            return;
        }

        $riddleData = json_decode($this->currentRiddle, true);
        $answer = strtolower(trim($this->riddleAnswer));
        $validAnswers = array_map('strtolower', $riddleData['answers']);

        if (in_array($answer, $validAnswers)) {
            $this->codeRevealed = true;
            $this->originalRevealed = true;
            $this->showRiddle = false;
            $this->riddleError = '';
            $this->riddleAnswer = '';
        } else {
            $this->riddleError = '❌ Wrong answer! Try again.';
        }
    }

    public function resetGame()
    {
        $this->codeRevealed = false;
        $this->originalRevealed = false;
        $this->showRiddle = false;
        $this->riddleAnswer = '';
        $this->riddleError = '';
        $this->currentRiddle = null;
        $this->message = '';
    }

    public function render()
    {
        return view('livewire.code-breaker');
    }
}
