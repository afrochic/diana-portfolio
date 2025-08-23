// app.js - main JS entry
import { gsap } from "gsap";
import { ScrollTrigger } from "gsap/ScrollTrigger";
gsap.registerPlugin(ScrollTrigger);

// Theme + accent + scroll progress + particles + small animations
(function() {
  const root = document.documentElement;
  const body = document.body;

  // -----------------------------
  // Theme toggle
  // -----------------------------
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

  // -----------------------------
  // Accent color
  // -----------------------------
  const setAccent = val => {
    root.style.setProperty('--accent', val);
    localStorage.setItem('accent', val);
  };

  const savedAccent = localStorage.getItem('accent');
  if (savedAccent) setAccent(savedAccent);

  ['accent-picker', 'accent-picker-inline'].forEach(id => {
    const el = document.getElementById(id);
    if (el) el.addEventListener('input', e => setAccent(e.target.value));
  });

  // -----------------------------
  // Scroll progress bar
  // -----------------------------
  const progressBar = document.getElementById('scroll-progress');
  const updateScroll = () => {
    const h = document.documentElement;
    const scrolled = (h.scrollTop) / (h.scrollHeight - h.clientHeight) * 100;
    if (progressBar) progressBar.style.width = scrolled + '%';
  };
  document.addEventListener('scroll', updateScroll, { passive: true });
  updateScroll();

  // -----------------------------
  // Particles canvas
  // -----------------------------
  const canvas = document.getElementById('particles');
  if (canvas) {
    const ctx = canvas.getContext('2d');
    let w, h, particles;

    const resizeCanvas = () => {
      w = canvas.width = canvas.offsetWidth;
      h = canvas.height = canvas.offsetHeight;
      particles = Array.from({ length: 60 }, () => ({
        x: Math.random() * w,
        y: Math.random() * h,
        vx: (Math.random() - 0.5) * 0.5,
        vy: (Math.random() - 0.5) * 0.5,
        r: 1 + Math.random() * 2
      }));
    };

    window.addEventListener('resize', resizeCanvas);
    resizeCanvas();

    const animateParticles = () => {
      ctx.clearRect(0, 0, w, h);
      ctx.fillStyle = getComputedStyle(root).getPropertyValue('--accent') || '#a855f7';
      particles.forEach(p => {
        p.x += p.vx;
        p.y += p.vy;
        if (p.x < 0 || p.x > w) p.vx *= -1;
        if (p.y < 0 || p.y > h) p.vy *= -1;
        ctx.beginPath();
        ctx.arc(p.x, p.y, p.r, 0, Math.PI * 2);
        ctx.fill();
      });
      requestAnimationFrame(animateParticles);
    };
    animateParticles();
  }

  // -----------------------------
  // GSAP animations
  // -----------------------------
  if (window.gsap) {
    gsap.utils.toArray('.timeline-card').forEach((el, i) => {
      gsap.from(el, {
        opacity: 0,
        y: 30,
        duration: 0.6,
        delay: i * 0.08,
        scrollTrigger: { trigger: el, start: 'top 85%' }
      });
    });
  }

  // -----------------------------
  // Skill ring bounce animation
  // -----------------------------
  document.querySelectorAll('.skill-ring').forEach(ring => {
    ring.addEventListener('click', () => {
      if (window.gsap) {
        gsap.to(ring, { y: -8, duration: 0.12, yoyo: true, repeat: 1, ease: 'power2.out' });
      }
    });
  });
})();
