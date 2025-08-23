// app.js - main JS entry
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
  if (themeBtn) { themeBtn.textContent = body.classList.contains('dark') ? '🌞' : '🌙'; themeBtn.addEventListener('click', toggleTheme); }

  // Accent color
  function setAccent(val){ root.style.setProperty('--accent', val); localStorage.setItem('accent', val); }
  const savedAccent = localStorage.getItem('accent'); if (savedAccent) setAccent(savedAccent);
  ['accent-picker','accent-picker-inline'].forEach(id=>{
    const el = document.getElementById(id); if(el) el.addEventListener('input', e=>setAccent(e.target.value));
  });

  // Scroll progress
  const bar = document.getElementById('scroll-progress');
  function updateScroll(){ const h=document.documentElement; const scrolled=(h.scrollTop)/(h.scrollHeight-h.clientHeight)*100; if(bar) bar.style.width=scrolled+'%'; }
  document.addEventListener('scroll', updateScroll, {passive:true}); updateScroll();

  // Particles
  const canvas = document.getElementById('particles');
  if(canvas){
    const ctx = canvas.getContext('2d'); let w,h,particles;
    function resize(){ w=canvas.width=canvas.offsetWidth; h=canvas.height=canvas.offsetHeight; particles=Array.from({length:60},()=>({x:Math.random()*w,y:Math.random()*h,vx:(Math.random()-0.5)*0.5,vy:(Math.random()-0.5)*0.5,r:1+Math.random()*2})); }
    window.addEventListener('resize',resize); resize();
    function step(){ ctx.clearRect(0,0,w,h); ctx.fillStyle=getComputedStyle(root).getPropertyValue('--accent')||'#a855f7'; particles.forEach(p=>{p.x+=p.vx;p.y+=p.vy;if(p.x<0||p.x>w)p.vx*=-1;if(p.y<0||p.y>h)p.vy*=-1;ctx.beginPath();ctx.arc(p.x,p.y,p.r,0,Math.PI*2);ctx.fill();}); requestAnimationFrame(step);}
    step();
  }

  // GSAP animations
  if(window.gsap && window.ScrollTrigger){
    const gsap = window.gsap; const ScrollTrigger = window.ScrollTrigger; gsap.registerPlugin(ScrollTrigger);

    gsap.utils.toArray('.timeline-card').forEach((el,i)=>{
      gsap.from(el,{opacity:0,y:30,duration:0.6,delay:i*0.08,scrollTrigger:{trigger:el,start:'top 85%'}});
    });

    document.querySelectorAll('.skill-ring').forEach(ring=>{
      ring.addEventListener('click',()=>{ gsap.to(ring,{y:-8,duration:0.12,yoyo:true,repeat:1,ease:'power2.out'}); });
    });
  }
});
