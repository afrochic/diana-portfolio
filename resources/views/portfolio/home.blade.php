@extends('layouts.app')
@section('title','Diana Musee | Software Engineer · UI/UX')
@section('content')

<!-- Hero Section -->
<section class="relative min-h-[88vh] flex items-center justify-center overflow-hidden">
  <canvas id="particles" class="absolute inset-0"></canvas>
  <div class="relative z-10 max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-center">
    <div class="flex justify-center md:justify-start">
      <div class="relative">
        <div class="absolute -inset-1 rounded-full bg-[var(--accent)] blur-2xl opacity-20"></div>
        <img src="{{ asset('assets/images/dee.jpeg') }}" alt="Diana Musee" class="relative w-48 h-48 md:w-56 md:h-56 rounded-full border-4 border-[var(--accent)] object-cover shadow-xl">
      </div>
    </div>
    <div>
      <p class="uppercase text-xs tracking-widest text-slate-400">Nairobi, Kenya</p>
      <h1 class="mt-3 text-4xl md:text-6xl font-bold leading-tight">
        <span class="typing">Software Engineer</span> <span class="text-[var(--accent)]">&</span> UI/UX Designer
      </h1>
      <p class="mt-4 text-slate-300">
        I design and build delightful, data-informed products. From chatbots and dashboards to mobile apps and games.
      </p>
      <div class="mt-6 flex gap-3">
        <a href="#projects" class="px-5 py-3 rounded-full bg-[var(--accent)] hover:opacity-90">See Projects</a>
        <a href="#contact" class="px-5 py-3 rounded-full border border-white/10 hover:bg-white/5">Contact</a>
      </div>
    </div>
  </div>
</section>

<!-- About Section -->
<section id="about" class="py-20">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
    <div class="p-1 rounded-3xl bg-gradient-to-br from-[var(--accent)]/40 to-cyan-500/30">
      <div class="rounded-3xl bg-slate-900 p-8 h-full">
        <h2 class="text-2xl font-semibold">About Me</h2>
        <p class="mt-4 text-slate-300">
          Software Developer & Graphic Designer experienced in Python (Django), Java, Laravel/PHP, UI/UX & Data Analytics.
        </p>
        <ul class="mt-6 space-y-2 text-slate-300 text-sm">
          <li>• Predictive & prescriptive analytics</li>
          <li>• Interactive dashboards & UX prototyping</li>
          <li>• Omnichannel data integration</li>
        </ul>
      </div>
    </div>
    <div class="rounded-3xl bg-slate-900 p-8 border border-white/5">
      <h3 class="text-xl font-semibold">Core Tools</h3>
      <div class="mt-6 grid grid-cols-3 gap-4 text-center text-sm">
        @foreach(['Python','Java','Laravel','Figma','Power BI','SQL'] as $tool)
        <div class="skill-ring">{{$tool}}</div>
        @endforeach
      </div>
      <p class="mt-6 text-slate-400 text-xs">Tap a ring to bounce ✨</p>
      <div class="mt-6">
        <label class="block mb-2 text-sm">Pick Accent Color</label>
        <input type="color" id="accent-picker-inline" value="#a855f7" class="w-12 h-8 cursor-pointer border rounded">
      </div>
    </div>
  </div>
</section>

