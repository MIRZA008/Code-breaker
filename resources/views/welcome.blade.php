<x-layout>
    <section class="min-h-screen bg-primary py-12 relative overflow-hidden">
        <svg class="absolute inset-0 w-full h-full opacity-20 pointer-events-none animate-pulse" xmlns="http://www.w3.org/2000/svg">
            <defs>
                <pattern id="pacman-pattern" x="0" y="0" width="200" height="200" patternUnits="userSpaceOnUse">
                    <rect width="200" height="200" fill="transparent"/>
                    <g fill="#fb70a9" opacity="0.6">
                        <path d="M20 30 L25 35 L20 40 Q15 35 20 30" />
                        <circle cx="60" cy="25" r="4" fill="#fb70a9" />
                        <circle cx="90" cy="35" r="3" fill="#fb70a9" />
                        <path d="M110 30 L115 35 L110 40 Q105 35 110 30" />
                        <circle cx="140" cy="25" r="4" fill="#fb70a9" />
                        <circle cx="170" cy="35" r="3" fill="#fb70a9" />
                        <circle cx="40" cy="70" r="4" fill="#fb70a9" />
                        <circle cx="80" cy="65" r="3" fill="#fb70a9" />
                        <circle cx="120" cy="75" r="4" fill="#fb70a9" />
                        <circle cx="160" cy="65" r="3" fill="#fb70a9" />
                        <path d="M20 100 L25 105 L20 110 Q15 105 20 100" />
                        <circle cx="50" cy="100" r="4" fill="#fb70a9" />
                        <path d="M10 130 Q20 125 30 130 L30 140 Q20 145 10 140 Z" />
                        <circle cx="70" cy="130" r="3" fill="#fb70a9" />
                        <circle cx="110" cy="135" r="4" fill="#fb70a9" />
                        <path d="M140 130 L145 135 L140 140 Q135 135 140 130" />
                        <circle cx="170" cy="130" r="3" fill="#fb70a9" />
                        <circle cx="30" cy="160" r="4" fill="#fb70a9" />
                        <circle cx="80" cy="165" r="3" fill="#fb70a9" />
                        <circle cx="130" cy="160" r="4" fill="#fb70a9" />
                        <circle cx="180" cy="165" r="3" fill="#fb70a9" />
                        <path d="M150 170 Q160 165 170 170 L170 180 Q160 185 150 180 Z" />
                    </g>
                    <g fill="#4e56a6" opacity="0.4">
                        <circle cx="35" cy="50" r="2.5" />
                        <circle cx="75" cy="55" r="2" />
                        <circle cx="115" cy="48" r="2.5" />
                        <circle cx="155" cy="52" r="2" />
                        <circle cx="25" cy="90" r="2.5" />
                        <circle cx="65" cy="88" r="2" />
                        <circle cx="105" cy="95" r="2.5" />
                        <circle cx="145" cy="90" r="2" />
                        <circle cx="185" cy="95" r="2.5" />
                        <circle cx="55" cy="125" r="2" />
                        <circle cx="95" cy="120" r="2.5" />
                        <circle cx="135" cy="128" r="2" />
                        <circle cx="175" cy="125" r="2.5" />
                        <circle cx="45" cy="155" r="2" />
                        <circle cx="85" cy="150" r="2.5" />
                        <circle cx="125" cy="158" r="2" />
                        <circle cx="165" cy="155" r="2.5" />
                    </g>
                </pattern>
                <filter id="glow">
                    <feGaussianBlur stdDeviation="3" result="coloredBlur"/>
                    <feMerge>
                        <feMergeNode in="coloredBlur"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
                <filter id="neon">
                    <feGaussianBlur stdDeviation="4" result="blur"/>
                    <feFlood flood-color="#fb70a9" flood-opacity="0.75" result="color"/>
                    <feComposite in="color" in2="blur" operator="in" result="glow"/>
                    <feMerge>
                        <feMergeNode in="glow"/>
                        <feMergeNode in="glow"/>
                        <feMergeNode in="SourceGraphic"/>
                    </feMerge>
                </filter>
                <radialGradient id="orb1" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#fb70a9" stop-opacity="0.4"/>
                    <stop offset="100%" stop-color="#fb70a9" stop-opacity="0"/>
                </radialGradient>
                <radialGradient id="orb2" cx="50%" cy="50%" r="50%">
                    <stop offset="0%" stop-color="#4e56a6" stop-opacity="0.4"/>
                    <stop offset="100%" stop-color="#4e56a6" stop-opacity="0"/>
                </radialGradient>
            </defs>
            <rect width="100%" height="100%" fill="url(#pacman-pattern)"/>
            <circle cx="10%" cy="20%" r="200" fill="url(#orb1)" class="animate-pulse" style="animation-duration: 3s;"/>
            <circle cx="85%" cy="70%" r="250" fill="url(#orb2)" class="animate-pulse" style="animation-duration: 4s; animation-delay: 1s;"/>
            <circle cx="50%" cy="90%" r="180" fill="url(#orb1)" class="animate-pulse" style="animation-duration: 3.5s; animation-delay: 0.5s;"/>
        </svg>

        <style>
            @keyframes float {
                0%, 100% { transform: translateY(0px) rotate(0deg); }
                50% { transform: translateY(-15px) rotate(3deg); }
            }
            @keyframes glow-pulse {
                0%, 100% { filter: drop-shadow(0 0 10px #fb70a9) drop-shadow(0 0 20px #fb70a9); }
                50% { filter: drop-shadow(0 0 20px #fb70a9) drop-shadow(0 0 40px #fb70a9); }
            }
            @keyframes title-glow {
                0%, 100% { text-shadow: 4px 4px 0 rgba(0,0,0,0.3), 0 0 20px rgba(251,112,169,0.5); }
                50% { text-shadow: 4px 4px 0 rgba(0,0,0,0.3), 0 0 40px rgba(251,112,169,0.8), 0 0 60px rgba(251,112,169,0.4); }
            }
            @keyframes border-glow {
                0%, 100% { opacity: 0.4; }
                50% { opacity: 0.7; }
            }
            .logo-float { animation: float 4s ease-in-out infinite; }
            .logo-glow { animation: glow-pulse 2s ease-in-out infinite; }
            .title-glow { animation: title-glow 2s ease-in-out infinite; }
            .border-animate { animation: border-glow 3s ease-in-out infinite; }
        </style>

        <div container class="mx-auto wire:max-w-2xl relative z-10">
            <header class="mb-6 text-center">
                <div class="inline-block logo-float logo-glow">
                    <img src="{{ asset('Livewire.svg') }}" alt="Code Breaker Logo" class="mx-auto h-32 w-32">
                </div>
                <h1 class="mt-4 text-7xl font-display text-white uppercase title-glow">
                    <span style="letter-spacing: 0.15em;">C</span><span style="letter-spacing: 0.05em;">o</span><span style="letter-spacing: 0.25em;">d</span><span style="letter-spacing: 0.1em;">e</span>
                    <span style="letter-spacing: 0.35em;">B</span><span style="letter-spacing: 0.08em;">r</span><span style="letter-spacing: 0.2em;">e</span><span style="letter-spacing: 0.12em;">a</span><span style="letter-spacing: 0.18em;">k</span><span style="letter-spacing: 0.25em;">e</span><span style="letter-spacing: 0.05em;">r</span>
                </h1>
            </header>
            <livewire:code-breaker />
        </div>
    </section>

</x-layout>
