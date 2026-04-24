<div class="flex flex-col items-center mt-6 sm:mt-10 px-4">
    <textarea wire:model.live="message" cols="25" rows="4"
        class="w-full max-w-md bg-white/30 text-white rounded-lg p-3 sm:p-4 border-2 border-white/30 focus:border-pink-400 focus:outline-none placeholder:text-white/60 resize-none backdrop-blur-sm transition-all duration-300 hover:bg-white/40 text-base sm:text-lg"
        placeholder="Type your Secret-Code here..."></textarea>
    
    @if(strlen($message) > 0)
        <div class="mt-6 sm:mt-8 relative group w-full max-w-md px-2 sm:px-0">
            <div class="absolute -inset-1 bg-gradient-to-r from-pink-500 via-purple-500 to-blue-500 rounded-2xl blur opacity-50 group-hover:opacity-75 transition duration-500"></div>
            <div class="relative bg-black/60 backdrop-blur-md rounded-2xl p-4 sm:p-8 border border-white/20 shadow-2xl text-center">
                
                <p class="text-white/60 text-xs sm:text-sm mb-3 sm:mb-4 font-display uppercase tracking-wider">Your Secret Code</p>
                <p class="text-2xl sm:text-4xl text-white tracking-widest leading-relaxed min-h-[60px] sm:min-h-[80px] text-center font-mono mb-3 sm:mb-4">
                    {{ $this->encodedMessage }}
                </p>
                
                @if($originalRevealed)
                    <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-white/10">
                        <p class="text-green-400 text-xs sm:text-sm font-display uppercase tracking-wider mb-1 sm:mb-2">✨ Original Message:</p>
                        <p class="text-lg sm:text-2xl text-white font-display break-all">{{ $message }}</p>
                    </div>
                    <div class="mt-3 sm:mt-4 flex items-center justify-center gap-2 flex-wrap">
                        <span class="text-green-400 text-xs sm:text-sm font-display uppercase tracking-wider">Code Revealed!</span>
                        <button wire:click="resetGame" class="text-white/60 hover:text-white text-xs sm:text-sm transition">Reset ↺</button>
                    </div>
                @else
                    @if($showRiddle)
                        <div class="mt-3 sm:mt-4 pt-3 sm:pt-4 border-t border-white/10">
                            @php $riddleData = $currentRiddle ? json_decode($currentRiddle, true) : ['question' => '', 'hint' => '']; @endphp
                            <p class="text-pink-300 text-xs sm:text-sm mb-2">{{ $riddleData['question'] ?? '' }}</p>
                            <p class="text-yellow-400 text-xs mb-3 sm:mb-4 italic">{{ $riddleData['hint'] ?? '' }}</p>
                            <div class="flex gap-2">
                                <input type="text" wire:model.live="riddleAnswer" placeholder="Your answer..." 
                                    class="flex-1 bg-white/20 text-white placeholder:text-white/50 rounded-lg px-3 py-2 border border-white/30 focus:border-pink-400 focus:outline-none text-sm" />
                                <button wire:click="checkRiddle" class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-3 py-2 rounded-lg font-display text-sm hover:opacity-90 transition">
                                    Check ✓
                                </button>
                            </div>
                            @if($riddleError)
                                <p class="text-red-400 text-xs mt-2">{{ $riddleError }}</p>
                            @endif
                        </div>
                        <div class="mt-3">
                            <button wire:click="toggleRiddle" class="text-white/60 hover:text-white text-xs sm:text-sm transition">← Back</button>
                        </div>
                    @else
                        <div class="mt-4 flex flex-col sm:flex-row gap-2 sm:gap-3 justify-center">
                            <button wire:click="toggleRiddle" class="bg-gradient-to-r from-pink-500 to-purple-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-display text-xs sm:text-sm hover:opacity-90 transition shadow-lg">
                                Know the Code? 🔓
                            </button>
                            <button onclick="window.open('{{ route('code-breaker.print', ['message' => urlencode(base64_encode($message))]) }}', '_blank')" class="bg-gradient-to-r from-green-500 to-emerald-500 text-white px-4 sm:px-6 py-2 sm:py-3 rounded-xl font-display text-xs sm:text-sm hover:opacity-90 transition shadow-lg">
                                📄 Print
                            </button>
                        </div>
                    @endif
                @endif
            </div>
        </div>
    @else
        <div class="mt-6 sm:mt-8 text-center">
            <div class="text-5xl sm:text-6xl mb-3 sm:mb-4 opacity-50">🔒</div>
            <p class="text-white/60 font-display text-sm sm:text-base">Type a secret code above to reveal its magic!</p>
        </div>
    @endif

    <div class="mt-8 sm:mt-10 w-full max-w-2xl px-2 sm:px-0">
        <div class="relative group">
            <div class="absolute -inset-1 bg-gradient-to-r from-yellow-500 via-orange-500 to-red-500 rounded-2xl blur opacity-30"></div>
            <div class="relative bg-black/60 backdrop-blur-md rounded-2xl p-4 sm:p-6 border border-white/20">
                <p class="text-center text-yellow-400 text-xs sm:text-sm mb-3 sm:mb-4 font-display uppercase tracking-wider">🗝️ Secret Code Legend</p>
                <div class="grid grid-cols-4 sm:grid-cols-6 md:grid-cols-9 gap-1 sm:gap-2 text-center">
                    @foreach(['a' => '😀', 'b' => '😎', 'c' => '🌈', 'd' => '🎯', 'e' => '⭐', 'f' => '🌙', 'g' => '🔥', 'h' => '🎀', 'i' => '🎁', 'j' => '🐾', 'k' => '🎮', 'l' => '🦋', 'm' => '🎄', 'n' => '🌸', 'o' => '🌻', 'p' => '🎃', 'q' => '🎲', 'r' => '🎳', 's' => '🎱', 't' => '🌷', 'u' => '🍄', 'v' => '🌵', 'w' => '🎋', 'x' => '🎍', 'y' => '🎎', 'z' => '🎐'] as $letter => $emoji)
                        <div class="bg-white/10 rounded p-1 sm:p-2 hover:bg-white/20 transition">
                            <span class="text-lg sm:text-2xl">{{ $emoji }}</span>
                            <span class="block text-white text-xs font-bold uppercase mt-0.5">{{ $letter }}</span>
                        </div>
                    @endforeach
                </div>
                <p class="text-center text-white/50 text-xs mt-3 sm:mt-4">Match each emoji to its letter!</p>
            </div>
        </div>
    </div>
</div>