<!-- Experience Section -->
<section id="experience" class="py-20">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-10">Experience</h2>
    <div class="space-y-6">
      @foreach([
        ['title'=>'Software Developer / Graphic Designer — Pathways Technologies','time'=>'Mar 2023 – Present · Nairobi, Kenya','points'=>['Python/Django, Java, SQL; scalable systems.','Kenya Red Cross chatbot; boosted engagement.','Power BI dashboards; predictive/prescriptive analytics.']],
        ['title'=>'Software Developer Intern — CorkBrick Europe (Remote)','time'=>'May 2022 – Nov 2022','points'=>['Unity game dev; auth/inventory; UI/UX in Figma.']],
        ['title'=>'Embedded Systems Intern — Emertxe (Remote)','time'=>'Feb 2022 – May 2022','points'=>['IoT simulation for smart washer; sensor analytics.']],
        ['title'=>'IT Officer Intern — Office of the Attorney General (Kenya)','time'=>'Feb 2021 – Apr 2021','points'=>['Laravel records system; wireframes; IT support.']]
      ] as $exp)
      <div class="timeline-card">
        <div>
          <h3 class="font-semibold">{{$exp['title']}}</h3>
          <p class="text-slate-400 text-sm">{{$exp['time']}}</p>
        </div>
        <ul class="mt-3 text-slate-300 text-sm list-disc pl-5 space-y-1">
          @foreach($exp['points'] as $point)
          <li>{{$point}}</li>
          @endforeach
        </ul>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Projects Section -->
<section id="projects" class="py-20">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-10">Projects</h2>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['title'=>'National Legal Aid Service','link'=>'https://portal.nlas.go.ke/login','tech'=>'Django, Figma'],
        ['title'=>'Waste Assistant (IoT)','link'=>'https://github.com/afrochic/waste_assistant.git','tech'=>'Arduino, Android, Firebase'],
        ['title'=>'CorkBrick Game','link'=>'https://corkbrick.com/pages/corkbrick-play','tech'=>'Unity, Blender, Figma'],
        ['title'=>'Clone Technologies Website','link'=>'http://clone-technologies.com/','tech'=>'Laravel, Figma'],
        ['title'=>'Afro Chitchat — Chat App','link'=>'https://github.com/afrochic/afrochicChat.git','tech'=>'Android, Firebase']
      ] as $proj)
      <a href="{{$proj['link']}}" target="_blank" class="project-card">
        <div class="project-body">
          <h3 class="font-semibold">{{$proj['title']}}</h3>
          <p class="text-slate-400 text-sm">{{$proj['tech']}}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Skills Section -->
<section id="skills" class="py-20">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-6">Skills</h2>
    <div class="flex flex-wrap gap-2 text-xs">
      @foreach(['Python','SQL','Java','PHP','C++','JavaScript','Power BI','Azure','Databricks','Figma','Tableau','GitHub','Firebase','Android Studio','Unity','AWS'] as $s)
      <span class="px-3 py-2 rounded-full bg-slate-800 border border-white/10">{{$s}}</span>
      @endforeach
    </div>
  </div>
</section>

<!-- Contact Section -->
<section id="contact" class="py-20">
  <div class="max-w-4xl mx-auto px-4">
    <div class="rounded-3xl bg-slate-900 border border-white/5 p-8">
      <h2 class="text-2xl font-semibold">Let’s Build Something</h2>
      <form class="mt-6 grid md:grid-cols-2 gap-4" method="POST" action="https://formspree.io/f/mblknnby">
        <input type="hidden" name="_subject" value="Portfolio Contact — Diana Musee">
        <div>
          <label class="block text-sm mb-2">Name</label>
          <input name="name" class="w-full bg-slate-800 rounded-xl px-4 py-3 outline-none focus:ring-2 ring-[var(--accent)]" required>
        </div>
        <div>
          <label class="block text-sm mb-2">Email</label>
          <input name="_replyto" type="email" class="w-full bg-slate-800 rounded-xl px-4 py-3 outline-none focus:ring-2 ring-[var(--accent)]" required>
        </div>
        <div class="md:col-span-2">
          <label class="block text-sm mb-2">Message</label>
          <textarea name="message" rows="4" class="w-full bg-slate-800 rounded-xl px-4 py-3 outline-none focus:ring-2 ring-[var(--accent)]" required></textarea>
        </div>
        <div class="md:col-span-2 flex items-center justify-between">
          <p class="text-slate-400 text-xs">Powered by Formspree. No backend email setup needed.</p>
          <button class="px-6 py-3 rounded-full bg-[var(--accent)] hover:opacity-90">Send</button>
        </div>
      </form>
    </div>
  </div>
</section>

@endsection
