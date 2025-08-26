@extends('layouts.app')
@section('title','Diana Musee | Software Engineer · UI/UX')
@section('content')

<!-- XP / Level Bar -->
<div id="xp-bar" class="fixed top-0 left-0 w-full h-2 bg-slate-800 z-50">
  <div id="xp-progress" class="h-full bg-[var(--accent)] transition-all"></div>
</div>

<!-- Achievement Pop-up -->
<div id="achievement" class="hidden fixed bottom-5 right-5 bg-slate-900 text-white p-4 rounded-2xl shadow-xl z-50"></div>

<!-- Hero / Start Screen -->
<section class="relative min-h-[88vh] flex items-center justify-center overflow-hidden">
  <canvas id="particles" class="absolute inset-0 pointer-events-none"></canvas>
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

<!-- About / Quest 1 -->
<section id="about" class="py-20 quest-section">
  <div class="max-w-6xl mx-auto px-4 grid md:grid-cols-2 gap-10 items-start">
    <div class="p-1 rounded-3xl bg-gradient-to-br from-[var(--accent)]/40 to-cyan-500/30">
      <div class="rounded-3xl bg-slate-900 p-8 h-full">
        <h2 class="text-2xl font-semibold">Quest 1: Who Am I</h2>
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
      <div class="mt-6 grid grid-cols-3 gap-4 text-center">
        @foreach([
          ['name'=>'Python','icon'=>'🐍'],
          ['name'=>'Java','icon'=>'☕'],
          ['name'=>'Laravel','icon'=>'💻'],
          ['name'=>'Figma','icon'=>'🎨'],
          ['name'=>'Power BI','icon'=>'📊'],
          ['name'=>'SQL','icon'=>'🗄️']
        ] as $tool)
        <div class="skill-ring flex flex-col items-center justify-center cursor-pointer hover:scale-110 transition-transform duration-300">
          <div class="text-4xl">{{$tool['icon']}}</div>
          <span class="text-xs mt-1 text-slate-300">{{$tool['name']}}</span>
        </div>
        @endforeach
      </div>
      <p class="mt-6 text-slate-400 text-xs">Tap a skill to bounce ✨ and gain XP</p>
      <div class="mt-6">
        <label class="block mb-2 text-sm">Pick Accent Color</label>
        <input type="color" id="accent-picker-inline" value="#a855f7" class="w-12 h-8 cursor-pointer border rounded">
      </div>
    </div>
  </div>
</section>

<!-- Experience / Quest 2 -->
<section id="experience" class="py-20 quest-section">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-10">Quest 2: Battle Experience</h2>
    <div class="space-y-6">
      @foreach([
        ['title'=>'Software Developer / Graphic Designer — Pathways Technologies','time'=>'Mar 2023 – Present · Nairobi, Kenya','points'=>['Python/Django, Java, SQL; scalable systems.','Kenya Red Cross chatbot; boosted engagement.','Power BI dashboards; predictive/prescriptive analytics.']],
        ['title'=>'Software Developer Intern — CorkBrick Europe (Remote)','time'=>'May 2022 – Nov 2022','points'=>['Unity game dev; auth/inventory; UI/UX in Figma.']],
        ['title'=>'Embedded Systems Intern — Emertxe (Remote)','time'=>'Feb 2022 – May 2022','points'=>['IoT simulation for smart washer; sensor analytics.']],
        ['title'=>'IT Officer Intern — Office of the Attorney General (Kenya)','time'=>'Feb 2021 – Apr 2021','points'=>['Laravel records system; wireframes; IT support.']]
      ] as $exp)
      <div class="timeline-card p-6 rounded-2xl bg-slate-800 border border-white/10 cursor-pointer hover:scale-105 transition-transform" onclick="showAchievement('Unlocked Experience: {{$exp['title']}}'); gainXP(15)">
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

<!-- Projects / Quest 3 -->
<section id="projects" class="py-20 quest-section">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-10">Quest 3: Legendary Builds</h2>
    <div class="grid md:grid-cols-3 gap-6">
      @foreach([
        ['title'=>'National Legal Aid Service','link'=>'https://portal.nlas.go.ke/login','tech'=>'Django, Figma','icon'=>'📜'],
        ['title'=>'Waste Assistant (IoT)','link'=>'https://github.com/afrochic/waste_assistant.git','tech'=>'Arduino, Android, Firebase','icon'=>'♻️'],
        ['title'=>'CorkBrick Game','link'=>'https://corkbrick.com/pages/corkbrick-play','tech'=>'Unity, Blender, Figma','icon'=>'🕹️'],
        ['title'=>'Clone Technologies Website','link'=>'http://clone-technologies.com/','tech'=>'Laravel, Figma','icon'=>'🌐'],
        ['title'=>'Afro Chitchat — Chat App','link'=>'https://github.com/afrochic/afrochicChat.git','tech'=>'Android, Firebase','icon'=>'💬']
      ] as $proj)
      <a href="{{$proj['link']}}" target="_blank" class="project-card p-6 rounded-2xl bg-slate-800 border border-white/10 flex flex-col items-center justify-center cursor-pointer hover:scale-105 transition-transform" onclick="showAchievement('Loot Collected: {{$proj['title']}}'); gainXP(20)">
        <div class="text-5xl">{{$proj['icon']}}</div>
        <div class="project-body mt-4 text-center">
          <h3 class="font-semibold">{{$proj['title']}}</h3>
          <p class="text-slate-400 text-sm">{{$proj['tech']}}</p>
        </div>
      </a>
      @endforeach
    </div>
  </div>
</section>

