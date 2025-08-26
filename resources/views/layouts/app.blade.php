<!DOCTYPE html>
<html lang="en" x-data>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>@yield('title','Diana Musee | Software Engineer · UI/UX')</title>

  <!-- TailwindCSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- AlpineJS -->
  <script defer src="https://unpkg.com/alpinejs@3.x.x/dist/cdn.min.js"></script>
  <!-- GSAP -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js"></script>

  <!-- Google Fonts -->
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;600;700&display=swap" rel="stylesheet">

  <!-- Custom CSS -->
  <link rel="stylesheet" href="{{ secure_asset('assets/css/portfolio.css') }}">
</head>
<body class="bg-slate-950 text-slate-100 font-[Poppins] antialiased">

  <!-- Scroll progress -->
  <div id="scroll-progress" class="fixed top-0 left-0 h-1 bg-[var(--accent)] z-50" style="width:0"></div>

  <!-- Header -->
  <header class="fixed top-0 left-0 right-0 z-40 backdrop-blur bg-slate-950/60 border-b border-white/5">
    <div class="max-w-6xl mx-auto px-4 py-4 flex items-center justify-between">
      <a href="{{ route('home') }}" class="text-xl font-semibold tracking-wide">Diana<span class="text-[var(--accent)]">.</span></a>
      <nav class="hidden md:flex items-center gap-6 text-slate-300">
        <a href="#about" class="hover:text-white">About</a>
        <a href="#skills" class="hover:text-white">Skills</a>
        <a href="#experience" class="hover:text-white">Experience</a>
        <a href="#projects" class="hover:text-white">Projects</a>
        <a href="#contact" class="hover:text-white">Contact</a>
      </nav>
      <div class="flex items-center gap-3">
        <a href="{{ asset('assets/docs/resume.pdf') }}" download class="hidden md:inline-flex px-4 py-2 rounded-full bg-[var(--accent)] hover:opacity-90 transition">Download Resume</a>
      </div>
      <button class="md:hidden" x-data @click="$dispatch('open-mobile')">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16M4 12h16M4 18h16"/></svg>
      </button>
    </div>
    <div x-data="{open:false}" @open-mobile.window="open = true">
      <div x-show="open" class="md:hidden px-4 pb-4 space-y-2">
        <a href="#about" class="block py-2" @click="open=false">About</a>
        <a href="#skills" class="block py-2" @click="open=false">Skills</a>
        <a href="#experience" class="block py-2" @click="open=false">Experience</a>
        <a href="#projects" class="block py-2" @click="open=false">Projects</a>
        <a href="#contact" class="block py-2" @click="open=false">Contact</a>
      </div>
    </div>
  </header>

  <!-- Main Content -->
  <main class="pt-24">
    @yield('content')
  </main>

  <!-- Footer -->
  <footer class="border-t border-white/5 mt-20">
    <div class="max-w-6xl mx-auto px-4 py-10 text-sm text-slate-400 flex justify-between">
      <p>© {{ date('Y') }} Diana Musee. All rights reserved.</p>
      <div class="flex gap-4">
        <a href="http://linkedin.com/in/diana-musee-8798ba174" target="_blank" class="hover:text-white">LinkedIn</a>
        <a href="http://github.com/afrochic__" target="_blank" class="hover:text-white">GitHub</a>
      </div>
    </div>
  </footer>

  <!-- Scripts -->
  <script src="{{ secure_asset('assets/js/portfolio.js') }}"></script>
</body>
</html>
