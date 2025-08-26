document.addEventListener('DOMContentLoaded', function() {
  const root = document.documentElement;
  const body = document.body;

  // Theme toggle
  const toggleTheme = () => {
    body.classList.toggle('dark');
    const mode = body.classList.contains('dark') ? 'dark' : 'light';
    localStorage.setItem('theme', mode);
    const btn = document.getElementById('theme-toggle');
    if (btn) btn.textContent = mode === 'dark' ? '🌞' : '🌙';
  };
  const savedTheme = localStorage.getItem('theme');
  if (savedTheme) body.classList.toggle('dark', savedTheme === 'dark');
  const themeBtn = document.getElementById('theme-toggle');
  if (themeBtn) { 
    themeBtn.textContent = body.classList.contains('dark') ? '🌞' : '🌙'; 
    themeBtn.addEventListener('click', toggleTheme); 
  }

  // Accent color
  function setAccent(val){ root.style.setProperty('--accent', val); localStorage.setItem('accent', val); }
  const savedAccent = localStorage.getItem('accent'); 
  if(savedAccent) setAccent(savedAccent);
  ['accent-picker','accent-picker-inline'].forEach(id=>{
    const el = document.getElementById(id); 
    if(el) el.addEventListener('input', e=>setAccent(e.target.value));
  });

  // Scroll progress / XP bar
  const xpBar = document.getElementById('xp-progress');
  function updateScroll(){ 
    const h=document.documentElement; 
    if(xpBar) xpBar.style.width = (h.scrollTop/(h.scrollHeight-h.clientHeight)*100)+'%'; 
  }
  document.addEventListener('scroll', updateScroll, {passive:true}); 
  updateScroll();

  // Game-like particles
  const canvas = document.getElementById('particles');
  if(canvas){
    const ctx = canvas.getContext('2d'); 
    let w,h,particles;
    function resize(){ 
      w=canvas.width=window.innerWidth; 
      h=canvas.height=window.innerHeight; 
      particles=Array.from({length:120},()=>({
        x:Math.random()*w,
        y:Math.random()*h,
        vx:(Math.random()-0.5)*2,
        vy:(Math.random()-0.5)*2,
        r:2+Math.random()*3,
        color:`hsl(${Math.random()*360},100%,60%)`
      })); 
    }
    window.addEventListener('resize',resize); 
    resize();

    let mouse = {x:null, y:null};
    canvas.addEventListener('mousemove', e=>{
      mouse.x = e.x; mouse.y = e.y;
      // spawn a particle near cursor
      particles.push({
        x:mouse.x,
        y:mouse.y,
        vx:(Math.random()-0.5)*2,
        vy:(Math.random()-0.5)*2,
        r:2+Math.random()*3,
        color:`hsl(${Math.random()*360},100%,60%)`
      });
      if(particles.length > 200) particles.shift();
    });

    function step(){ 
  ctx.clearRect(0,0,w,h); // <-- keeps it transparent
  ctx.fillStyle = getComputedStyle(root).getPropertyValue('--accent') || '#a855f7'; 
  particles.forEach(p=>{
    p.x += p.vx; 
    p.y += p.vy;
    if(p.x < 0 || p.x > w) p.vx *= -1;
    if(p.y < 0 || p.y > h) p.vy *= -1;
    ctx.beginPath(); 
    ctx.arc(p.x,p.y,p.r,0,Math.PI*2); 
    ctx.fill();
  }); 
  requestAnimationFrame(step);
}

    step();
  }

  // Welcome text animation
  const welcomeText = document.getElementById('welcome-text');
  if(welcomeText && window.gsap){
    gsap.to(welcomeText, {opacity:1, y:10, duration:1, repeat:-1, yoyo:true, ease:'power1.inOut'});
  }

  // GSAP animations for sections
  if(window.gsap && window.ScrollTrigger){
    const gsap = window.gsap; 
    const ScrollTrigger = window.ScrollTrigger; 
    gsap.registerPlugin(ScrollTrigger);

    // Timeline cards fade in
    gsap.utils.toArray('.timeline-card').forEach((el,i)=>{
      gsap.from(el,{
        opacity:0, 
        y:30, 
        duration:0.6, 
        delay:i*0.08, 
        scrollTrigger:{ trigger:el, start:'top 85%' }
      });
    });

    // Skill rings bounce on click
    document.querySelectorAll('.skill-ring').forEach(ring=>{
      ring.addEventListener('click',()=>{ 
        gsap.to(ring,{y:-8,duration:0.12,yoyo:true,repeat:1,ease:'power2.out'}); 
      });
    });

    ScrollTrigger.refresh();
  }

  // Achievements
  window.showAchievement = function(text){
    const el = document.getElementById('achievement');
    if(el){
      el.innerText = "🏆 " + text;
      el.classList.remove('hidden');
      setTimeout(()=> el.classList.add('hidden'),3000);
    }
  };
});