<!-- Skills / Quest 4 -->
<section id="skills" class="py-20 quest-section">
  <div class="max-w-6xl mx-auto px-4">
    <h2 class="text-2xl font-semibold mb-6">Quest 4: Skill Tree</h2>
    <div class="flex flex-wrap gap-2 text-xs">
      @foreach([
        ['name'=>'Python','icon'=>'🐍'],
        ['name'=>'SQL','icon'=>'🗄️'],
        ['name'=>'Java','icon'=>'☕'],
        ['name'=>'PHP','icon'=>'🐘'],
        ['name'=>'C++','icon'=>'💠'],
        ['name'=>'JavaScript','icon'=>'🟨'],
        ['name'=>'Power BI','icon'=>'📊'],
        ['name'=>'Azure','icon'=>'☁️'],
        ['name'=>'Databricks','icon'=>'🔥'],
        ['name'=>'Figma','icon'=>'🎨'],
        ['name'=>'Tableau','icon'=>'📈'],
        ['name'=>'GitHub','icon'=>'🐱'],
        ['name'=>'Firebase','icon'=>'🔥'],
        ['name'=>'Android Studio','icon'=>'🤖'],
        ['name'=>'Unity','icon'=>'🕹️'],
        ['name'=>'AWS','icon'=>'☁️']
      ] as $s)
      <div class="flex flex-col items-center justify-center cursor-pointer p-2 bg-slate-800 rounded-xl border border-white/10 hover:scale-110 transition-transform" onclick="showAchievement('Skill Unlocked: {{$s['name']}}'); gainXP(10)">
        <div class="text-2xl">{{$s['icon']}}</div>
        <span class="text-xs mt-1 text-slate-300">{{$s['name']}}</span>
      </div>
      @endforeach
    </div>
  </div>
</section>

<!-- Contact / Final Boss -->
<section id="contact" class="py-20 quest-section">
  <div class="max-w-4xl mx-auto px-4">
    <div class="rounded-3xl bg-slate-900 border border-white/5 p-8">
      <h2 class="text-2xl font-semibold">Final Boss: Connect with Me</h2>
      <form class="mt-6 grid md:grid-cols-2 gap-4" method="POST" action="https://formspree.io/f/mblknnby" onsubmit="showAchievement('Boss Defeated: Contact Sent!'); gainXP(50)">
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

<!-- GSAP + XP Bar + Achievements + Particles -->
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/gsap.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/gsap@3/dist/ScrollTrigger.min.js"></script>
<script>
gsap.registerPlugin(ScrollTrigger);

// Fade in sections like unlocking levels
gsap.utils.toArray(".quest-section").forEach((sec) => {
  gsap.from(sec, {
    opacity: 0,
    y: 50,
    duration: 1,
    scrollTrigger: {
      trigger: sec,
      start: "top 80%",
    }
  });
});

// XP / Progress Bar
let xp = 0;
let level = 1;

function gainXP(amount) {
  xp += amount;
  const xpBar = document.getElementById('xp-progress');
  const levelIndicator = document.getElementById('level-indicator');
  const maxXP = 100;
  if (xp >= maxXP) {
    level++;
    xp -= maxXP;
    showAchievement(`Level Up! 🎉 Level ${level}`);
  }
  xpBar.style.width = `${xp}%`;
  levelIndicator.innerText = `Level ${level}`;
}

// Achievement Popup
function showAchievement(text) {
  let el = document.getElementById("achievement");
  el.innerText = "🏆 " + text;
  el.classList.remove("hidden");
  setTimeout(() => el.classList.add("hidden"), 3000);
}

// Bounce effect for skills
document.querySelectorAll(".skill-ring").forEach(el => {
  el.addEventListener("click", () => {
    gsap.fromTo(el, {scale:1}, {scale:1.3, yoyo:true, repeat:1, duration:0.2});
  });
});

// Accent color picker
document.getElementById("accent-picker-inline").addEventListener("change", (e) => {
  document.documentElement.style.setProperty('--accent', e.target.value);
});

// XP bar updates on scroll
document.addEventListener("scroll", () => {
  let scrollTop = window.scrollY;
  let docHeight = document.body.scrollHeight - window.innerHeight;
  let progress = (scrollTop / docHeight) * 100;
  document.getElementById("xp-progress").style.width = progress + "%";
});

// Particles
const canvas = document.getElementById('particles');
const ctx = canvas.getContext('2d');
let w = canvas.width = window.innerWidth;
let h = canvas.height = window.innerHeight;
let particles = [];
let burstParticles = [];

for(let i=0;i<50;i++){
  particles.push({x:Math.random()*w, y:Math.random()*h, vx:(Math.random()-0.5)*1.5, vy:(Math.random()-0.5)*1.5, r:Math.random()*2+1});
}

function step(){
  ctx.clearRect(0,0,w,h);
  particles.forEach(p=>{
    p.x += p.vx; p.y += p.vy;
    if(p.x<0||p.x>w) p.vx*=-1;
    if(p.y<0||p.y>h) p.vy*=-1;
    ctx.beginPath(); ctx.arc(p.x,p.y,p.r,0,Math.PI*2); ctx.fillStyle='rgba(255,255,255,0.4)'; ctx.fill();
  });
  burstParticles.forEach((p,i)=>{
    p.x+=p.vx; p.y+=p.vy; p.life--;
    ctx.beginPath(); ctx.arc(p.x,p.y,p.r,0,Math.PI*2); ctx.fillStyle='rgba(255,215,0,0.8)'; ctx.fill();
    if(p.life<=0) burstParticles.splice(i,1);
  });
  requestAnimationFrame(step);
}
step();

function particleBurst(x,y){
  for(let i=0;i<20;i++){
    burstParticles.push({
      x, y,
      vx:(Math.random()-0.5)*5,
      vy:(Math.random()-0.5)*5,
      r:Math.random()*3+1,
      life:30
    });
  }
}

</script>

@endsection
