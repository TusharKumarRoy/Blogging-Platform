

(function(){
  const root = document.documentElement;
  const key = 'openblogs-theme';

  
  const saved = localStorage.getItem(key);
  if (saved === 'dark') {
    root.setAttribute('data-theme', 'dark');
  }


  const btn = document.getElementById('theme-toggle');
  if (!btn) return;


  const applyIcon = () => {
    const isDark = root.getAttribute('data-theme') === 'dark';
    btn.textContent = isDark ? '☀️' : '🌙';
    btn.setAttribute('aria-pressed', String(isDark));
    btn.setAttribute('title', isDark ? 'Switch to light mode' : 'Switch to dark mode');
  };
  applyIcon();

  
  btn.addEventListener('click', () => {
    const isDark = root.getAttribute('data-theme') === 'dark';
    if (isDark) {
      root.removeAttribute('data-theme');
      localStorage.setItem(key, 'light');
    } else {
      root.setAttribute('data-theme', 'dark');
      localStorage.setItem(key, 'dark');
    }
    applyIcon();
  });
})();
