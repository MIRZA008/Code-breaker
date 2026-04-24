<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Code Breaker - Printable</title>
    <link href="https://fonts.googleapis.com/css2?family=Bangers&family=Instrument+Sans:wght@400;500;600&display=swap" rel="stylesheet">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Instrument Sans', sans-serif;
            padding: 20px;
            background: #fff;
            color: #000;
        }
        .header {
            text-align: center;
            margin-bottom: 15px;
            border-bottom: 2px solid #0a2444;
            padding-bottom: 10px;
        }
        .header h1 {
            font-family: 'Bangers', cursive;
            font-size: 2.2rem;
            color: #0a2444;
            letter-spacing: 2px;
            margin-top: 5px;
        }
        .instructions {
            text-align: center;
            background: #f0f0f0;
            padding: 10px;
            border-radius: 8px;
            margin-bottom: 15px;
            border: 2px dashed #0a2444;
        }
        .instructions h2 {
            color: #0a2444;
            font-size: 1rem;
            margin-bottom: 3px;
        }
        .instructions p {
            color: #333;
            font-size: 0.8rem;
        }
        .secret-code-section {
            margin-bottom: 20px;
        }
        .secret-code-section h2 {
            background: #0a2444;
            color: #fff;
            padding: 8px 15px;
            border-radius: 8px 8px 0 0;
            font-size: 1rem;
            display: inline-block;
            margin-bottom: 0;
        }
.emoji-container {
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            padding: 20px;
            background: #f9f9f9;
            border: 2px solid #0a2444;
            border-radius: 0 0 10px 10px;
            justify-content: flex-start;
            align-items: flex-start;
        }
        .emoji-row {
            display: flex;
            flex-wrap: wrap;
            align-items: flex-start;
            gap: 10px;
        }
        .emoji-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            padding: 6px;
            background: #fff;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
        }
        .box-number {
            display: none;
        }
        .emoji-box {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 6px;
            padding: 8px;
            background: #fff;
            border-radius: 10px;
            border: 2px solid #e0e0e0;
        }
        .box-number {
            font-size: 0.7rem;
            color: #888;
            font-weight: bold;
        }
        .emoji {
            font-size: 2.2rem;
            background: #fff;
            border: 3px solid #0a2444;
            border-radius: 12px;
            width: 65px;
            height: 65px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-family: 'Segoe UI Emoji', 'Apple Color Emoji', 'Noto Color Emoji', 'Android Emoji', 'OpenSans Emoji', emoji;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        .answer-box {
            width: 65px;
            height: 45px;
            border: 3px solid #333;
            border-radius: 8px;
            text-align: center;
            font-size: 1.5rem;
            font-weight: bold;
            text-transform: uppercase;
            background: #fff;
        }
        .answer-box:focus {
            outline: none;
            border-color: #0a2444;
            background: #f0f7ff;
        }
        .legend-section {
            margin-top: 25px;
        }
        .legend-section h2 {
            background: #fb70a9;
            color: #fff;
            padding: 8px 15px;
            border-radius: 10px;
            font-size: 1rem;
            text-align: center;
            margin-bottom: 10px;
        }
        .legend-grid {
            display: grid;
            grid-template-columns: repeat(13, 1fr);
            gap: 6px;
            padding: 10px;
            background: #f9f9f9;
            border: 2px solid #0a2444;
            border-radius: 10px;
        }
        .legend-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 2px;
            background: #fff;
            padding: 5px;
            border-radius: 6px;
            border: 1px solid #ddd;
        }
        .legend-emoji {
            font-size: 1.2rem;
        }
        .legend-letter {
            font-weight: bold;
            font-size: 0.9rem;
            color: #0a2444;
        }
        .footer {
            margin-top: 30px;
            text-align: center;
            font-size: 0.8rem;
            color: #666;
            border-top: 1px solid #ccc;
            padding-top: 15px;
        }
        @media print {
            @page {
                size: A4 portrait;
                margin: 10mm;
            }
            body {
                padding: 10px;
                font-size: 14px;
            }
            .no-print {
                display: none;
            }
            .secret-code-section {
                break-inside: avoid;
                page-break-inside: avoid;
            }
            .legend-section {
                break-before: auto;
                page-break-before: auto;
            }
            .emoji-container, .legend-grid {
                break-inside: avoid;
                page-break-inside: avoid;
            }
            .words-wrapper {
                break-inside: avoid;
            }
            .word-group {
                gap: 6px !important;
            }
            .word-space {
                width: 25px !important;
            }
            .emoji {
                width: 55px !important;
                height: 55px !important;
                font-size: 1.8rem !important;
            }
            .emoji-box {
                gap: 3px !important;
                padding: 4px !important;
            }
            .box-number {
                font-size: 0.55rem !important;
            }
            .answer-box {
                width: 55px !important;
                height: 35px !important;
                font-size: 1.2rem !important;
            }
            .legend-item {
                padding: 4px !important;
            }
            .legend-emoji {
                font-size: 1.1rem !important;
            }
            .legend-letter {
                font-size: 0.8rem !important;
            }
            .legend-grid {
                grid-template-columns: repeat(13, 1fr) !important;
            }
            .header h1 {
                font-size: 2rem !important;
            }
            .instructions {
                padding: 8px !important;
                margin-bottom: 12px !important;
            }
            .legend-section {
                margin-top: 15px !important;
            }
            h2 {
                font-size: 1rem !important;
                padding: 6px 12px !important;
            }
        }
        .close-btn {
            display: none;
        }
        @media screen {
            .close-btn {
                display: block;
                position: fixed;
                top: 20px;
                right: 20px;
                background: #0a2444;
                color: #fff;
                border: none;
                padding: 10px 20px;
                border-radius: 5px;
                cursor: pointer;
                font-size: 1rem;
            }
            .close-btn:hover {
                background: #1a3a5c;
            }
            .print-btn-container {
                display: block;
                text-align: center;
                margin-top: 20px;
            }
        }
    </style>
