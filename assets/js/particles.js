// Generar partículas dinámicamente
var particleContainer = document.querySelector('.particles');
var numParticles = 100;

for (var i = 0; i < numParticles; i++) {
  var particle = document.createElement('div');
  particle.className = 'particle';
  particle.style.left = Math.random() * 100 + '%';
  particle.style.top = Math.random() * 100 + '%';
  particle.style.animationDelay = Math.random() * 3 + 's';
  particleContainer.appendChild(particle);
}