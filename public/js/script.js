//Category items section scrolling
document.getElementById('scroll-left').addEventListener('click', function() {
    const container = document.getElementById('scroll-container');
    container.scrollBy({ left: -200, behavior: 'smooth' });
  });

  document.getElementById('scroll-right').addEventListener('click', function() {
    const container = document.getElementById('scroll-container');
    container.scrollBy({ left: 200, behavior: 'smooth' });
  });
  const scrollContainer = document.getElementById('scroll-container');
let scrollInterval; 


function startAutoScroll(direction) {
  clearInterval(scrollInterval); 
  scrollInterval = setInterval(() => {
    scrollContainer.scrollLeft += direction; 
  }, 10); 
}


function stopAutoScroll() {
  clearInterval(scrollInterval); 
}


scrollContainer.addEventListener('mousemove', (event) => {
  const containerRect = scrollContainer.getBoundingClientRect();
  const mouseX = event.clientX;

  if (mouseX < containerRect.left + 100) {
    startAutoScroll(-2); 
  } else if (mouseX > containerRect.right - 100) {
    
    startAutoScroll(2); 
  } else {
    stopAutoScroll(); 
  }
});

scrollContainer.addEventListener('mouseleave', stopAutoScroll);