</head>
<body>
    <button class="close-btn no-print" onclick="window.close()">✕ Close</button>
    
    <div class="header">
        <img src="https://code-breaker-main-lnap9e.free.laravel.cloud/Livewire.svg" alt="Livewire Logo" style="height: 80px; margin-bottom: 10px;">
        <h1 style="margin-top: 10px;">CODE BREAKER</h1>
    </div>

    <div class="instructions">
        <h2>📝 Instructions</h2>
        <p>Look at each emoji below and write the correct letter in the box. Use the legend to help you!</p>
    </div>

    <div class="secret-code-section">
        <h2>🔒 Your Secret Code</h2>
        <div class="emoji-container">
            @if(is_array($allEmojis) && count($allEmojis) > 0)
                <div class="emoji-row">
                    @foreach($allEmojis as $item)
                        @if($item === ' ')
                            <div class="word-space"></div>
                        @else
                            <div class="emoji-box">
                                <div class="emoji">{!! $item !!}</div>
                                <input type="text" class="answer-box" maxlength="1" placeholder="">
                            </div>
                        @endif
                    @endforeach
                </div>
            @else
                <p class="text-gray-500">No code to decode</p>
            @endif
        </div>
    </div>

    <div class="legend-section">
        <h2>🗝️ Secret Code Legend - Keep this handy!</h2>
        <div class="legend-grid">
            @foreach(['a' => '😀', 'b' => '😎', 'c' => '🌈', 'd' => '🎯', 'e' => '⭐', 'f' => '🌙', 'g' => '🔥', 'h' => '🎀', 'i' => '🎁', 'j' => '🐾', 'k' => '🎮', 'l' => '🦋', 'm' => '🎄', 'n' => '🌸', 'o' => '🌻', 'p' => '🎃', 'q' => '🎲', 'r' => '🎳', 's' => '🎱', 't' => '🌷', 'u' => '🍄', 'v' => '🌵', 'w' => '🎋', 'x' => '🎍', 'y' => '🎎', 'z' => '🎐'] as $letter => $emoji)
                <div class="legend-item">
                    <span class="legend-emoji">{{ $emoji }}</span>
                    <span class="legend-letter">{{ $letter }}</span>
                </div>
            @endforeach
        </div>
    </div>

    <div class="footer">
        <p>Code Breaker - Learn and Play! 🌟</p>
    </div>

    <script>
        window.onload = function() {
            // Auto-focus first answer box
            const firstBox = document.querySelector('.answer-box');
            if (firstBox) {
                firstBox.focus();
            }
        };
    </script>
</body>
</html>